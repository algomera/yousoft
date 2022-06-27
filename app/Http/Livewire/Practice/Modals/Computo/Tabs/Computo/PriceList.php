<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Computo;

	use App\ComputoPriceList;
	use App\ComputoPriceListRow;
	use Livewire\Component;

	class PriceList extends Component
	{
		public $price_lists = [];
		public $tree = [];
		public $selected = null;
		public $selectedPriceList;
		public $selectedLeaf = null;
		public $price_list_rows = [];
		public $selectedIntervention = null;

		protected $listeners = [
			'changeInterventionFolder',
		];

		public function changeInterventionFolder($id) {
			$this->selectedIntervention = $id;
		}

		public function mount($selectedIntervention, $practice_id) {
			$this->price_lists = ComputoPriceList::where('user_id', null)->orWhere('user_id', auth()->user()->id)->get();
			if ($this->price_lists->count() > 0) {
				$this->selectedPriceList = $this->price_lists[0]->id;
			}
			$this->selectedIntervention = $selectedIntervention;
			$this->practice_id = $practice_id;
		}

		public function updatingSelectedPriceList() {
			$this->selected = null;
			$this->selectedLeaf = null;
			$this->price_list_rows = [];
		}
		public function updatingSelected() {
			$this->selectedLeaf = null;
			$this->price_list_rows = [];
		}

		public function selectLeaf($row) {
			$this->selectedLeaf = $row['id'];
			$this->emit('openModal', 'practice.modals.computo.tabs.computo.add-details', [
				"row" => $row['id'],
				"selectedIntervention" => $this->selectedIntervention,
				"practice_id" => $this->practice_id,
			]);
		}

		public function render() {
			$items = ComputoPriceListRow::where('folder_id', $this->selectedPriceList)->tree(3)->get();
			$this->tree = $items->toTree();
			if ($this->selected) {
				$this->price_list_rows = ComputoPriceListRow::where('parent_id', $this->selected)->get();
			}
			return view('livewire.practice.modals.computo.tabs.computo.price-list');
		}
	}
