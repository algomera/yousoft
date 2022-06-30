<?php

	namespace App\Http\Livewire\FolderFileManagement;

	use LivewireUI\Modal\ModalComponent;

	class CreateFolder extends ModalComponent
	{
		public $name;
		public $type;

		protected $rules = [
			'name' => 'required|string',
			'type' => 'required|string',
		];

		public function save() {
			$validated = $this->validate();
			auth()->user()->folders()->create($validated);

			$this->emit('folder-added');
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Creazione'),
				'subtitle' => __('La cartella è stata creata con successo!')
			]);
		}

		public function render() {
			return view('livewire.folder-file-management.create-folder');
		}
	}
