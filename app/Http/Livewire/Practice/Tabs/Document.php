<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Practice as PracticeModel;
	use App\Sub_folder;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;

	class Document extends Component
	{
		use AuthorizesRequests;
		public PracticeModel $practice;
		public $sub_folders;
		public $tabs = [
			'first' => 'Prima',
			'during' => 'Durante',
			'after' => 'Al termine',
			'casing' => 'Involucro'
		];
		public $selectedTab = 'first';

		protected $listeners = [
			'status-changed'    => '$refresh',
			'document-deleted' => '$refresh',
			'document-added'   => '$refresh',
		];

		public function showFolderContent(Sub_folder $sub_folder) {
			$this->authorize('view-required-documents-folder', $this->practice);
			if ($sub_folder->assev_t_status == 0 && auth()->user()->role->name === 'technical_asseverator') {
				$sub_folder->assev_t_status = 1;
				$sub_folder->save();
			} else if ($sub_folder->assev_f_status == 0 && auth()->user()->role->name === 'fiscal_asseverator') {
				$sub_folder->assev_f_status = 1;
				$sub_folder->save();
			} else if ($sub_folder->bank_status == 0 && auth()->user()->role->name === 'bank') {
				$sub_folder->bank_status = 1;
				$sub_folder->save();
			}
			$this->emit('openModal', 'practice.tabs.document.modals.folder-documents', [$sub_folder]);
		}

		public function render() {
			$this->sub_folders = Sub_folder::where('practice_id', '=', $this->practice->id)->where('folder_type', '=', $this->selectedTab)->orderBy('created_at', 'DESC')->get();
			return view('livewire.practice.tabs.document');
		}
	}
