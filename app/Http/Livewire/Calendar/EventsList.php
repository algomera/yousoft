<?php

	namespace App\Http\Livewire\Calendar;

	use App\Practice;
	use Carbon\Carbon;
	use Livewire\Component;

	class EventsList extends Component
	{
		public $date;
		public $practices;
		protected $listeners = ['dayClicked', 'today'];

		public function mount() {
			$this->date = Carbon::today()->format('Y-m-d');
		}

		public function today($today) {
			$this->date = $today;
		}

		public function dayClicked($params) {
			$this->date = $params['year'] . '-' . $params['month'] . '-' . $params['day'];
		}

		public function render() {
			$this->practices = Practice::whereHas('building', function ($q) {
				$q->whereNotNull('condominio');
			})->where('work_start', $this->date)->get();
			return view('livewire.calendar.events-list');
		}
	}
