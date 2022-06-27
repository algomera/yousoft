<?php

	namespace App\Http\Livewire\Practice\Tabs\Media;

	use App\Practice as PracticeModel;
	use Livewire\Component;

	class Videos extends Component
	{
		public PracticeModel $practice;
		public $videos;

		public function render() {
			$this->videos = $this->practice->videos;
			return view('livewire.practice.tabs.media.videos');
		}
	}
