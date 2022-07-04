<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\FinalState\Modals;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class AddGenerator extends ModalComponent
	{
		public $practice;
		public $generator_type = 'Caldaia standard';
		public $generator_number;
		public $performance_percentage;
		public $useful_power;
		protected $rules = [
			'generator_type'         => 'nullable|string',
			'generator_number'       => 'nullable|numeric',
			'performance_percentage' => 'nullable|numeric',
			'useful_power'           => 'nullable|numeric',
		];
		protected $validationAttributes = [
			'generator_type'         => 'Tipo',
			'generator_number'       => 'N° di generatori',
			'performance_percentage' => 'Rendimento al 100% della potenza',
			'useful_power'           => 'Potenza utile complessiva',
		];

		public function mount(PracticeModel $practice) {
			$this->practice = $practice;
		}

		public function save() {
			$this->practice->generators()->create([
				'generator_type'         => $this->generator_type,
				'generator_number'       => $this->generator_number,
				'performance_percentage' => $this->performance_percentage,
				'useful_power'           => $this->useful_power,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Generatore salvato con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.tabs.final-state.generators', 'generator-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.final-state.modals.add-generator');
		}
	}
