<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class AddAbsorptionHeatPump extends ModalComponent
	{
		public $practice;
		public $condomino_id;
		public $is_common;
		public $tipo_sostituito = 'Caldaia standard';
		public $p_nom_sostituito;
		public $tipo_di_pdc = 'Aria/Aria';
		public $tipo_roof_top;
		public $potenza_nominale;
		public $gueh;
		public $guec;
		public $reversibile;
		public $sup_riscaldata_dalla_pdc;
		protected $rules = [
			'tipo_sostituito'          => 'nullable|string',
			'p_nom_sostituito'         => 'nullable|numeric',
			'tipo_di_pdc'              => 'nullable|string',
			'tipo_roof_top'            => 'nullable|boolean',
			'potenza_nominale'         => 'nullable|numeric',
			'gueh'                     => 'nullable|numeric',
			'guec'                     => 'nullable|numeric',
			'reversibile'              => 'nullable|boolean',
			'sup_riscaldata_dalla_pdc' => 'nullable|numeric',
		];

		protected $validationAttributes = [
			'tipo_sostituito'          => 'Tipo sostituito',
			'p_nom_sostituito'         => 'P. nom. sostituito',
			'tipo_di_pdc'              => 'Tipo di PDC',
			'tipo_roof_top'            => 'Tipo Roof Top',
			'potenza_nominale'         => 'Potenza nominale',
			'gueh'                     => 'GUEh',
			'guec'                     => 'GUEc',
			'reversibile'              => 'Reversibile',
			'sup_riscaldata_dalla_pdc' => 'Sup. riscaldata dalla PDC',
		];

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->practice->absorption_heat_pumps()->create([
				'condomino_id'             => $this->condomino_id,
				'is_common'                => $this->is_common,
				'tipo_sostituito'          => $this->tipo_sostituito,
				'p_nom_sostituito'         => $this->p_nom_sostituito,
				'tipo_di_pdc'              => $this->tipo_di_pdc,
				'tipo_roof_top'            => $this->tipo_roof_top,
				'potenza_nominale'         => $this->potenza_nominale,
				'gueh'                     => $this->gueh,
				'guec'                     => $this->guec,
				'reversibile'              => $this->reversibile,
				'sup_riscaldata_dalla_pdc' => $this->sup_riscaldata_dalla_pdc,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Pompa di calore salvata con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.absorption-heat-pumps', 'absorption-heat-pump-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-absorption-heat-pump');
		}
	}
