<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use LivewireUI\Modal\ModalComponent;

	class AddCondensingBoiler extends ModalComponent
	{
		use AuthorizesRequests;
		public $practice;
		public $condomino_id;
		public $is_common;
		public $tipo_sostituito = 'Caldaia standard';
		public $p_nom_sostituito;
		public $potenza_nominale;
		public $rend_utile_nom;
		public $use_destination = 'Riscaldameto ambiente';
		public $efficienza_ns;
		public $efficienza_acs_nwh;
		public $tipo_di_alimentazione = 'Metano';
		public $classe_termo_evoluto = 'V';
		protected $rules = [
			'tipo_sostituito'       => 'nullable|string',
			'p_nom_sostituito'      => 'nullable|numeric',
			'potenza_nominale'      => 'nullable|numeric',
			'rend_utile_nom'        => 'nullable|numeric',
			'use_destination'       => 'nullable|string',
			'efficienza_ns'         => 'nullable|numeric',
			'efficienza_acs_nwh'    => 'nullable|numeric',
			'tipo_di_alimentazione' => 'nullable|string',
			'classe_termo_evoluto'  => 'nullable|string',
		];

		protected $validationAttributes = [
			'tipo_sostituito'       => 'Tipo sostituito',
			'p_nom_sostituito'      => 'P. nom. sostituito',
			'potenza_nominale'      => 'Potenza nominale',
			'rend_utile_nom'        => 'Rend. utile nom.',
			'use_destination'       => 'Destinazione d\'uso',
			'efficienza_ns'         => 'Efficienza ns',
			'efficienza_acs_nwh'    => 'Efficienza ACS nwh',
			'tipo_di_alimentazione' => 'Tipo di alimentazione',
			'classe_termo_evoluto'  => 'Classe disp. termoregolazione evoluto',
		];

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->authorize('update', $this->practice);
			$this->practice->condensing_boilers()->create([
				'condomino_id'          => $this->condomino_id,
				'is_common'             => $this->is_common,
				'tipo_sostituito'       => $this->tipo_sostituito,
				'p_nom_sostituito'      => $this->p_nom_sostituito,
				'potenza_nominale'      => $this->potenza_nominale,
				'rend_utile_nom'        => $this->rend_utile_nom,
				'use_destination'       => $this->use_destination,
				'efficienza_ns'         => $this->efficienza_ns,
				'efficienza_acs_nwh'    => $this->efficienza_acs_nwh,
				'tipo_di_alimentazione' => $this->tipo_di_alimentazione,
				'classe_termo_evoluto'  => $this->classe_termo_evoluto,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Caldaia a condensazione salvata con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.condensing-boilers', 'condensing-boiler-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-condensing-boiler');
		}
	}
