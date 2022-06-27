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
