<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use App\BiomeGenerator;
	use Livewire\Component;

	class BiomeGenerators extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;

		protected $listeners = [
			'biome-generator-added' => '$refresh',
			'biome-generator-deleted' => '$refresh'
		];

		public function deleteBiomeGenerator($id) {
			BiomeGenerator::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Intervento Eliminato'),
				'subtitle' => __('L\'intervento è stato eliminato con successo!')
			]);
			$this->emit('biome-generator-deleted');
		}

		public function render() {
			$this->biome_generators = $this->practice->biome_generators()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.biome-generators');
		}
	}
