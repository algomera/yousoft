<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\FinalState;

	use App\Generator;
	use Livewire\Component;

	class Generators extends Component
	{
		public $practice;
		protected $listeners = [
			'generator-added' => '$refresh',
			'generator-deleted' => '$refresh'
		];

		public function deleteGenerator($id) {
			Generator::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Generatore Eliminato'),
				'subtitle' => __('Il generatore è stato eliminato con successo!')
			]);
			$this->emit('generator-deleted');
		}

		public function render() {
			$this->generators = $this->practice->generators;
			return view('livewire.practice.tabs.superbonus110.tabs.final-state.generators');
		}
	}
