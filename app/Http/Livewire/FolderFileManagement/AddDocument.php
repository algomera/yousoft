<?php

	namespace App\Http\Livewire\FolderFileManagement;

	use App\Folder as FolderModel;
	use Illuminate\Support\Str;
	use Livewire\WithFileUploads;
	use LivewireUI\Modal\ModalComponent;

	class AddDocument extends ModalComponent
	{
		use WithFileUploads;

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

		public function mount(FolderModel $folder) {
			$this->folder = $folder;
		}

		public function save() {
			$validated = $this->validate();
			$extension = $this->file->extension();
			$path = $this->file->storeAs('folder/' . auth()->user()->id . '/' . $this->folder->name, Str::slug($this->title) . '.' . $extension);
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
