<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Practice as PracticeModel;
	use Livewire\Component;

	class Practice extends Component
	{
		public PracticeModel $practice;
		protected $rules = [
			'practice.import'           => 'required|numeric',
			'practice.practical_phase'  => 'required|string',
			'practice.real_estate_type' => 'required|string',
			'practice.policy_name'      => 'required|string',
			'practice.address'          => 'required|string',
			'practice.civic'            => 'required|string',
			'practice.common'           => 'required|string',
			'practice.province'         => 'required|string|size:2',
			'practice.region'           => 'required|string',
			'practice.cap'              => 'required|string|size:5',
			'practice.work_start'       => 'required|string',
			'practice.c_m'              => 'required|numeric',
			'practice.assev_tecnica'    => 'nullable|numeric',
			'practice.description'      => 'nullable|string',
			'practice.referent_email'   => 'nullable|email:rfc,dns',
			'practice.referent_mobile'  => 'nullable|string',
			'practice.policy'           => 'boolean',
			'practice.request_policy'   => 'nullable|string',
			'practice.superbonus'       => 'boolean',
			'practice.sal_1_work_start' => 'nullable',
			'practice.sal_1_import'     => 'nullable|numeric',
			'practice.sal_2_work_start' => 'nullable',
			'practice.sal_2_import'     => 'nullable|numeric',
			'practice.sal_f_work_start' => 'nullable',
			'practice.sal_f_import'     => 'nullable|numeric',
			'practice.note'             => 'nullable|string',
			'practice.practice_ok'      => 'boolean',
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

		public function mount(PracticeModel $practice) {
			$this->practice = $practice;
		}

		public function updatingPolicy() {
			$this->practice->request_policy = null;
		}

		public function updatingSuperbonus() {
			$this->practice->superbonus_work_start = null;
			$this->practice->sal = null;
			$this->practice->import_sal = null;
		}

		public function save() {
			$this->authorize('update', $this->practice);
			$validated = $this->validate();
			$validated['practice']['applicant_id'] = $this->practice->applicant->id;
			if (array_key_exists('province', $validated['practice'])) {
				$validated['practice']['province'] = strtoupper($validated['practice']['province']);
			}
			$this->practice->update($validated['practice']);
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
