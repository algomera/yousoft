<?php

	namespace App\Http\Livewire\FolderFileManagement;

	use LivewireUI\Modal\ModalComponent;

	class CreateFolder extends ModalComponent
	{
		public function render() {
			return view('livewire.folder-file-management.create-folder');
		}
	}
