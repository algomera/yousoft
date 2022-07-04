<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Helpers\Money;
	use Livewire\Component;

	class Practice extends Component
	{
		public $practice;
		public $import;
		public $practical_phase;
		public $real_estate_type;
		public $policy_name;
		public $address;
		public $civic;
		public $common;
		public $province;
		public $region;
		public $cap;
		public $work_start;
		public $c_m;
		public $assev_tecnica;
		public $description;
		public $referent_email;
		public $referent_mobile;
		public $policy;
		public $request_policy;
		public $superbonus;
		public $sal_1_work_start;
		public $sal_1_import;
		public $sal_2_work_start;
		public $sal_2_import;
		public $sal_f_work_start;
		public $sal_f_import;
		public $note;
		public $practice_ok;
		protected $rules = [
			'import'           => 'required|numeric',
			'practical_phase'  => 'required|string',
			'real_estate_type' => 'required|string',
			'policy_name'      => 'required|string',
			'address'          => 'required|string',
			'civic'            => 'required|string',
			'common'           => 'required|string',
			'province'         => 'required|string|size:2',
			'region'           => 'required|string',
			'cap'              => 'required|string|size:5',
			'work_start'       => 'required|string',
			'c_m'              => 'required|numeric',
			'assev_tecnica'    => 'nullable|numeric',
			'description'      => 'nullable|string',
			'referent_email'   => 'nullable|email:rfc,dns',
			'referent_mobile'  => 'nullable|string',
			'policy'           => 'boolean',
			'request_policy'   => 'nullable|string',
			'superbonus'       => 'boolean',
			'sal_1_work_start' => 'nullable',
			'sal_1_import'     => 'nullable|numeric',
			'sal_2_work_start' => 'nullable',
			'sal_2_import'     => 'nullable|numeric',
			'sal_f_work_start' => 'nullable',
			'sal_f_import'     => 'nullable|numeric',
			'note'             => 'nullable|string',
			'practice_ok'      => 'boolean',
		];
		protected $validationAttributes = [
			'import'           => 'Importo stimato',
			'practical_phase'  => 'Fase pratica',
			'real_estate_type' => 'Tipo Immobile',
			'policy_name'      => 'Denominazione',
			'address'          => 'Indirizzo',
			'civic'            => 'N.',
			'common'           => 'Comune',
			'province'         => 'Provincia',
			'region'           => 'Regione',
			'cap'              => 'CAP',
			'work_start'       => 'Inizio lavori',
			'c_m'              => 'Importo C.M',
			'assev_tecnica'    => 'Assev. Tecnica (no IVA)',
			'description'      => 'Descrizione',
			'referent_email'   => 'Email di riferimento',
			'referent_mobile'  => 'Cellulare di riferimento',
			'request_policy'   => 'Richiedente',
			'superbonus'       => 'Tipologia intervento',
			'sal_1_work_start' => 'Data lavorazione',
			'sal_1_import'     => 'Importo SAL/Lavori',
			'sal_2_work_start' => 'Data lavorazione',
			'sal_2_import'     => 'Importo SAL/Lavori',
			'sal_f_work_start' => 'Data lavorazione',
			'sal_f_import'     => 'Importo SAL/Lavori',
			'note'             => 'Note',
			'practice_ok'      => 'Pratica in regola',
		];

		public function mount() {
			$this->import = $this->practice->import;
			$this->practical_phase = $this->practice->practical_phase;
			$this->real_estate_type = $this->practice->real_estate_type;
			$this->policy_name = $this->practice->policy_name;
			$this->address = $this->practice->address;
			$this->civic = $this->practice->civic;
			$this->common = $this->practice->common;
			$this->province = $this->practice->province;
			$this->region = $this->practice->region;
			$this->cap = $this->practice->cap;
			$this->work_start = $this->practice->work_start;
			$this->c_m = $this->practice->c_m;
			$this->assev_tecnica = $this->practice->assev_tecnica;
			$this->description = $this->practice->description;
			$this->referent_email = $this->practice->referent_email;
			$this->referent_mobile = $this->practice->referent_mobile;
			$this->policy = $this->practice->policy;
			$this->request_policy = $this->practice->request_policy;
			$this->superbonus = $this->practice->superbonus;
			$this->sal_1_work_start = $this->practice->sal_1_work_start;
			$this->sal_1_import = $this->practice->sal_1_import;
			$this->sal_2_work_start = $this->practice->sal_2_work_start;
			$this->sal_2_import = $this->practice->sal_2_import;
			$this->sal_f_work_start = $this->practice->sal_f_work_start;
			$this->sal_f_import = $this->practice->sal_f_import;
			$this->note = $this->practice->note;
			$this->practice_ok = $this->practice->practice_ok;
		}

		public function updatingPolicy() {
			$this->request_policy = null;
		}

		public function updatingSuperbonus() {
			$this->superbonus_work_start = null;
			$this->sal = null;
			$this->import_sal = null;
		}

		public function save() {
			$validated = $this->validate();
			$validated['applicant_id'] = $this->practice->applicant->id;
			if (array_key_exists('province', $validated)) {
				$validated['province'] = strtoupper($validated['province']);
			}
			$this->practice->update($validated);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('La pratica è stata aggiornata con successo!')
			]);
			$this->emitUp('change-tab', 'subjects');
		}

		public function render() {
			return view('livewire.practice.tabs.practice');
		}
	}
