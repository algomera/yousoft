<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs;

	use App\Practice as PracticeModel;
	use Livewire\Component;

	class TowedIntervention extends Component
	{
		public PracticeModel $practice;
		public $condomini;
		public $tabs = [
			0 => 'Parti comuni',
		];
		public $selectedTab = 0;
		public $currentSurface = 'PV';

		protected $listeners = [
			'condomino-deleted' => 'condominoDeleted',
			'condomino-edited' => '$refresh',
		];

		public function condominoDeleted() {
			$this->selectedTab = 0;
		}
		
		public function render() {
			$this->condomini = $this->practice->condomini;
			return view('livewire.practice.tabs.superbonus110.tabs.towed-intervention');
		}
	}
