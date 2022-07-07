<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Fees;

	use Livewire\Component;

	class Index extends Component
	{
		public $practice_id;
		public $tabs = [
			'amount'  => 'Importo lavori',
			'other'   => 'Altre spese',
		];

		public $selectedTab = 'amount';

		protected $listeners = [
			'change-tab' => 'changeTab'
		];

		public function mount($practice_id) {
			$this->practice_id = $practice_id;
		}

		public function render() {
			return view('livewire.practice.modals.computo.tabs.fees.index');
		}
	}
