<?php

	namespace App\Http\Livewire\Anagrafica;

	use App\Anagrafica as AnagraficaModel;
	use App\SubjectRole;
	use LivewireUI\Modal\ModalComponent;

	class Edit extends ModalComponent
	{
		public AnagraficaModel $anagrafica;
		public $roles = [];

		protected function rules() {
			return [
				'anagrafica.subject_type'              => 'required',
				'anagrafica.consultant_type'           => 'nullable',
				'anagrafica.company_name'              => 'required|string',
				'anagrafica.first_name'                => 'required|string',
				'anagrafica.last_name'                 => 'required|string',
				'anagrafica.address'                   => 'nullable|string',
				'anagrafica.zip'                       => 'nullable|string|min:5|regex: /[0-9]/',
				'anagrafica.city'                      => 'required|string',
				'anagrafica.province'                  => 'nullable|string|min:2|max:2|regex: /[A-Za-z]/',
				'anagrafica.iban'                      => 'nullable|string|min:32|max:32',
				'anagrafica.vat'                       => 'nullable|string',
				'anagrafica.fiscal_code'               => 'nullable|string|min:16|max:16|regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
				'anagrafica.phone'                     => 'nullable|string|min:10|regex: /[0-9]/',
				'anagrafica.fax'                       => 'nullable|string|min:10|regex: /[0-9]/',
				'anagrafica.email'                     => 'nullable|string|email|max:100|unique:anagrafiche,email,' . $this->anagrafica->id,
				'anagrafica.email_pec'                 => 'nullable|string|email|max:100|unique:anagrafiche,email_pec,' . $this->anagrafica->id,
				'anagrafica.ticket_code'               => 'nullable|string',
				'anagrafica.date_of_birth'             => 'nullable|date|date_format:Y-m-d|before:today',
				'anagrafica.common_of_birth'           => 'nullable|string',
				'anagrafica.province_of_birth'         => 'nullable|string|min:2|max:2|regex: /[A-Za-z]/',
				'anagrafica.order_or_college'          => 'nullable|string',
				'anagrafica.order_or_college_province' => 'nullable|string|min:2|max:2|regex: /[A-Za-z]/',
				'anagrafica.order_or_college_number'   => 'nullable|string|regex: /[0-9]/',
			];
		}

		public static function modalMaxWidth(): string {
			return '7xl';
		}

		public function mount(AnagraficaModel $anagrafica) {
			$this->anagrafica = $anagrafica;
			foreach ($this->anagrafica->roles->pluck('id') as $role) {
				$this->roles[] = $role;
			}
			$this->subject_roles = SubjectRole::all();
		}

		public function save() {
			$this->validate();
			$this->anagrafica->update();
			$this->anagrafica->roles()->sync($this->roles);
			$this->closeModal();
			$this->emit('anagrafica-updated');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Anagrafica Aggiornata'),
				'subtitle' => __('L\'anagrafica è stata aggiornata con successo!')
			]);
		}

		public function render() {
			return view('livewire.anagrafica.edit');
		}
	}
