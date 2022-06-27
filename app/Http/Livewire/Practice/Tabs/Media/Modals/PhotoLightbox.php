<?php

	namespace App\Http\Livewire\Practice\Tabs\Media\Modals;

	use App\Photo as PhotoModel;
	use LivewireUI\Modal\ModalComponent;

	class PhotoLightbox extends ModalComponent
	{
		public PhotoModel $photo;

		public static function modalMaxWidth(): string
		{
			return '5xl';
		}

		public function mount(PhotoModel $photo) {
			$this->photo = $photo;
		}

		public function render() {
			return view('livewire.practice.tabs.media.modals.photo-lightbox');
		}
	}
