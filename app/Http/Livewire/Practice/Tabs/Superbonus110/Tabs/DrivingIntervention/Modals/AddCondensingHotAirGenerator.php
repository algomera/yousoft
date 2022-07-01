<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class AddCondensingHotAirGenerator extends ModalComponent
	{
		public $practice;
		public $condomino_id;
		public $is_common;
		public $tipo_sostituito = 'Caldaia standard';
		public $p_nom_sostituito;
		public $potenza_nominale;
		public $rend_utile_nom;
		public $tipo_di_alimentazione = 'Metano';
		protected $rules = [
			'tipo_sostituito'       => 'nullable|string',
			'p_nom_sostituito'      => 'nullable|numeric',
			'potenza_nominale'      => 'nullable|numeric',
			'rend_utile_nom'        => 'nullable|numeric',
			'tipo_di_alimentazione' => 'nullable|string',
		];

		protected $validationAttributes = [
			'tipo_sostituito'       => 'Tipo sostituito',
			'p_nom_sostituito'      => 'P. nom. sostituito',
			'potenza_nominale'      => 'Potenza nominale',
			'rend_utile_nom'        => 'Rend. utile nom.',
			'tipo_di_alimentazione' => 'Tipo di alimentazione',
		];

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->practice->condensing_hot_air_generators()->create([
				'condomino_id'          => $this->condomino_id,
				'is_common'             => $this->is_common,
				'tipo_sostituito'       => $this->tipo_sostituito,
				'p_nom_sostituito'      => $this->p_nom_sostituito,
				'potenza_nominale'      => $this->potenza_nominale,
				'rend_utile_nom'        => $this->rend_utile_nom,
				'tipo_di_alimentazione' => $this->tipo_di_alimentazione,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Generatore di aria calda salvato con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.condensing-hot-air-generators', 'condensing-hot-air-generator-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-condensing-hot-air-generator');
		}
	}
