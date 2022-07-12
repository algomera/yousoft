<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Practice as PracticeModel;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;

	class Applicant extends Component
	{
		use AuthorizesRequests;
		public PracticeModel $practice;
		public $applicant;
		protected $rules = [
			'applicant.applicant_type' => 'required|string',
			'applicant.company_name'   => 'required|string',
			'applicant.c_f'            => 'required|string|size:16',
			'applicant.phone'          => 'required|string|size:10',
			'applicant.mobile_phone'   => 'required|string|size:10',
			'applicant.email'          => 'required|email:rfc,dns',
			'applicant.role'           => 'required|string',
		];
		protected $validationAttributes = [
			'applicant_type' => 'Richiedente',
			'company_name'   => 'Nome impresa',
			'c_f'            => 'Codice Fiscale o Partita IVA',
			'phone'          => 'Telefono',
			'mobile_phone'   => 'Cellulare',
			'email'          => 'Email',
			'role'           => 'Ruolo nella Pratica',
		];

		public function mount(PracticeModel $practice) {
			$this->practice = $practice;
			$this->applicant = $this->practice->applicant;
			$this->applicant->applicant_type = $this->applicant->applicant_type ?: 'impresa';
		}

		public function save() {
			$this->authorize('update', $this->practice);
			$validated = $this->validate();
			$this->practice->applicant->update($validated['applicant']);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('Il richiedente è stato aggiornato con successo!')
			]);
			$this->emitUp('change-tab', 'practice');
		}

		public function render() {
			return view('livewire.practice.tabs.applicant');
		}
	}
