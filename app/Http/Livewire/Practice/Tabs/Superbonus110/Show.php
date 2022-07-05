<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110;

	use App\Practice;
	use Livewire\Component;

	class Show extends Component
	{
		public $practice;
		public $tabs = [
			'data_project'         => 'Dati di progetto',
			'driving_intervention' => 'Interventi trainanti',
			'towed_intervention'   => 'Interventi trainati',
			'final_state'          => 'Stato finale',
			'fees_declaration'     => 'Spese e dichiarazione',
			'variants'             => 'Varianti',
		];
		public $selectedTab = 'data_project';
		protected $listeners = [
			'change-tab' => 'changeTab'
		];

		public function mount(Practice $practice) {
			$this->practice = $practice;
		}

		public function changeTab($tab) {
			$this->selectedTab = $tab;
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.show');
		}
	}
