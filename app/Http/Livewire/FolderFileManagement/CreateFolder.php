<?php

	namespace App\Http\Livewire\FolderFileManagement;

	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Str;
	use LivewireUI\Modal\ModalComponent;

	class CreateFolder extends ModalComponent
	{
		use AuthorizesRequests;

		public $name;
		public $type;
		protected $rules = [
			'name' => 'required|string',
			'type' => 'required|string',
		];

		public function save() {
			$this->authorize('create_folders');
			$validated = $this->validate();
			$validated['uuid'] = Str::random(10);
			auth()->user()->folders()->create($validated);
			Storage::makeDirectory('/folder/' . auth()->user()->id . '/' . $validated['uuid']);
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
