<?php

	namespace App\Http\Livewire\Practice;

	use App\Practice;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;

	class Show extends Component
	{
		use AuthorizesRequests;

		public $practice;
		public $tabs = [
			'applicant'  => 'Richiedente',
			'practice'   => 'Pratica',
			'subjects'   => 'Soggetti',
			'building'   => 'Immobile',
			'media'      => 'Foto e Video',
			'documents'  => 'Documenti richiesti',
			'superbonus' => 'Superbonus 110%',
			'contracts'  => 'Contratti',
			'policies'   => 'Polizze'
		];
		public $selectedTab = 'applicant';
		protected $listeners = [
			'change-tab' => 'changeTab'
		];

		public function mount(Practice $practice) {
			$this->authorize('view', $practice);
			$this->practice = $practice;
		}

		public function changeTab($tab) {
			$this->selectedTab = $tab;
		}

		public function render() {
			return view('livewire.practice.show');
		}
	}
