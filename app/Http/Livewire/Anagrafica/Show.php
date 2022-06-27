<?php

	namespace App\Http\Livewire\Anagrafica;

	use App\Anagrafica as AnagraficaModel;
	use LivewireUI\Modal\ModalComponent;

	class Show extends ModalComponent
	{
		public AnagraficaModel $anagrafica;

		public static function modalMaxWidth(): string {
			return '7xl';
		}

		protected $listeners = [
			'anagrafica-updated' => '$refresh',
		];

		public function mount(AnagraficaModel $anagrafica) {
			$this->anagrafica = $anagrafica;
		}

		public function render() {
			return view('livewire.anagrafica.show');
		}
	}
