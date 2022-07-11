<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Fees;

	use App\ComputoFeesAmount;
	use App\ComputoInterventionRow;
	use Livewire\Component;

	class Amount extends Component
	{
		public $practice_id;
		public $fees_amount = [];
		protected $rules = [
			'fees_amount.*.impon_iva_10'  => 'nullable|numeric',
			'fees_amount.*.impon_iva_22'  => 'nullable|numeric',
			'fees_amount.*.spese_prog'    => 'nullable|numeric',
			'fees_amount.*.supp_prog'     => 'nullable|numeric',
			'fees_amount.*.prog_reg_forf' => 'nullable|numeric',
			'fees_amount.*.ass_tecnica'   => 'nullable|numeric',
			'fees_amount.*.ass_fiscale'   => 'nullable|numeric',
		];

		public function mount($practice_id) {
			$this->practice_id = $practice_id;
			$this->fees_amount = ComputoFeesAmount::where('practice_id', $practice_id)->get();
		}

		public function calculate($i) {
			$fees_amount = $this->fees_amount[$i];
			$fees_amount->impon_iva_22 = round($fees_amount->importo_lavori - $fees_amount->impon_iva_10, 2);
			$fees_amount->impon_iva_10 = round($fees_amount->importo_lavori - $fees_amount->impon_iva_22, 2);
			$fees_amount->importo_spese_prog = round(($fees_amount->importo_lavori / 100) * $fees_amount->spese_prog, 2);
			$fees_amount->importo_supp_prog = round(($fees_amount->importo_lavori / 100) * $fees_amount->supp_prog, 2);
			$fees_amount->importo_prog_reg_forf = round(($fees_amount->importo_lavori / 100) * $fees_amount->prog_reg_forf, 2);
			$fees_amount->importo_ass_tecnica = round(($fees_amount->importo_lavori / 100) * $fees_amount->ass_tecnica, 2);
			$fees_amount->importo_ass_fiscale = round(($fees_amount->importo_lavori / 100) * $fees_amount->ass_fiscale, 2);
			$fees_amount->tot_iva_10 = round(($fees_amount->importo_lavori / 100) * 10, 2);
			// TODO: ??? -- DATO ERRATO, CONTROLLARE
			$fees_amount->tot_iva_22 = round(($fees_amount->importo_lavori / 100) * 22, 2);
			$fees_amount->tot_spese_e_iva = $fees_amount->importo_lavori + $fees_amount->importo_spese_prog + $fees_amount->importo_prog_reg_forf + $fees_amount->importo_supp_prog + $fees_amount->importo_ass_tecnica + $fees_amount->importo_ass_fiscale + $fees_amount->tot_iva_10 + $fees_amount->tot_iva_22;
			$fees_amount->update();
		}

		public function render() {
			return view('livewire.practice.modals.computo.tabs.fees.amount');
		}
	}
