<?php

	namespace App\Http\Livewire\FolderFileManagement;

	use App\Folder as FolderModel;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use LivewireUI\Modal\ModalComponent;

	class EditFolder extends ModalComponent
	{
		use AuthorizesRequests;

		public FolderModel $folder;

		public function mount(FolderModel $folder) {
			$this->folder = $folder;
		}

		protected $rules = [
			'folder.name' => 'required|string',
			'folder.type' => 'required|string'
		];

		protected $validationAttributes = [
			'name' => 'Nome',
			'type' => 'Tipologia',
		];

		public function save() {
			$this->authorize('update', $this->folder);
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
