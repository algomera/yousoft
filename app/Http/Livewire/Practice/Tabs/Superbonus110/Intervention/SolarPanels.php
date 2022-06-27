<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use App\SolarPanel;
	use Livewire\Component;

	class SolarPanels extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;

		protected $listeners = [
			'solar-panel-added' => '$refresh',
			'solar-panel-deleted' => '$refresh'
		];

		public function deleteSolarPanel($id) {
			SolarPanel::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Intervento Eliminato'),
				'subtitle' => __('L\'intervento è stato eliminato con successo!')
			]);
			$this->emit('solar-panel-deleted');
		}

		public function render() {
			$this->solar_panels = $this->practice->solar_panels()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.solar-panels');
		}
	}
