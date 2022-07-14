<?php

	namespace App\Http\Livewire\Calendar;

	use App\Practice;
	use Livewire\Component;

	class Index extends Component
	{
		public function onDayClick($year, $month, $day) {
			// Far uscire la lista degli eventi di quel giorno
			dd("Day clicked");
		}

		public function onEventClick($eventId) {
			// Far uscire i dettagli dell'evento
			//		$practice = Practice::find($eventId);
			dd("Event clicked");
		}

		public function render() {
			return view('livewire.calendar.index');
		}
	}
