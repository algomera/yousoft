<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Computo;

	use App\ComputoFeesAmount;
	use App\ComputoInterventionRow;
	use App\ComputoInterventionRowDetail;
	use App\ComputoPriceListRow;
	use Illuminate\Support\Facades\Session;
	use LivewireUI\Modal\ModalComponent;

	class AddDetails extends ModalComponent
	{
		public $row;
		public $selectedIntervention = null;
		public $practice_id;
		public $details = [];
		public $intervention_row;
		public $fees_amount;
		public $copyIsDisabled = true;
		public $pasteIsDisabled = true;
		public $deleteIsDisabled = true;
		public $selected = [];
		public $selectAll = false;
		protected $listeners = [
			'detail-row-added'   => '$refresh',
			'detail-row-deleted' => '$refresh',
			'detail-row-updated' => '$refresh',
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
			$this->fees_amount = ComputoFeesAmount::create([
				'practice_id'            => $this->practice_id,
				'intervention_folder_id' => $this->selectedIntervention,
				'importo_lavori'         => 0,
			]);
		}

		public function updatedSelectAll($value) {
			if ($value && $this->details->count()) {
				$this->selected = $this->details->pluck('id');
				$this->updatedSelected();
			} else {
				$this->selected = [];
				$this->updatedSelected();
			}
		}

		public function updatedSelected() {
			if (count($this->selected) > 0) {
				$this->copyIsDisabled = false;
				$this->deleteIsDisabled = false;
			} else {
				$this->copyIsDisabled = true;
				$this->deleteIsDisabled = true;
			}
		}

		public function copy() {
			Session::forget('copiedDetails');
			Session::put('copiedDetails', $this->selected);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Dettagli copiati'),
				'subtitle' => __('I dettagli selezionati sono stato copiati!')
			]);
			$this->updatedSelected();
		}

		public function paste() {
			$copiedDetails = ComputoInterventionRowDetail::findMany(Session::get('copiedDetails'));
			if (!$copiedDetails->count()) {
				$this->dispatchBrowserEvent('open-notification', [
					'type'     => 'error',
					'title'    => __('Errore'),
					'subtitle' => __('I dettagli da incollare non esistono più!')
				]);
				Session::forget('copiedDetails');
			} else {
				foreach ($copiedDetails as $copiedDetail) {
					$new = $copiedDetail->replicate();
					$new->parent_id = $this->intervention_row->id;
					$new->save();
				}
				$this->emit('detail-row-added');
				$this->dispatchBrowserEvent('open-notification', [
					'title'    => __('Dettagli incollati'),
					'subtitle' => __('I dettagli sono stato incollati!')
				]);
			}
			$this->selected = [];
			$this->selectAll = false;
			$this->updatedSelected();
		}

		public function deleteSelected() {
			ComputoInterventionRowDetail::destroy($this->selected);
			$this->selected = [];
			$this->selectAll = false;
			$this->emit('detail-row-deleted');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Dettagli eliminati'),
				'subtitle' => __('I dettagli sono stato eliminati!')
			]);
			$this->updatedSelected();
		}

		public function save() {
			if ($this->intervention_row->details->count()) {
				$this->intervention_row->update([
					'total' => $this->intervention_row->price_row->price * $this->intervention_row->details->sum('total')
				]);
				$this->fees_amount->update([
					'importo_lavori' => $this->intervention_row->total
				]);
				$this->emit('detail-row-added');
				$this->closeModal();
			} else {
				$this->intervention_row->delete();
				$this->fees_amount->delete();
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
			$this->pasteIsDisabled = !Session::exists('copiedDetails');
			return view('livewire.practice.modals.computo.tabs.computo.add-details');
		}
	}
