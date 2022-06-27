<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class AddHeatPump extends ModalComponent
	{
		public $practice;
		public $condomino_id;
		public $is_common;
		public $tipo_sostituito = 'Caldaia standard';
		public $p_nom_sostituito;
		public $tipo_di_pdc = 'Aria/Aria';
		public $tipo_roof_top;
		public $potenza_nominale;
		public $p_elettrica_assorbita;
		public $inverter;
		public $cop;
		public $reversibile;
		public $eer;
		public $sonde_geotermiche;
		public $sup_riscaldata_dalla_pdc;
		protected $rules = [
			'tipo_sostituito'          => 'nullable|string',
			'p_nom_sostituito'         => 'nullable|numeric',
			'tipo_di_pdc'              => 'nullable|string',
			'tipo_roof_top'            => 'nullable|boolean',
			'potenza_nominale'         => 'nullable|numeric',
			'p_elettrica_assorbita'    => 'nullable|numeric',
			'inverter'                 => 'nullable|boolean',
			'cop'                      => 'nullable|string',
			'reversibile'              => 'nullable|boolean',
			'eer'                      => 'nullable|string',
			'sonde_geotermiche'        => 'nullable|boolean',
			'sup_riscaldata_dalla_pdc' => 'nullable|numeric',
		];

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->practice->heat_pumps()->create([
				'condomino_id'             => $this->condomino_id,
				'is_common'                => $this->is_common,
				'tipo_sostituito'          => $this->tipo_sostituito,
				'p_nom_sostituito'         => $this->p_nom_sostituito,
				'tipo_di_pdc'              => $this->tipo_di_pdc,
				'tipo_roof_top'            => $this->tipo_roof_top,
				'potenza_nominale'         => $this->potenza_nominale,
				'p_elettrica_assorbita'    => $this->p_elettrica_assorbita,
				'inverter'                 => $this->inverter,
				'cop'                      => $this->cop,
				'reversibile'              => $this->reversibile,
				'eer'                      => $this->eer,
				'sonde_geotermiche'        => $this->sonde_geotermiche,
				'sup_riscaldata_dalla_pdc' => $this->sup_riscaldata_dalla_pdc,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Pompa di calore salvata con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.heat-pumps', 'heat-pump-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-heat-pump');
		}
	}
