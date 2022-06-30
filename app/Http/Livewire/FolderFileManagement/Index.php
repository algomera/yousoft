<?php

	namespace App\Http\Livewire\FolderFileManagement;

	use App\Folder;
	use Livewire\Component;

	class Index extends Component
	{
		public $folders;

		public function render() {
			$this->folders = auth()->user()->folders;
			return view('livewire.folder-file-management.index');
		}
	}
