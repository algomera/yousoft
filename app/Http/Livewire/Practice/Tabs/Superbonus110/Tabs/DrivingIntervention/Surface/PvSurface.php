<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Surface;

	use App\Surface;
	use App\SurfaceSal;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;

	class PvSurface extends Component
	{
		use AuthorizesRequests;
		public $practice;
		public $currentSurface;
		public $intervention;
		public $condomino_id = null;
		public $surfaces;
		public $sals;
		public $sal_1;
		public $sal_2;
		public $sal_f;

		protected $listeners = [
			'surface-added' => '$refresh'
		];

		public function mount($practice, $currentSurface, $is_common = 0) {
			$this->practice = $practice;
			$this->currentSurface = $currentSurface;
			$this->sals = SurfaceSal::firstOrCreate([
				'practice_id' => $practice->id,
				'type' => $this->currentSurface,
				'intervention' => $this->intervention,
				'condomino_id' => $this->condomino_id,
				'is_common' => $is_common,
			]);
			$this->sal_1 = $this->sals->sal_1;
			$this->sal_2 = $this->sals->sal_2;
			$this->sal_f = $this->sals->sal_f;
		}

		public function deleteSurface($id) {
			$this->authorize('update', $this->practice);
			Surface::destroy($id);

			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Cancellazione'),
				'subtitle' => __('La superficie è stata rimossa con successo!')
			]);
		}

		public function saveSurfaceSal() {
			$this->authorize('update', $this->practice);
			$this->sals->update([
				'sal_1' => round($this->sal_1, 3),
				'sal_2' => round($this->sal_2, 3),
				'sal_f' => round($this->sal_f, 3),
			]);
		}

		public function render() {
			$this->surfaces = Surface::where('type', $this->currentSurface)->where('intervention', $this->intervention)->where('condomino_id', $this->condomino_id)->get();
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.surface.pv-surface');
		}
	}
