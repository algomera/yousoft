<?php

	namespace App\Http\Livewire\FolderFileManagement;

	use App\File as FileModel;
	use App\Folder;
	use App\Folder as FolderModel;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Illuminate\Support\Facades\Storage;
	use LivewireUI\Modal\ModalComponent;

	class Show extends ModalComponent
	{
		use AuthorizesRequests;

		public FolderModel $folder;

		protected $listeners = [
			'file-deleted' => '$refresh',
			'file-added'   => '$refresh',
		];

		public function mount(FolderModel $folder) {
			$this->authorize('view', $folder);
			$this->folder = $folder;
		}

		public function download(FileModel $file) {
			$this->authorize('download-files', $this->folder);
			return Storage::download($file->file);
		}

		public function delete(FileModel $file) {
			$this->authorize('delete-files', $this->folder);
			$file->delete();
			Storage::delete($file->file);

			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('File Eliminato'),
				'subtitle' => __('Il file è stato eliminato con successo!')
			]);
			$this->emit('file-deleted');
		}

		public function render() {
			return view('livewire.folder-file-management.show');
		}
	}
