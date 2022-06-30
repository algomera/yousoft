<?php

	namespace App\Http\Livewire\FolderFileManagement;

	use App\Folder as FolderModel;
	use LivewireUI\Modal\ModalComponent;

	class EditFolder extends ModalComponent
	{
		public FolderModel $folder;

		public function mount(FolderModel $folder) {
			$this->folder = $folder;
		}

		protected $rules = [
			'folder.name' => 'required|string',
			'folder.type' => 'required|string'
		];

		public function save() {
			$this->validate();
			$this->folder->update();
			$this->closeModal();
			$this->emitTo('folder-file-management.index', 'folder-edited');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('La cartella è stata aggiornata con successo!')
			]);
		}

		public function render() {
			return view('livewire.folder-file-management.edit-folder');
		}
	}
