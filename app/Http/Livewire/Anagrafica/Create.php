<?php

	namespace App\Http\Livewire\Anagrafica;

	use App\SubjectRole;
	use LivewireUI\Modal\ModalComponent;

	class Create extends ModalComponent
	{
		public $subject_roles;
		public $subject_type;
		public $consultant_type;
		public $company_name;
		public $first_name;
		public $last_name;
		public $address;
		public $zip;
		public $city;
		public $province;
		public $iban;
		public $vat;
		public $fiscal_code;
		public $phone;
		public $fax;
		public $email;
		public $email_pec;
		public $ticket_code;
		public $date_of_birth;
		public $common_of_birth;
		public $province_of_birth;
		public $order_or_college;
		public $order_or_college_province;
		public $order_or_college_number;
		public $roles = [];
		protected $rules = [
			'subject_type'              => 'required',
			'consultant_type'           => 'nullable',
			'company_name'              => 'required|string',
			'first_name'                => 'required|string',
			'last_name'                 => 'required|string',
			'address'                   => 'nullable|string',
			'zip'                       => 'nullable|string|size:5',
			'city'                      => 'required|string',
			'province'                  => 'nullable|string|size:2',
			'iban'                      => 'nullable|string|size:32',
			'vat'                       => 'nullable|string',
			'fiscal_code'               => 'nullable|string|size:16',
			'phone'                     => 'nullable|string|size:10',
			'fax'                       => 'nullable|string|size:10',
			'email'                     => 'nullable|string|email:rfc,dns|unique:anagrafiche',
			'email_pec'                 => 'nullable|string|email:rfc,dns|unique:anagrafiche',
			'ticket_code'               => 'nullable|string',
			'date_of_birth'             => 'nullable|date|date_format:Y-m-d|before:today',
			'common_of_birth'           => 'nullable|string',
			'province_of_birth'         => 'nullable|string|size:2',
			'order_or_college'          => 'nullable|string',
			'order_or_college_province' => 'nullable|string|size:2',
			'order_or_college_number'   => 'nullable|string|regex: /[0-9]/',
		];
		protected $validationAttributes = [
			'subject_type'              => 'Tipologia soggetto',
			'consultant_type'           => 'Tipologia consulente',
			'company_name'              => 'Ragione Sociale',
			'first_name'                => 'Nome',
			'last_name'                 => 'Cognome',
			'address'                   => 'Indirizzo',
			'zip'                       => 'CAP',
			'city'                      => 'Città',
			'province'                  => 'Provincia',
			'iban'                      => 'IBAN',
			'vat'                       => 'Partita IVA',
			'fiscal_code'               => 'Codice Fiscale',
			'phone'                     => 'Telefono',
			'fax'                       => 'Fax',
			'email'                     => 'Email',
			'email_pec'                 => 'Email PEC',
			'ticket_code'               => 'Codice Ticket',
			'date_of_birth'             => 'Data di nascita',
			'common_of_birth'           => 'Comune di nascita',
			'province_of_birth'         => 'Provincia di nascita',
			'order_or_college'          => 'Ordine o Collegio',
			'order_or_college_province' => 'Provincia',
			'order_or_college_number'   => 'N. di Iscrizione',
		];

		public static function modalMaxWidth(): string {
			return '7xl';
		}

		public function mount($role = null) {
			if ($role) {
				foreach ($role as $r) {
					$this->roles[] = $r;
				}
			}
			$this->subject_roles = SubjectRole::all();
		}

		public function save() {
			$validated = $this->validate();
			$anagrafica = auth()->user()->anagrafiche()->create($validated);
			$anagrafica->roles()->sync($this->roles);
			$this->closeModal();
			$this->emitTo('anagrafica.index', 'anagrafica-added');
			$this->emitTo('practice.tabs.subject', 'anagrafica-created', $anagrafica->id, $this->roles);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Anagrafica Creata'),
				'subtitle' => __('L\'anagrafica è stata creata con successo!')
			]);
		}

		public function render() {
			return view('livewire.anagrafica.create');
		}
	}
