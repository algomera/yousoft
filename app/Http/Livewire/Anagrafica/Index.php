<?php

	namespace App\Http\Livewire\Anagrafica;

	use App\Anagrafica;
	use App\SubjectRole;
	use App\User;
	use Livewire\Component;

	class Index extends Component
	{
		public $anagrafiche;

		protected $listeners = [
			'anagrafica-added' => '$refresh',
			'anagrafica-updated' => '$refresh',
		];

		public function render() {
			$this->anagrafiche = Anagrafica::withParents(auth()->user()->parents)->get();
			return view('livewire.anagrafica.index');
		}
	}
