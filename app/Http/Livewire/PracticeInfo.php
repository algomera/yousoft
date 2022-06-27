<?php

	namespace App\Http\Livewire;

	use Livewire\Component;

	class PracticeInfo extends Component
	{
		public $practices;

		protected $listeners = [
			'practice-deleted' => '$refresh',
		];

		public function render() {
			return view('livewire.practice-info');
		}
	}
