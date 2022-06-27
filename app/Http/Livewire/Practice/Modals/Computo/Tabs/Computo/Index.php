<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Computo;

	use App\ComputoInterventionFolder;
	use Livewire\Component;

	class Index extends Component
	{
		public $selectedIntervention = null;
		public $practice_id;

		protected $listeners = [
			'changeInterventionFolder',
		];

		public function mount($practice_id) {
			$this->selectedIntervention = 2;
			$this->practice_id = $practice_id;
		}

		public function changeInterventionFolder($id) {
			$this->selectedIntervention = $id;
		}

		public function render() {
			return view('livewire.practice.modals.computo.tabs.computo.index');
		}
	}
