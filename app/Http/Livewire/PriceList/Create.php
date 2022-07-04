<?php

	namespace App\Http\Livewire\PriceList;

	use App\ComputoPriceList;
	use LivewireUI\Modal\ModalComponent;

	class Create extends ModalComponent
	{
		public $name;
		public $code;
		protected $rules = [
			'name' => 'required|string',
			'code' => 'required|string'
		];

		protected $validationAttributes = [
			'name' => 'Nome',
			'code' => 'Codice'
		];

		public function save() {
			ComputoPriceList::create([
				'user_id' => auth()->user()->isAdmin() ? null : auth()->user()->id,
				'name'    => $this->name,
				'code'    => $this->code,
			]);
			$this->closeModal();
			$this->emitTo('price-list.index', 'price_list-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Prezzario Creato'),
				'subtitle' => __('Il prezzario è stato creato con successo!')
			]);
		}

		public function render() {
			return view('livewire.price-list.create');
		}
	}
