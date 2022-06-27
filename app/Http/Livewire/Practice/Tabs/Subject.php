<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Anagrafica;
	use App\SubjectRole;
	use Illuminate\Validation\Rule;
	use Livewire\Component;

	class Subject extends Component
	{
		public $practice;
		public $subject;
		public $consultant;
		public $lending_bank;
		public $general_contractor;
		public $construction_company;
		public $hydrothermal_sanitary_company;
		public $photovoltaic_company;
		public $technician_APE_Ante;
		public $structural_engineer;
		public $work_director;
		public $technical_assev;
		public $fiscal_assev;
		public $phiscal_transferee;
		public $insurer;
		public $area_manager;
		public $technician_energy_efficient;
		public $technician_APE_Post;
		public $metric_calc_technician;
		public $project_manager;
		public $responsible_technician;
		public $consultant_list;
		public $lending_bank_list;
		public $general_contractor_list;
		public $construction_company_list;
		public $hydrothermal_sanitary_company_list;
		public $photovoltaic_company_list;
		public $technician_APE_Ante_list;
		public $structural_engineer_list;
		public $work_director_list;
		public $technical_assev_list;
		public $fiscal_assev_list;
		public $phiscal_transferee_list;
		public $insurer_list;
		public $area_manager_list;
		public $technician_energy_efficient_list;
		public $technician_APE_Post_list;
		public $metric_calc_technician_list;
		protected $listeners = [
			'subject-selected'   => '$refresh',
			'anagrafica-created'   => 'setSubject',
			'anagrafica-updated' => '$refresh',
		];

		public function setSubject($id, $role) {
			$slug = SubjectRole::find($role)->pluck('slug');
			$new_anagrafica = Anagrafica::find($id);
			$this->subject[$slug[0]] = $id;
			$this->subject->save();
			$slug_list = $slug[0] . '_list';
			$this->{$slug_list}[] = $new_anagrafica;
			$this->{$slug[0]} = $new_anagrafica;
			$this->emitSelf('subject-selected');
		}

		public function mount() {
			$this->subject = $this->practice->subject;
			$this->consultant_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 3);
			})->get();
			$this->lending_bank_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 4);
			})->get();
			$this->general_contractor_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 5);
			})->get();
			$this->construction_company_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 6);
			})->get();
			$this->hydrothermal_sanitary_company_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 7);
			})->get();
			$this->photovoltaic_company_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 8);
			})->get();
			$this->technician_APE_Ante_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 9);
			})->get();
			$this->structural_engineer_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 10);
			})->get();
			$this->work_director_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 11);
			})->get();
			$this->technical_assev_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 12);
			})->get();
			$this->fiscal_assev_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 13);
			})->get();
			$this->phiscal_transferee_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 15);
			})->get();
			$this->insurer_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 16);
			})->get();
			$this->area_manager_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 17);
			})->get();
			$this->technician_energy_efficient_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 18);
			})->get();
			$this->technician_APE_Post_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 19);
			})->get();
			$this->metric_calc_technician_list = Anagrafica::withParents()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 20);
			})->get();
			$this->project_manager = $this->subject->project_manager;
			$this->responsible_technician = $this->subject->responsible_technician;
		}

		protected function rules() {
			return [
				'general_contractor'            => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'construction_company'          => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'hydrothermal_sanitary_company' => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'photovoltaic_company'          => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'technician_APE_Ante'           => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'technician_energy_efficient'   => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'technician_APE_Post'           => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'structural_engineer'           => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'metric_calc_technician'        => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'work_director'                 => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'technical_assev'               => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'fiscal_assev'                  => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'phiscal_transferee'            => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'lending_bank'                  => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'insurer'                       => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'consultant'                    => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'area_manager'                  => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'project_manager'               => 'nullable|string',
				'responsible_technician'        => 'nullable|string',
			];
		}

		public function updated($name, $value) {
			$this->subject[$name] = empty($value) ? null : (int)$value;
			$this->subject->save();
			$this->emitSelf('subject-selected');
		}

		public function save() {
			$this->validate();
			$this->subject->update([
				'project_manager' => $this->project_manager,
				'responsible_technician' => $this->responsible_technician
			]);

			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('I soggetti sono stati aggiornati con successo!')
			]);

			$this->emitUp('change-tab', 'building');
		}

		public function render() {
			$this->consultant = $this->subject['consultant'];
			$this->lending_bank = $this->subject['lending_bank'];
			$this->general_contractor = $this->subject['general_contractor'];
			$this->construction_company = $this->subject['construction_company'];
			$this->hydrothermal_sanitary_company = $this->subject['hydrothermal_sanitary_company'];
			$this->photovoltaic_company = $this->subject['photovoltaic_company'];
			$this->technician_APE_Ante = $this->subject['technician_APE_Ante'];
			$this->structural_engineer = $this->subject['structural_engineer'];
			$this->work_director = $this->subject['work_director'];
			$this->technical_assev = $this->subject['technical_assev'];
			$this->fiscal_assev = $this->subject['fiscal_assev'];
			$this->phiscal_transferee = $this->subject['phiscal_transferee'];
			$this->insurer = $this->subject['insurer'];
			$this->area_manager = $this->subject['area_manager'];
			$this->technician_energy_efficient = $this->subject['technician_energy_efficient'];
			$this->technician_APE_Post = $this->subject['technician_APE_Post'];
			$this->metric_calc_technician = $this->subject['metric_calc_technician'];
			return view('livewire.practice.tabs.subject');
		}
	}
