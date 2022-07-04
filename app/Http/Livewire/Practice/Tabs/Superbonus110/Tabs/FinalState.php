<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs;

	use App\Practice as PracticeModel;
	use Livewire\Component;

	class FinalState extends Component
	{
		public PracticeModel $practice;
		public $final_state;

		public function mount() {
			$this->final_state = $this->practice->final_state;
		}

		protected $rules = [
			'final_state.plant_type'                  => 'nullable|string',
			'final_state.heat_terminals'              => 'nullable|string',
			'final_state.distribution_type'           => 'nullable|string',
			'final_state.adjustment_type'             => 'nullable|string',
			'final_state.overall_power'               => 'nullable|numeric',
			'final_state.energetic_vector'            => 'nullable|string',
			'final_state.summer_acs_presence'         => 'nullable|boolean',
			'final_state.summer_acs_renovation'       => 'nullable|string',
			'final_state.construction_tipology'       => 'nullable|string',
			'final_state.heated_volume'               => 'nullable|numeric',
			'final_state.dispersing_surface'          => 'nullable|numeric',
			'final_state.SV_report'                   => 'nullable|numeric',
			'final_state.useful_heated_surface'       => 'nullable|numeric',
			'final_state.useful_cooled_surface'       => 'nullable|numeric',
			'final_state.generator_inst_date'         => 'nullable|numeric|integer|digits:4',
			'final_state.extra_maintenance'           => 'nullable|string',
			'final_state.winter_acs'                  => 'nullable|boolean',
			'final_state.hot_water_production'        => 'nullable|boolean',
			'final_state.mechanic_ventilation'        => 'nullable|boolean',
			'final_state.summer_acs'                  => 'nullable|boolean',
			'final_state.lighting'                    => 'nullable|boolean',
			'final_state.transport'                   => 'nullable|boolean',
			'final_state.project_temperature'         => 'nullable|numeric',
			'final_state.fotovoltaic_max_power'       => 'nullable|numeric',
			'final_state.eolic_nominal_power'         => 'nullable|numeric',
			'final_state.collector_surface'           => 'nullable|numeric',
			'final_state.technical_standard'          => 'nullable|string',
			'final_state.energetic_evaluation_method' => 'nullable|string',
			'final_state.building_description'        => 'nullable|string',
			'final_state.nr_energy_perf_index'        => 'nullable|numeric',
			'final_state.r_energy_perf_index'         => 'nullable|numeric',
			'final_state.EPH'                         => 'nullable|numeric',
			'final_state.Asup'                        => 'nullable|numeric',
			'final_state.YIE'                         => 'nullable|numeric',
			'final_state.EPgl_nren'                   => 'nullable|numeric',
			'final_state.invernal_case_quality'       => 'nullable|string',
			'final_state.summer_case_quality'         => 'nullable|string',
			'final_state.energetic_class'             => 'nullable|string',
			'final_state.people_transport'            => 'nullable|boolean',
			'final_state.possible_improvements'       => 'nullable|string',
		];

		protected $validationAttributes = [
			'plant_type'                  => 'Tipo di impianto',
			'heat_terminals'              => 'Tipo di erogazione del calore',
			'distribution_type'           => 'Tipo di distribuzione',
			'adjustment_type'             => 'Tipo di regolazione',
			'overall_power'               => 'Potenza nominale complessiva',
			'energetic_vector'            => 'Vettore energetico prevalente',
			'summer_acs_renovation'       => 'Eventuali interventi di manutenzione straordinaria',
			'construction_tipology'       => 'Tipologia costruttiva',
			'heated_volume'               => 'Volume lordo riscaldato V',
			'dispersing_surface'          => 'Superficie disperdente S',
			'SV_report'                   => 'Rapposto S/V',
			'useful_heated_surface'       => 'Superficie utile riscaldata',
			'useful_cooled_surface'       => 'Superficie utile raffrescata',
			'generator_inst_date'         => 'Anno di installazione del generatore',
			'extra_maintenance'           => 'Eventuali interventi di manutenzione straordinaria o ristrutturazione',
			'project_temperature'         => 'Temperatura di progetto',
			'fotovoltaic_max_power'       => 'Fotovoltaico potenza di picco',
			'eolic_nominal_power'         => 'Eolico potenza nominale',
			'collector_surface'           => 'Solare termico superficie dei collettori',
			'technical_standard'          => 'Riferimento alle norme tecniche utilizzate',
			'energetic_evaluation_method' => 'Metodo di valutazione della prestazione energetica utilizzato',
			'building_description'        => 'Descrizione dell\'edificio',
			'nr_energy_perf_index'        => 'Indice di prestazione energetica non rinnovabile',
			'r_energy_perf_index'         => 'Indice di prestazione energetica rinnovabile',
			'EPH'                         => 'EPH,nd',
			'Asup'                        => 'Asol, est/Asup utile',
			'YIE'                         => 'YIE',
			'EPgl_nren'                   => 'Indice di prestazione energetica globale',
			'invernal_case_quality'       => 'Qualità invernale involucro',
			'summer_case_quality'         => 'Qualità estiva involucro',
			'energetic_class'             => 'Classe energetica',
			'possible_improvements'       => 'Possibili interventi di miglioramento',
		];

		public function save() {
			$validated = $this->validate();
			$this->final_state->update($validated['final_state']);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('Dati aggiornati con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.show', 'change-tab', 'fees_declaration');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.final-state');
		}
	}
