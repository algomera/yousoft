<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use App\AbsorptionHeatPump;
	use Livewire\Component;

	class AbsorptionHeatPumps extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;

		protected $listeners = [
			'absorption-heat-pump-added' => '$refresh',
			'absorption-heat-pump-deleted' => '$refresh'
		];

		public function deleteAbsorptionHeatPump($id) {
			AbsorptionHeatPump::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Intervento Eliminato'),
				'subtitle' => __('L\'intervento è stato eliminato con successo!')
			]);
			$this->emit('absorption-heat-pump-deleted');
		}

		public function render() {
			$this->absorption_heat_pumps = $this->practice->absorption_heat_pumps()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.absorption-heat-pumps');
		}
	}
