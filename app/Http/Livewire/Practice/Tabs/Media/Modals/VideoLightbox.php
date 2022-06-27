<?php

	namespace App\Http\Livewire\Practice\Tabs\Media\Modals;

	use App\Video as VideoModel;
	use LivewireUI\Modal\ModalComponent;

	class VideoLightbox extends ModalComponent
	{
		public VideoModel $video;

		public static function modalMaxWidth(): string
		{
			return '5xl';
		}

		public function mount(VideoModel $video) {
			$this->video = $video;
		}
		public function render() {
			return view('livewire.practice.tabs.media.modals.video-lightbox');
		}
	}
