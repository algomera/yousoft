<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Fees;

	use App\ComputoInterventionRow;
	use Livewire\Component;

	class Amount extends Component
	{
		public $practice_id;
		public $interventions = [];
		public $impon_iva_10;
		public $impon_iva_22;
		public $spese_prog;
		public $importo_spese_prog;
		public $supp_prog;
		public $prog_reg_forf;
		public $ass_tecnica;

		protected $rules = [
			'interventions.*.impon_iva_10' => 'nullable|numeric',
			'interventions.*.impon_iva_22' => 'nullable|numeric',
			'interventions.*.spese_prog' => 'nullable|numeric',
		];

		public function mount($practice_id) {
			$this->practice_id = $practice_id;
			$this->interventions = ComputoInterventionRow::where('practice_id', $practice_id)->get();
		}

		public function updateImpon22($i) {
			$this->interventions[$i]->impon_iva_22 = $this->interventions[$i]->total - $this->interventions[$i]->impon_iva_10;
		}
		public function updateImpon10($i) {
			$this->interventions[$i]->impon_iva_10 = $this->interventions[$i]->total - $this->interventions[$i]->impon_iva_22;
		}
		public function updateImportoSpeseProg($i) {
			$this->interventions[$i]->importo_spese_prog = '???';
		}

		public function render() {
			return view('livewire.practice.modals.computo.tabs.fees.amount');
		}
	}
