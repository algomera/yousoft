<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Policy as PolicyModel;
	use App\Practice as PracticeModel;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Illuminate\Support\Facades\Storage;
	use Livewire\Component;
	use Livewire\WithFileUploads;

	class Policies extends Component
	{
		use WithFileUploads;
		use AuthorizesRequests;

		public PracticeModel $practice;
		public $file_policy = [];
		public $uploaded_policy = [];
		protected $listeners = [
			'document-added'   => '$refresh',
			'document-removed' => '$refresh'
		];
		protected $rules = [
			'file_policy.*' => 'file'
		];

		public function mount(PracticeModel $practice) {
			$this->practice = $practice;
			$this->file_policy = $practice->policies;
		}

		public function upload($id) {
			$this->authorize('upload_policies');
			$file = $this->uploaded_policy[$id];
			$extension = $file->extension();
			$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
			$path = $file->storeAs('practices/' . $this->practice->id . '/policies/' . $id . '_document_request', $filename . '.' . $extension);
			$this->practice->policies()->where('id', $id)->update([
				'uploaded_path' => $path
			]);
			$this->emit('document-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiunta'),
				'subtitle' => __('Il file è stato aggiunto con successo!')
			]);
			$this->uploaded_policy[$id] = null;
		}

		public function download($doc) {
			$this->authorize('download_policies');
			return Storage::disk('public')->download($doc['path'], $doc['name']);
		}

		public function delete($id) {
			$this->authorize('delete_policies');
			$file = PolicyModel::find($id);
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
			return view('livewire.practice.tabs.policies');
		}
	}
