<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use App\Sunscreen;
	use Livewire\Component;

	class Sunscreens extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;
		protected $listeners = [
			'sunscreen-added' => '$refresh',
			'sunscreen-deleted' => '$refresh'
		];

		public function deleteSunscreen($id) {
			Sunscreen::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Intervento Eliminato'),
				'subtitle' => __('L\'intervento è stato eliminato con successo!')
			]);
			$this->emit('sunscreen-deleted');
		}

		public function render() {
			$this->sunscreens = $this->practice->sunscreens()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.sunscreens');
		}
	}
