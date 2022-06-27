<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Practice as PracticeModel;
	use Livewire\Component;

	class Media extends Component
	{
		public PracticeModel $practice;
		public $tabs = [
			'photos' => 'Foto',
			'videos' => 'Videoispezioni',
		];
		public $selectedTab = 'photos';

		public function render() {
			return view('livewire.practice.tabs.media');
		}
	}
