<?php

	namespace App\Http\Livewire\Calendar;

	use App\Practice;
	use Asantibanez\LivewireCalendar\LivewireCalendar;
	use Carbon\Carbon;
	use Illuminate\Support\Collection;

	class Calendar extends LivewireCalendar
	{
		public function events(): Collection {
			return Practice::whereHas('building', function ($q) {
				$q->whereNotNull('condominio')->whereNotNull('build_address');
			})->whereNotNull('work_start')->get()->map(function (Practice $practice) {
				return [
					'id'          => $practice->id,
					'title'       => $practice->building->condominio ?: 'Pratica ID: ' . $practice->id,
					'description' => 'Descrizione',
					'date'        => Carbon::createFromFormat('Y-m-d', $practice->work_start)
				];
			});
		}

		public function goToCurrentMonth() {
			$this->emitTo('calendar.events-list', 'today', now()->format('Y-m-d'));
			parent::goToCurrentMonth();
		}

		public function onDayClick($year, $month, $day) {
			// Far uscire la lista degli eventi di quel giorno
			$this->emitTo('calendar.events-list', 'dayClicked', [
				'day' => sprintf("%02d", $day),
				'month' => sprintf("%02d", $month),
				'year' => $year
			]);
		}

		public function onEventClick($eventId) {
			// Far uscire i dettagli dell'evento
			$practice = Practice::find($eventId);
			dd("Pratica ID:" . $practice->id);
		}
	}
