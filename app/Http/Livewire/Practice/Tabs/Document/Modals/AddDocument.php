<?php

	namespace App\Http\Livewire\Practice\Tabs\Document\Modals;

	use App\Document;
	use App\Sub_folder;
	use App\Sub_folder as Sub_folderModel;
	use Livewire\WithFileUploads;
	use LivewireUI\Modal\ModalComponent;

	class AddDocument extends ModalComponent
	{
		use WithFileUploads;

		public Sub_folderModel $sub_folder;
		public $allega;
		public $note;
		public $type = [];

		public static function destroyOnClose(): bool {
			return true;
		}

		protected $rules = [
			'allega' => 'required',
			'note'   => 'nullable',
			'type'   => 'nullable',
		];

		public function mount(Sub_folderModel $sub_folder) {
			$this->sub_folder = $sub_folder;
		}

		public function toggleDocumentType($type) {
			if (in_array($type, $this->type)) {
				$index = array_search($type, $this->type);
				array_splice($this->type, $index, 1);
			} else {
				$this->type[] = $type;
			}
		}

		public function save() {
			$validated = $this->validate();
			$validated['practice_id'] = $this->sub_folder->practice->id;
			$extension = pathinfo($this->allega->getClientOriginalName(), PATHINFO_EXTENSION);
			$filename = pathinfo($this->allega->getClientOriginalName(), PATHINFO_FILENAME);
			$path = $this->allega->storeAs('practices/' . $this->sub_folder->practice->id . '/business_folders/' . $this->sub_folder->folder_type . '_document_request', $filename . '.' . $extension);
			$validated['allega'] = $path;
			$validated['name'] = $filename;
			$validated['type'] = implode(',', $validated['type']);
			$this->sub_folder->documents()->create($validated);
			$this->emit('document-added');
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiunta'),
				'subtitle' => __('Il file è stato aggiunto con successo!')
			]);
		}

		public function render() {
			return view('livewire.practice.tabs.document.modals.add-document');
		}
	}
