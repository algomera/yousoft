<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use Livewire\Component;

	class Applicant extends Component
	{
		public $applicant;
		public $applicant_type;
		public $company_name;
		public $c_f;
		public $phone;
		public $mobile_phone;
		public $email;
		public $role;
		protected $rules = [
			'applicant_type' => 'nullable|string',
			'company_name'   => 'nullable|string',
			'c_f'            => 'nullable|string|size:16',
			'phone'          => 'nullable|string|size:10',
			'mobile_phone'   => 'nullable|string|size:10',
			'email'          => 'nullable|email:rfc,dns',
			'role'           => 'nullable|string',
		];

		public function mount() {
			$this->applicant_type = $this->applicant->applicant_type ?: 'impresa';
			$this->company_name = $this->applicant->company_name;
			$this->c_f = $this->applicant->c_f;
			$this->phone = $this->applicant->phone;
			$this->mobile_phone = $this->applicant->mobile_phone;
			$this->email = $this->applicant->email;
			$this->role = $this->applicant->role;
		}

		public function save() {
			$validated = $this->validate();
			$this->applicant->update($validated);
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
