<?php

	namespace App\Http\Livewire\Practice\Tabs\Media;

	use App\Practice as PracticeModel;
	use Livewire\Component;

	class Photos extends Component
	{
		public PracticeModel $practice;
		public $photos;

		public function render() {
			$this->photos = $this->practice->photos;
			return view('livewire.practice.tabs.media.photos');
		}
	}
