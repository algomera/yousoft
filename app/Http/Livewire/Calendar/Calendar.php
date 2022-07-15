<?php

	namespace App\Http\Livewire\Calendar;

	use App\Practice;
	use Asantibanez\LivewireCalendar\LivewireCalendar;
	use Carbon\Carbon;
	use Illuminate\Support\Collection;

	class Calendar extends LivewireCalendar
	{
		public $selected;
		protected $listeners = [
			'dayClicked',
			'today'
		];

		public function events(): Collection {
			if (auth()->user()->isAdmin()) {
				$q = Practice::query();
			} else {
				$q = Practice::withParents();
			}
			return $q->whereHas('building', function ($o) {
				$o->whereNotNull('condominio');
			})->whereNotNull('work_start')->whereNotNull('address')->whereNotNull('civic')->whereNotNull('common')->whereNotNull('province')->whereNotNull('cap')->get()->map(function (Practice $practice) {
				return [
					'id'          => $practice->id,
					'title'       => $practice->building->condominio ?: 'Pratica ID: ' . $practice->id,
					'description' => 'Descrizione',
					'date'        => Carbon::createFromFormat('Y-m-d', $practice->work_start)
				];
			});
		}

		public function dayClicked($params) {
			$this->selected = $params['year'] . '-' . $params['month'] . '-' . $params['day'];
		}

		public function today($today) {
			$this->selected = $today;
		}

		public function goToCurrentMonth() {
			$this->emit('today', now()->format('Y-m-d'));
			parent::goToCurrentMonth();
		}

		public function onDayClick($year, $month, $day) {
			// Far uscire la lista degli eventi di quel giorno
			$this->emit('dayClicked', [
				'day'   => sprintf("%02d", $day),
				'month' => sprintf("%02d", $month),
				'year'  => $year
			]);
		}

		public function onEventClick($eventId) {
			// Far uscire i dettagli dell'evento
			$practice = Practice::find($eventId);
			dd("Pratica ID:" . $practice->id);
		}
	}
