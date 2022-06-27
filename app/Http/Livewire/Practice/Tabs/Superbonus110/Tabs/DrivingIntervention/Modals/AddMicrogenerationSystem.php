<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class AddMicrogenerationSystem extends ModalComponent
	{
		public $practice;
		public $condomino_id;
		public $is_common;
		public $tipo_sostituito = 'Caldaia standard';
		public $p_nom_sostituito;
		public $p_elettrica;
		public $p_immessa;
		public $p_term_recuperata;
		public $pes;
		public $tipo_di_alimentazione = 'Metano';
		public $tipo_intervento = 'Nuovo';
		public $potenza_risc_suppl;
		public $efficienza_ns;
		public $classe_energ = 'B';
		public $a_celle_a_combustibile;
		public $riscaldatore_suppl;
		protected $rules = [
			'tipo_sostituito'        => 'nullable|string',
			'p_nom_sostituito'       => 'nullable|numeric',
			'p_elettrica'            => 'nullable|numeric',
			'p_immessa'              => 'nullable|numeric',
			'p_term_recuperata'      => 'nullable|numeric',
			'pes'                    => 'nullable|numeric',
			'tipo_di_alimentazione'  => 'nullable|string',
			'tipo_intervento'        => 'nullable|string',
			'potenza_risc_suppl'     => 'nullable|numeric',
			'efficienza_ns'          => 'nullable|numeric',
			'classe_energ'           => 'nullable|string',
			'a_celle_a_combustibile' => 'nullable|boolean',
			'riscaldatore_suppl'     => 'nullable|boolean',
		];

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->practice->microgeneration_systems()->create([
				'condomino_id'           => $this->condomino_id,
				'is_common'              => $this->is_common,
				'tipo_sostituito'        => $this->tipo_sostituito,
				'p_nom_sostituito'       => $this->p_nom_sostituito,
				'p_elettrica'            => $this->p_elettrica,
				'p_immessa'              => $this->p_immessa,
				'p_term_recuperata'      => $this->p_term_recuperata,
				'pes'                    => $this->pes,
				'tipo_di_alimentazione'  => $this->tipo_di_alimentazione,
				'tipo_intervento'        => $this->tipo_intervento,
				'potenza_risc_suppl'     => $this->potenza_risc_suppl,
				'efficienza_ns'          => $this->efficienza_ns,
				'classe_energ'           => $this->classe_energ,
				'a_celle_a_combustibile' => $this->a_celle_a_combustibile,
				'riscaldatore_suppl'     => $this->riscaldatore_suppl,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Sistema salvato con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.microgeneration-systems', 'microgeneration-system-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-microgeneration-system');
		}
	}
