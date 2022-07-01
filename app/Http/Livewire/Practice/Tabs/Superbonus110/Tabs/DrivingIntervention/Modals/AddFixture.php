<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class AddFixture extends ModalComponent
	{
		public $practice;
		public $condomino_id;
		public $is_common;
		public $description;
		public $superficie;
		public $trasm_ante;
		public $trasm_post;
		public $telaio_prima = 'Legno';
		public $vetro_prima = 'Singolo';
		public $telaio_dopo = 'Legno';
		public $vetro_dopo = 'Singolo';
		public $oscurante = 'No';
		protected $rules = [
			'description'  => 'nullable|string',
			'superficie'   => 'nullable|numeric',
			'trasm_ante'   => 'nullable|numeric',
			'trasm_post'   => 'nullable|numeric',
			'telaio_prima' => 'nullable|string',
			'vetro_prima'  => 'nullable|string',
			'telaio_dopo'  => 'nullable|string',
			'vetro_dopo'   => 'nullable|string',
			'oscurante'    => 'nullable|string',
		];

		protected $validationAttributes = [
			'description'  => 'Descrizione',
			'superficie'   => 'Superficie',
			'trasm_ante'   => 'Trasm. Ante',
			'trasm_post'   => 'Trasm. Post',
			'telaio_prima' => 'Telaio Prima',
			'vetro_prima'  => 'Vetro Prima',
			'telaio_dopo'  => 'Telaio Dopo',
			'vetro_dopo'   => 'Vetro Dopo',
			'oscurante'    => 'Oscurante',
		];

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->practice->fixtures()->create([
				'condomino_id' => $this->condomino_id,
				'is_common'    => $this->is_common,
				'description'  => $this->description,
				'superficie'   => $this->superficie,
				'trasm_ante'   => $this->trasm_ante,
				'trasm_post'   => $this->trasm_post,
				'telaio_prima' => $this->telaio_prima,
				'vetro_prima'  => $this->vetro_prima,
				'telaio_dopo'  => $this->telaio_dopo,
				'vetro_dopo'   => $this->vetro_dopo,
				'oscurante'    => $this->oscurante,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Infissi salvati con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.fixtures', 'fixture-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-fixture');
		}
	}
