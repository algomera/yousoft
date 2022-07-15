<?php

	namespace App\Http\Livewire\Calendar;

	use App\Practice;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use LivewireUI\Modal\ModalComponent;

	class EventDetail extends ModalComponent
	{
		use AuthorizesRequests;
		public $practice;

		public function mount($practice) {
			$this->practice = Practice::find($practice);
		}

		public function goToPractice() {
			$this->authorize('view', $this->practice);
			return redirect()->to('/practice/'. $this->practice->id);
		}

		public function render() {
			return view('livewire.calendar.event-detail');
		}
	}
