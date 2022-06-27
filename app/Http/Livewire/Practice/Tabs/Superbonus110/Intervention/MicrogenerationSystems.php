<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use App\MicrogenerationSystem;
	use Livewire\Component;

	class MicrogenerationSystems extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;

		protected $listeners = [
			'microgeneration-system-added' => '$refresh',
			'microgeneration-system-deleted' => '$refresh'
		];

		public function deleteMicrogenerationSystem($id) {
			MicrogenerationSystem::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Intervento Eliminato'),
				'subtitle' => __('L\'intervento è stato eliminato con successo!')
			]);
			$this->emit('microgeneration-system-deleted');
		}

		public function render() {
			$this->microgeneration_systems = $this->practice->microgeneration_systems()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.microgeneration-systems');
		}
	}
