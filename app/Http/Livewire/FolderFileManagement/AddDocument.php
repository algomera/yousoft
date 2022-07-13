<?php

	namespace App\Http\Livewire\FolderFileManagement;

	use App\Folder as FolderModel;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Illuminate\Support\Str;
	use Livewire\WithFileUploads;
	use LivewireUI\Modal\ModalComponent;

	class AddDocument extends ModalComponent
	{
		use WithFileUploads, AuthorizesRequests;

		public FolderModel $folder;
		public $title;
		public $file;

		public static function destroyOnClose(): bool {
			return true;
		}

		protected $rules = [
			'title' => 'required|string',
			'file'  => 'required',
		];

		protected $validationAttributes = [
			'title' => 'Titolo',
			'file'  => 'File',
		];

		public function mount(FolderModel $folder) {
			$this->authorize('upload-required-documents-file', $folder->practice);
			$this->folder = $folder;
		}

		public function save() {
			$this->authorize('upload-required-documents-file', $this->folder->practice);
			$validated = $this->validate();
			$extension = pathinfo($this->file->getClientOriginalName(), PATHINFO_EXTENSION);
			$path = $this->file->storeAs('folder/' . auth()->user()->id . '/' . $this->folder->uuid, Str::slug($this->title) . '.' . $extension);
			$validated['file'] = $path;
			$this->folder->files()->create($validated);
			$this->emit('file-added');
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiunta'),
				'subtitle' => __('Il file è stato aggiunto con successo!')
			]);
		}

		public function render() {
			return view('livewire.folder-file-management.add-document');
		}
	}
