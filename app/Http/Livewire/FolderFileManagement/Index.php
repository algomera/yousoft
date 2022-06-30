<?php

	namespace App\Http\Livewire\FolderFileManagement;

	use App\Folder;
	use Livewire\Component;

	class Index extends Component
	{
		public $folders;

		protected $listeners = [
			'folder-added' => '$refresh',
			'folder-deleted' => '$refresh',
		];

		public function deleteFolder($id) {
			Folder::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Cartella Eliminata'),
				'subtitle' => __('La cartella è stata eliminata con successo!')
			]);
			$this->emitSelf('folder-deleted');
		}

		public function render() {
			$this->folders = auth()->user()->folders;
			return view('livewire.folder-file-management.index');
		}
	}
