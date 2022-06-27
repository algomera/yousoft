<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class AddSunscreen extends ModalComponent
	{
		public $practice;
		public $condomino_id;
		public $is_common;
		public $tipo_schermatura = 'Persiana';
		public $installazione = 'Interna';
		public $sup_schermatura;
		public $sup_finestra_protetta;
		public $resist_termica_suppl;
		public $orientamento = 'Nord';
		public $tipo_di_calcolo = 'Dichiarato dal produttore';
		public $gtot;
		public $classe_scherm;
		public $materiale_scherm = 'Tessuto';
		public $meccanismo_reg = 'Manuale';
		protected $rules = [
			'tipo_schermatura'      => 'nullable|string',
			'installazione'         => 'nullable|string',
			'sup_schermatura'       => 'nullable|numeric',
			'sup_finestra_protetta' => 'nullable|numeric',
			'resist_termica_suppl'  => 'nullable|numeric',
			'orientamento'          => 'nullable|string',
			'tipo_di_calcolo'       => 'nullable|string',
			'gtot'                  => 'nullable|numeric|between:0,0.35',
			'classe_scherm'         => 'nullable|string',
			'materiale_scherm'      => 'nullable|string',
			'meccanismo_reg'        => 'nullable|string',
		];

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->validate([
				'gtot' => 'numeric|between:0,0.35'
			]);
			$this->practice->sunscreens()->create([
				'condomino_id'          => $this->condomino_id,
				'is_common'             => $this->is_common,
				'tipo_schermatura'      => $this->tipo_schermatura,
				'installazione'         => $this->installazione,
				'sup_schermatura'       => $this->sup_schermatura,
				'sup_finestra_protetta' => $this->sup_finestra_protetta,
				'resist_termica_suppl'  => $this->resist_termica_suppl,
				'orientamento'          => $this->orientamento,
				'tipo_di_calcolo'       => $this->tipo_di_calcolo,
				'gtot'                  => $this->gtot,
				'classe_scherm'         => $this->classe_scherm,
				'materiale_scherm'      => $this->materiale_scherm,
				'meccanismo_reg'        => $this->meccanismo_reg,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Schermatura/Chiusura salvata con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.sunscreens', 'sunscreen-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-sunscreen');
		}
	}
