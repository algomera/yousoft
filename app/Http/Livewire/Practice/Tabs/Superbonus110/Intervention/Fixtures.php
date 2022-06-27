<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use App\Fixture;
	use Livewire\Component;

	class Fixtures extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;

		protected $listeners = [
			'fixture-added' => '$refresh',
			'fixture-deleted' => '$refresh'
		];

		public function deleteFixture($id) {
			Fixture::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Intervento Eliminato'),
				'subtitle' => __('L\'intervento è stato eliminato con successo!')
			]);
			$this->emit('fixture-deleted');
		}

		public function render() {
			$this->fixtures = $this->practice->fixtures()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.fixtures');
		}
	}
