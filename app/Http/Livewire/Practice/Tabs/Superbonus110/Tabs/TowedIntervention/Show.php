<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\TowedIntervention;

	use App\Condomini;
	use App\Helpers\Money;
	use App\Practice as PracticeModel;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;

	class Show extends Component
	{
		use AuthorizesRequests;
		public PracticeModel $practice;
		public $towed_intervention;
		public $condomino_id = null;
		public $condomino = null;
		public $is_common = 0;
		public $currentSurface = 'PV';
		protected $rules = [
			'towed_intervention.thermical_isolation_intervention' => 'nullable|boolean',
			'towed_intervention.total_intervention_surface'       => 'nullable|numeric',
			'towed_intervention.total_expected_cost'              => 'nullable|numeric',
			'towed_intervention.work_expected_cost'               => 'nullable|numeric',
			'towed_intervention.in_project_cost'                  => 'nullable|numeric',
			'towed_intervention.in_max_cost'                      => 'nullable|numeric',
			'towed_intervention.in_energetic_savings'             => 'nullable|string',
			'towed_intervention.ss_project_cost'                  => 'nullable|numeric',
			'towed_intervention.ss_max_cost'                      => 'nullable|numeric',
			'towed_intervention.ss_energetic_savings'             => 'nullable|string',
			'towed_intervention.wacs_replacement'                 => 'nullable|boolean',
			'towed_intervention.sa_project_cost'                  => 'nullable|numeric',
			'towed_intervention.sa_max_cost'                      => 'nullable|numeric',
			'towed_intervention.sa_energetic_savings'             => 'nullable|string',
			'towed_intervention.co_project_cost'                  => 'nullable|numeric',
			'towed_intervention.co_max_cost'                      => 'nullable|numeric',
			'towed_intervention.co_energetic_savings'             => 'nullable|string',
			'towed_intervention.ib_project_cost'                  => 'nullable|numeric',
			'towed_intervention.ib_max_cost'                      => 'nullable|numeric',
			'towed_intervention.ib_energetic_savings'             => 'nullable|string',
			'towed_intervention.ba'                               => 'nullable|boolean',
			'towed_intervention.ba_winter_acs'                    => 'nullable|string',
			'towed_intervention.ba_summer_acs'                    => 'nullable|string',
			'towed_intervention.ba_hot_water_production'          => 'nullable|string',
			'towed_intervention.ba_usable_area'                   => 'nullable|numeric',
			'towed_intervention.ba_project_cost'                  => 'nullable|numeric',
			'towed_intervention.ba_max_cost'                      => 'nullable|numeric',
			'towed_intervention.ba_energetic_savings'             => 'nullable|string',
			'towed_intervention.use_winter'                       => 'nullable|boolean',
			'towed_intervention.use_summer'                       => 'nullable|boolean',
			'towed_intervention.use_water'                        => 'nullable|boolean',
			'towed_intervention.st_project_cost'                  => 'nullable|numeric',
			'towed_intervention.st_max_cost'                      => 'nullable|numeric',
			'towed_intervention.st_energetic_savings'             => 'nullable|string',
			'towed_intervention.fv'                               => 'nullable|boolean',
			'towed_intervention.fv_pod_code'                      => 'nullable|string',
			'towed_intervention.fv_max_power'                     => 'nullable|numeric',
			'towed_intervention.fv_project_cost'                  => 'nullable|numeric',
			'towed_intervention.fv_max_cost'                      => 'nullable|numeric',
			'towed_intervention.ac'                               => 'nullable|boolean',
			'towed_intervention.ac_capacity'                      => 'nullable|numeric',
			'towed_intervention.ac_project_cost'                  => 'nullable|numeric',
			'towed_intervention.ac_max_cost'                      => 'nullable|numeric',
			'towed_intervention.cr'                               => 'nullable|boolean',
			'towed_intervention.cr_installed_columns'             => 'nullable|numeric',
			'towed_intervention.cr_project_cost'                  => 'nullable|numeric',
			'towed_intervention.cr_max_cost'                      => 'nullable|numeric',
			'towed_intervention.eba'                              => 'nullable|boolean',
			'towed_intervention.eba_project_cost'                 => 'nullable|numeric',
			'towed_intervention.eba_sismic_cost'                  => 'nullable|numeric',
			'towed_intervention.eba_barr_deleting_cost'           => 'nullable|numeric',
			'towed_intervention.eba_max_cost'                     => 'nullable|numeric',
			'towed_intervention.total_towed_cost_1'               => 'nullable|numeric',
			'towed_intervention.total_towed_cost_2'               => 'nullable|numeric',
			'towed_intervention.final_towed_cost'                 => 'nullable|numeric',
			'towed_intervention.max_towed_cost'                   => 'nullable|numeric',
		];

		public function mount() {
			$this->towed_intervention = $this->practice->towed_intervention()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->first();
			$this->condomino = Condomini::find($this->condomino_id);
		}

		public function save() {
			$this->authorize('update', $this->practice);
			$validated = $this->validate();
			$this->towed_intervention->update();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('Dati aggiornati con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.show', 'change-tab', 'final_state');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.towed-intervention.show');
		}
	}
