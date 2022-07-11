<?php

	namespace App\Http\Livewire\Anagrafica;

	use App\Anagrafica;
	use App\SubjectRole;
	use App\User;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;

	class Index extends Component
	{
		use AuthorizesRequests;

		public $anagrafiche;
		protected $listeners = [
			'anagrafica-added'   => '$refresh',
			'anagrafica-updated' => '$refresh',
		];

		public function mount() {
			$this->authorize('viewAny', Anagrafica::class);
		}

		public function render() {
			$this->anagrafiche = Anagrafica::withParents(auth()->user()->parents)->get();
			return view('livewire.anagrafica.index');
		}
	}
