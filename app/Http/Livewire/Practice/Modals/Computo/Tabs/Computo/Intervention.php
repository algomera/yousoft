<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Computo;

	use App\ComputoInterventionFolder;
	use App\ComputoInterventionRow;
	use Livewire\Component;

	class Intervention extends Component
	{
		public $rows = [];
		public $tree = [];
		public $selected = null;
		public $practice_id;

		protected $listeners = [
			'changeInterventionFolder',
			'detail-row-added' => '$refresh',
			'detail-row-deleted' => '$refresh'
		];

		public function changeInterventionFolder($id) {
			$this->selected = $id;
		}

		public function mount($selectedIntervention, $practice_id) {
			$items = ComputoInterventionFolder::tree()->get();
			$this->tree = $items->toTree();
			$this->selected = $selectedIntervention;
			$this->practice_id = $practice_id;
		}

		public function selectInterventionRow($row) {
			$this->emit('openModal', 'practice.modals.computo.tabs.computo.edit-details', [
				"row" => $row['id'],
				"selectedIntervention" => $this->selected,
				"practice_id" => $this->practice_id,
			]);
		}

		public function render() {
			$this->rows = ComputoInterventionRow::where('practice_id', $this->practice_id)->where('intervention_folder_id', $this->selected)->get();
			return view('livewire.practice.modals.computo.tabs.computo.intervention');
		}
	}
