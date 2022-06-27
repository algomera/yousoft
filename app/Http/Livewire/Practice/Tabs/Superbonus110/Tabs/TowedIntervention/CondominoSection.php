<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\TowedIntervention;

	use App\Condomini as CondominiModel;
	use Livewire\Component;

	class CondominoSection extends Component
	{
		public CondominiModel $condomino;

		protected $listeners = [
			'condomino-edited' => '$refresh'
		];

		public function deleteCondomino() {
			$this->condomino->delete();

			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Eliminazione'),
				'subtitle' => __('Il condomino è stato eliminato con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.tabs.towed-intervention', 'condomino-deleted');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.towed-intervention.condomino-section');
		}
	}
