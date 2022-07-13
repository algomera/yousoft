<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use LivewireUI\Modal\ModalComponent;

	class AddWaterHeatpumpInstallation extends ModalComponent
	{
		use AuthorizesRequests;
		public $practice;
		public $condomino_id;
		public $is_common;
		public $tipo_scaldacqua_sostituito;
		public $pu_scaldacqua_sostituito;
		public $pu_scaldacqua_a_pdc;
		public $cop_nuovo_scaldacqua;
		public $capacita_accumulo;
		protected $rules = [
			'tipo_scaldacqua_sostituito' => 'nullable|string',
			'pu_scaldacqua_sostituito'   => 'nullable|numeric',
			'pu_scaldacqua_a_pdc'        => 'nullable|numeric',
			'cop_nuovo_scaldacqua'       => 'nullable|numeric',
			'capacita_accumulo'          => 'nullable|numeric',
		];
		protected $validationAttributes = [
			'tipo_scaldacqua_sostituito' => 'Tipo scaldacqua sostituito',
			'pu_scaldacqua_sostituito'   => 'Pu scaldacqua sostituito',
			'pu_scaldacqua_a_pdc'        => 'Pu scaldacqua a PDC',
			'cop_nuovo_scaldacqua'       => 'COP nuovo scaldacqua',
			'capacita_accumulo'          => 'Capacità accumulo',
		];

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->authorize('update', $this->practice);
			$this->practice->water_heatpumps_installations()->create([
				'condomino_id'               => $this->condomino_id,
				'is_common'                  => $this->is_common,
				'tipo_scaldacqua_sostituito' => $this->tipo_scaldacqua_sostituito,
				'pu_scaldacqua_sostituito'   => $this->pu_scaldacqua_sostituito,
				'pu_scaldacqua_a_pdc'        => $this->pu_scaldacqua_a_pdc,
				'cop_nuovo_scaldacqua'       => $this->cop_nuovo_scaldacqua,
				'capacita_accumulo'          => $this->capacita_accumulo,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Scaldacqua salvato con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.water-heatpumps-installations', 'water-heatpump-installation-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-water-heatpump-installation');
		}
	}
