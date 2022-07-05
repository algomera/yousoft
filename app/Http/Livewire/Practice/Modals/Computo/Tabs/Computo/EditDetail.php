<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Computo;

	use App\ComputoInterventionRow;
	use App\ComputoInterventionRowDetail;
	use App\Rules\ValidExpression;
	use LivewireUI\Modal\ModalComponent;
	use NXP\MathExecutor;

	class EditDetail extends ModalComponent
	{
		public $detail;
		public $practice;
//		public $note;
//		public $expression;
//		public $nps;
//		public $length;
//		public $width;
//		public $hps;
//		public $total = 0;

		protected function rules() {
			return [
				'detail.note'       => 'string|nullable',
				'detail.expression' => [
					'nullable',
					'string',
					'not_regex:/[a-zA-Z]/',
					new ValidExpression()
				],
				'detail.nps'        => [
					'nullable',
					'string',
					'not_regex:/[a-zA-Z]/',
					new ValidExpression()
				],
				'detail.length'     => [
					'nullable',
					'string',
					'not_regex:/[a-zA-Z]/',
					new ValidExpression()
				],
				'detail.width'      => [
					'nullable',
					'string',
					'not_regex:/[a-zA-Z]/',
					new ValidExpression()
				],
				'detail.hps'        => [
					'nullable',
					'string',
					'not_regex:/[a-zA-Z]/',
					new ValidExpression()
				],
				'detail.total'      => 'nullable'
			];
		}

		protected $validationAttributes = [
			'note'       => 'Commento',
			'expression' => 'Espressione',
			'nps'        => 'NPS',
			'length'     => 'Lunghezza',
			'width'      => 'Larghezza',
			'hps'        => 'H-P-S',
			'total'      => 'Totale'
		];

		public static function closeModalOnEscapeIsForceful(): bool {
			return false;
		}

		public static function closeModalOnClickAway(): bool {
			return false;
		}

		public static function destroyOnClose(): bool {
			return true;
		}

		public function updatingExpression() {
			$this->detail->total = 0;
			$this->detail->nps = null;
			$this->detail->length = null;
			$this->detail->width = null;
			$this->detail->hps = null;
		}

		public function resetExpression() {
			$this->detail->expression = null;
		}

		public function calculate() {
			$this->validate();
			$executor = new MathExecutor();
			$this->detail->expression = str_replace(',', '.', $this->detail->expression);
			$this->detail->nps = str_replace(',', '.', $this->detail->nps);
			$this->detail->length = str_replace(',', '.', $this->detail->length);
			$this->detail->width = str_replace(',', '.', $this->detail->width);
			$this->detail->hps = str_replace(',', '.', $this->detail->hps);
			$nps = $this->detail->nps ?: 1;
			$length = $this->detail->length ?: 1;
			$width = $this->detail->width ?: 1;
			$hps = $this->detail->hps ?: 1;
			if ($this->detail->nps || $this->detail->length || $this->detail->width || $this->detail->hps) {
				$expression = "{$nps} * {$length} * {$width} * {$hps}";
				$this->detail->total = round($executor->execute($expression), 2);
			} else if ($this->detail->expression) {
				$this->detail->total = round($executor->execute($this->detail->expression), 2);
			}
		}

		public function mount($detail_id) {
			$this->detail = ComputoInterventionRowDetail::find($detail_id);
		}

		public function save() {
			$this->validate();
			$this->calculate();
			$this->detail->update();
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('Dettaglio aggiornato con successo!')
			]);
			$this->emit('detail-row-added');
		}

		public function render() {
			return view('livewire.practice.modals.computo.tabs.computo.edit-detail');
		}
	}
