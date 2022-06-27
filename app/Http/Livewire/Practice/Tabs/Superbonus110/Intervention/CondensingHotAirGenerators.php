<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use App\CondensingHotAirGenerator;
	use Livewire\Component;

	class CondensingHotAirGenerators extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;
		protected $listeners = [
			'condensing-hot-air-generator-added'   => '$refresh',
			'condensing-hot-air-generator-deleted' => '$refresh'
		];

		public function deleteCondensingHotAirGenerator($id) {
			CondensingHotAirGenerator::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Intervento Eliminato'),
				'subtitle' => __('L\'intervento è stato eliminato con successo!')
			]);
			$this->emit('condensing-hot-air-generator-deleted');
		}

		public function render() {
			$this->condensing_hot_air_generators = $this->practice->condensing_hot_air_generators()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.condensing-hot-air-generators');
		}
	}
