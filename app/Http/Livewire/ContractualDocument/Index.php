<?php

	namespace App\Http\Livewire\ContractualDocument;

	use App\Contract as ContractModel;
	use App\ContractualDocument;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Illuminate\Support\Facades\Storage;
	use Livewire\Component;
	use Livewire\WithFileUploads;

	class Index extends Component
	{
		use WithFileUploads;
		use AuthorizesRequests;

		public $selected;
		public $tabs = [];
		public $contractual_document = [];
		public $uploaded_contractual_document = [];
		protected $listeners = [
			'document-added'   => '$refresh',
			'document-removed' => '$refresh'
		];
		protected $rules = [
			'contractual_document.*' => 'file'
		];

		public function mount() {
			if (auth()->user()->role->name === 'business') {
				$this->selected = auth()->user()->id;
			} else if (auth()->user()->childs->count()) {
				$this->selected = auth()->user()->childs->first()->id;
				$this->tabs = auth()->user()->childs;
			} else if (auth()->user()->parents->count()) {
				$this->selected = auth()->user()->parents->first()->id;
				$this->tabs = auth()->user()->parents;
			}
		}

		public function upload($id) {
			$this->authorize('upload_contractual_documents');
			$file = $this->uploaded_contractual_document[$id];
			$extension = $file->extension();
			$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
			$path = $file->storeAs('business/' . auth()->user()->id . '/contractual_documents/', $filename . '_#_' . now()->timestamp . '.' . $extension);
			auth()->user()->contractual_documents()->where('id', $id)->update([
				'uploaded_path' => $path
			]);
			$this->emit('document-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiunta'),
				'subtitle' => __('Il file è stato aggiunto con successo!')
			]);
			$this->uploaded_contractual_document[$id] = null;
		}

		public function download($doc) {
			$this->authorize('download_contractual_documents');
			return Storage::disk('public')->download($doc['uploaded_path'], $doc['name']);
		}

		public function delete($id) {
			$this->authorize('delete_contractual_documents');
			$file = ContractualDocument::find($id);
			Storage::delete($file->uploaded_path);
			$file->uploaded_path = null;
			$file->save();
			$this->emit('document-removed');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Rimozione'),
				'subtitle' => __('Il file è stato eliminato con successo!')
			]);
		}

		public function render() {
			if (auth()->user()->role->name === 'business') {
				$this->contractual_document = auth()->user()->contractual_documents;
			} else if (auth()->user()->childs->count()) {
				$this->contractual_document = ContractualDocument::where('user_id', $this->selected)->get();
			} else if (auth()->user()->parents->count()) {
				$this->contractual_document = ContractualDocument::where('user_id', $this->selected)->get();
			}
			return view('livewire.contractual-document.index');
		}
	}
