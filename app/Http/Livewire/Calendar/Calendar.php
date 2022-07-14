<?php

	namespace App\Http\Livewire\Calendar;

	use App\Practice;
	use Asantibanez\LivewireCalendar\LivewireCalendar;
	use Carbon\Carbon;
	use Illuminate\Support\Collection;

	class Calendar extends LivewireCalendar
	{
		public function events(): Collection {
			return Practice::all()->map(function (Practice $practice) {
				return [
					'id'          => $practice->id,
					'title'       => $practice->building->condominio ?: 'No Titolo',
					'description' => 'Descrizione',
					'date'        => Carbon::createFromFormat('Y-m-d', $practice->work_start)
				];
			});
		}
	}
