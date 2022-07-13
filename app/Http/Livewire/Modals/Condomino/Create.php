<?php

	namespace App\Http\Livewire\Modals\Condomino;

	use App\Practice as PracticeModel;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use LivewireUI\Modal\ModalComponent;

	class Create extends ModalComponent
	{
		use AuthorizesRequests;
		public PracticeModel $practice;
		public $name;
		public $surname;
		public $phone;
		public $email;
		public $cf;
		public $millesimi_inv;
		public $foglio;
		public $part;
		public $sub;
		public $categ_catastale = 'A/2';
		public $sup_catastale;
		public $comproprietari = false;

		protected $rules = [
			'name'             => 'required|string',
			'surname'          => 'required|string',
			'cf'               => 'required|string|size:16',
			'phone'            => 'required|string',
			'email'            => 'required|email:rfc,dns',
			'millesimi_inv'    => 'required|numeric',
			'foglio'           => 'required|string',
			'part'             => 'required|string',
			'sub'              => 'required|string',
			'categ_catastale'  => 'required|string',
			'sup_catastale'    => 'required|string',
			'comproprietari'   => 'boolean',
		];

		protected $validationAttributes = [
			'name'             => 'Nome/Ragione Sociale',
			'surname'          => 'Cognome',
			'cf'               => 'Codice Fiscale',
			'phone'            => 'Telefono',
			'email'            => 'Email',
			'millesimi_inv'    => 'Millesimi',
			'foglio'           => 'Foglio',
			'part'             => 'Part.',
			'sub'              => 'Sub.',
			'categ_catastale'  => 'Cat. Catastale',
			'sup_catastale'    => 'Sup. Catastale',
			'comproprietari'   => 'Comproprietari',
		];

		public function mount(PracticeModel $practice) {
			$this->practice = $practice;
		}

		public function save() {
			$this->authorize('create-condomini', $this->practice);
			$validated = $this->validate();
			$condomino = $this->practice->condomini()->create($validated);
			$this->practice->towed_intervention()->create([
				'condomino_id' => $condomino->id,
				'is_common' => 0
			]);
			$this->closeModal();
			$this->emitTo('practice.tabs.building', 'condomino-created');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Creazione'),
				'subtitle' => __('Il condomino è stato creato con successo!')
			]);
		}

		public function render() {
			return view('livewire.modals.condomino.create');
		}
	}
