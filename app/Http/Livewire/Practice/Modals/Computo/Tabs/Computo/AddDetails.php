<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Computo;

	use App\ComputoInterventionRow;
	use App\ComputoInterventionRowDetail;
	use App\ComputoPriceListRow;
	use LivewireUI\Modal\ModalComponent;

	class AddDetails extends ModalComponent
	{
		public $row;
		public $selectedIntervention = null;
		public $practice_id;
		public $details = [];
		public $intervention_row;
		protected $listeners = [
			'detail-row-added' => '$refresh',
			'detail-row-deleted' => '$refresh'
		];

		public static function modalMaxWidth(): string {
			return 'full';
		}

		public static function closeModalOnEscape(): bool {
			return false;
		}

		public static function closeModalOnEscapeIsForceful(): bool {
			return false;
		}

		public static function closeModalOnClickAway(): bool {
			return false;
		}

		public static function destroyOnClose(): bool {
			return true;
		}

		public function mount($row, $selectedIntervention, $practice_id) {
			$this->row = ComputoPriceListRow::find($row);
			$this->selectedIntervention = $selectedIntervention;
			$this->practice_id = $practice_id;
			$this->progressive_number = ComputoInterventionRow::where('practice_id', $this->practice_id)->where('intervention_folder_id', $this->selectedIntervention)->count() + 1;
			$this->intervention_row = ComputoInterventionRow::create([
				'practice_id'            => $this->practice_id,
				'intervention_folder_id' => $this->selectedIntervention,
				'price_row_id'           => $this->row->id,
				'total'                  => 0
			]);
		}

		public function save() {
			if ($this->intervention_row->details->count()) {
				$this->intervention_row->update([
					'total' => $this->intervention_row->price_row->price * $this->intervention_row->details->sum('total')
				]);
				$this->emit('detail-row-added');
				$this->closeModal();
			} else {
				$this->intervention_row->delete();
				$this->emit('detail-row-deleted');
				$this->closeModal();
			}
		}

		public function deleteDetail($id) {
			ComputoInterventionRowDetail::destroy($id);
			$this->dispatchBrowserEvent('close-modal');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Dettaglio Eliminato'),
				'subtitle' => __('Il dettaglio è stato eliminato con successo!')
			]);
			$this->emit('detail-row-deleted');
		}

		public function render() {
			$this->details = $this->intervention_row->details;
			return view('livewire.practice.modals.computo.tabs.computo.add-details');
		}
	}
