<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use App\HeatPump;
	use Livewire\Component;

	class HeatPumps extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;

		protected $listeners = [
			'heat-pump-added' => '$refresh',
			'heat-pump-deleted' => '$refresh'
		];

		public function deleteHeatPump($id) {
			HeatPump::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Intervento Eliminato'),
				'subtitle' => __('L\'intervento è stato eliminato con successo!')
			]);
			$this->emit('heat-pump-deleted');
		}

		public function render() {
			$this->heat_pumps = $this->practice->heat_pumps()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.heat-pumps');
		}
	}
