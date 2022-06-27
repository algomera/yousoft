<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use App\HybridSystem;
	use Livewire\Component;

	class HybridSystems extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;

		protected $listeners = [
			'hybrid-system-added' => '$refresh',
			'hybrid-system-deleted' => '$refresh'
		];

		public function deleteHybridSystem($id) {
			HybridSystem::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Intervento Eliminato'),
				'subtitle' => __('L\'intervento è stato eliminato con successo!')
			]);
			$this->emit('hybrid-system-deleted');
		}

		public function render() {
			$this->hybrid_systems = $this->practice->hybrid_systems()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.hybrid-systems');
		}
	}
