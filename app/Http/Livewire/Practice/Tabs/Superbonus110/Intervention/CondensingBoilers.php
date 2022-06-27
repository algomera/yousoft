<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use App\CondensingBoiler;
	use Livewire\Component;

	class CondensingBoilers extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;

		protected $listeners = [
			'condensing-boiler-added' => '$refresh',
			'condensing-boiler-deleted' => '$refresh'
		];

		public function deleteCondensingBoiler($id) {
			CondensingBoiler::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Intervento Eliminato'),
				'subtitle' => __('L\'intervento è stato eliminato con successo!')
			]);
			$this->emit('condensing-boiler-deleted');
		}

		public function render() {
			$this->condensing_boilers = $this->practice->condensing_boilers()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.condensing-boilers');
		}
	}
