<?php

	namespace App\Http\Livewire\Modals\Condomino;

	use App\Condomini as CondominiModel;
	use App\Country;
	use LivewireUI\Modal\ModalComponent;

	class Edit extends ModalComponent
	{
		public CondominiModel $condomino;
		public $countries;

		protected function rules() {
			return [
				'condomino.millesimi_inv'    => 'required|numeric',
				'condomino.foglio'           => 'required|string',
				'condomino.part'             => 'required|string',
				'condomino.sub'              => 'required|string',
				'condomino.categ_catastale'  => 'required|string',
				'condomino.sup_catastale'    => 'required|string',
				'condomino.comproprietari'   => 'boolean',
				'condomino.type_beneficiary' => 'nullable|string',
				'condomino.possession_title' => 'nullable|string',
				'condomino.name'             => 'required|string',
				'condomino.surname'          => 'required|string',
				'condomino.sex'              => 'nullable|string',
				'condomino.date_of_birth'    => 'nullable|date|date_format:Y-m-d|before:today',
				'condomino.nation_of_birth'  => 'nullable|string',
				'condomino.common_of_birth'  => 'nullable|string',
				'condomino.cf'               => 'required|string|size:16',
				'condomino.phone'            => 'required|string',
				'condomino.email'            => 'required|email:rfc,dns|unique:condominis,email,' . $this->condomino->id,
				'condomino.country'          => 'nullable|string',
				'condomino.common'           => 'nullable|string',
				'condomino.prov'             => 'nullable|string|size:2',
				'condomino.address'          => 'nullable|string',
				'condomino.cap'              => 'nullable|string|size:5',
			];
		}

		protected $validationAttributes = [
			'condomino.millesimi_inv'    => 'Millesimi',
			'condomino.foglio'           => 'Foglio',
			'condomino.part'             => 'Part.',
			'condomino.sub'              => 'Sub.',
			'condomino.categ_catastale'  => 'Cat. Catastale',
			'condomino.sup_catastale'    => 'Sup. Catastale',
			'condomino.comproprietari'   => 'Comproprietari',
			'condomino.type_beneficiary' => 'Tipo di beneficiario',
			'condomino.possession_title' => 'Titolo di possesso',
			'condomino.name'             => 'Nome/Ragione Sociale',
			'condomino.surname'          => 'Cognome',
			'condomino.sex'              => 'Sesso',
			'condomino.date_of_birth'    => 'Data di nascita',
			'condomino.nation_of_birth'  => 'Nazione di nascita',
			'condomino.common_of_birth'  => 'Comune di nascita',
			'condomino.cf'               => 'Codice Fiscale',
			'condomino.phone'            => 'Telefono',
			'condomino.email'            => 'Email',
			'condomino.country'          => 'Nazione',
			'condomino.common'           => 'Comune',
			'condomino.prov'             => 'Provincia',
			'condomino.address'          => 'Indirizzo',
			'condomino.cap'              => 'CAP',
		];

		public function mount(CondominiModel $condomino) {
			$this->condomino = $condomino;
			$this->countries = Country::all();
		}

		public function save() {
			$this->validate();
			$this->condomino->update();
			$this->closeModal();
			$this->emitTo('practice.tabs.superbonus110.tabs.towed-intervention', 'condomino-edited');
			$this->emitTo('practice.tabs.superbonus110.tabs.towed-intervention.condomino-section', 'condomino-edited');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('Il condomino è stato aggiornato con successo!')
			]);
		}

		public function render() {
			return view('livewire.modals.condomino.edit');
		}
	}
