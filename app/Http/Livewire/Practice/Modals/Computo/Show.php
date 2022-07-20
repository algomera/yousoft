<?php

	namespace App\Http\Livewire\Practice\Modals\Computo;

	use LivewireUI\Modal\ModalComponent;

	class Show extends ModalComponent
	{
		public $practice_id;
		public $tabs = [
			'computo'  => 'Computo Metrico',
			'fees'   => 'IVA e spese professionali',
			'recap'   => 'Riepilogo massimali',
		];
		public $selectedTab = 'computo';

		protected $listeners = [
			'change-tab' => 'changeTab'
		];

		public function mount($practice_id) {
			$this->practice_id = $practice_id;
		}

		public static function modalMaxWidthClass(): string
		{
			return 'sm:max-w-[98vw] sm:min-h-[850px] sm:max-h-[92vh]';
		}

		public function render() {
			return view('livewire.practice.modals.computo.show');
		}
	}
