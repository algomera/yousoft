<?php

	namespace App\Http\Livewire\Practice\Tabs\Document\Modals;

	use App\Document;
	use App\Sub_folder as Sub_folderModel;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Illuminate\Support\Facades\Storage;
	use LivewireUI\Modal\ModalComponent;

	class FolderDocuments extends ModalComponent
	{
		use AuthorizesRequests;
		public Sub_folderModel $sub_folder;
		public $current_sub_folder;
		protected $listeners = [
			'status-changed'   => '$refresh',
			'document-deleted' => '$refresh',
			'document-added'   => '$refresh',
		];

		public function mount(Sub_folderModel $sub_folder) {
			$this->authorize('view-required-documents-folder', $sub_folder->practice);
			$this->sub_folder = $sub_folder;
		}

		public function approve() {
			$this->authorize('approve_required_documents_folder', $this->sub_folder->practice);
			if ($this->sub_folder->assev_t_status == 1 && auth()->user()->role->name === 'technical_asseverator') {
				$this->sub_folder->assev_t_status = 2;
				$this->sub_folder->save();
			} else if ($this->sub_folder->assev_f_status == 1 && auth()->user()->role->name === 'fiscal_asseverator') {
				$this->sub_folder->assev_f_status = 2;
				$this->sub_folder->save();
			} else if ($this->sub_folder->bank_status == 1 && auth()->user()->role->name === 'bank') {
				$this->sub_folder->bank_status = 2;
				$this->sub_folder->save();
			}
			$this->emit('status-changed');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Approvazione'),
				'subtitle' => __('La cartella è stata approvata!')
			]);
		}

		public function disapprove() {
			$this->authorize('disapprove_required_documents_folder', $this->sub_folder->practice);
			if ($this->sub_folder->assev_t_status == 2 && auth()->user()->role->name === 'technical_asseverator') {
				$this->sub_folder->assev_t_status = 1;
				$this->sub_folder->save();
			} else if ($this->sub_folder->assev_f_status == 2 && auth()->user()->role->name === 'fiscal_asseverator') {
				$this->sub_folder->assev_f_status = 1;
				$this->sub_folder->save();
			} else if ($this->sub_folder->bank_status == 2 && auth()->user()->role->name === 'bank') {
				$this->sub_folder->bank_status = 1;
				$this->sub_folder->save();
			}
			$this->emit('status-changed');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Approvazione'),
				'subtitle' => __('La cartella NON è stata approvata!'),
			]);
		}

		public function download(Document $document) {
			$this->authorize('download_required_documents_file', $this->sub_folder->practice);
			return Storage::download($document->allega);
		}

		public function delete(Document $document) {
			$this->authorize('delete_required_documents_file', $document->sub_folder->practice);
			$document->delete();
			Storage::delete($document->allega);
			$this->emit('document-deleted');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Documento Eliminato'),
				'subtitle' => __('Il documento è stato eliminato con successo!')
			]);
		}

		public function render() {
			$this->current_sub_folder = $this->sub_folder;
			return view('livewire.practice.tabs.document.modals.folder-documents');
		}
	}
