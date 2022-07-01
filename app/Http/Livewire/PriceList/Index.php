<?php

	namespace App\Http\Livewire\PriceList;

	use App\ComputoPriceList;
	use App\ComputoPriceListRow;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Illuminate\Support\Facades\Storage;
	use Livewire\Component;
	use Livewire\WithFileUploads;
	use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

	class Index extends Component
	{
		use AuthorizesRequests;
		use WithFileUploads;

		public $price_lists = [];
		public $uploaded_price_lists = [];
		protected $listeners = [
			'price_list-added'   => '$refresh',
			'price_list-removed' => '$refresh'
		];
		protected $rules = [
			'price_lists.*' => 'file'
		];

		public function upload($id) {
			$this->authorize('upload_price_lists');
			$reader = new Xlsx();
			foreach ($this->uploaded_price_lists as $p) {
				foreach ($p as $k => $item) {
					$extension = explode('.', $item->getClientOriginalName())[1];
					$filename = pathinfo($item->getClientOriginalName(), PATHINFO_FILENAME);
					$user = auth()->user()->isAdmin() ? 'common' : auth()->user()->id;
					$path = $item->storeAs('price_lists/'. $user .'/' . $id, $filename . '.' . $extension);
					$spreadsheet = $reader->load(Storage::disk('public')->path($path));
					$worksheet = $spreadsheet->getActiveSheet();
					$data = [];
					foreach ($worksheet->getRowIterator() as $r => $row) {
						$cellIterator = $row->getCellIterator();
						$cellIterator->setIterateOnlyExistingCells(false);
						foreach ($cellIterator as $cell) {
							$data[$r][] = $cell->getValue();
						}
					}
					array_shift($data);
					foreach ($data as $d) {
						$a = explode('.', $d[0]);
						if (isset($a[0])) {
							$first_lvl = ComputoPriceListRow::where('code', $a[0])->where('folder_id', $id)->first() ?: ComputoPriceListRow::create([
								'parent_id'         => null,
								'folder_id'         => $id,
								'code'              => $d[0],
								'short_description' => $d[1],
								'description'       => $d[2],
								'long_description'  => $d[3],
								'um'                => $d[4],
								'price'             => $d[5],
								'mat'               => $d[6],
							]);
						}
						if (isset($a[1])) {
							$second_lvl = ComputoPriceListRow::where('code', $a[0] . '.' . $a[1])->where('folder_id', $id)->first() ?: ComputoPriceListRow::create([
								'parent_id'         => $first_lvl->id,
								'folder_id'         => $id,
								'code'              => $d[0],
								'short_description' => $d[1],
								'description'       => $d[2],
								'long_description'  => $d[3],
								'um'                => $d[4],
								'price'             => $d[5],
								'mat'               => $d[6],
							]);
						}
						if (isset($a[2])) {
							$third_lvl = ComputoPriceListRow::where('code', $a[0] . '.' . $a[1] . '.' . $a[2])->where('folder_id', $id)->first() ?: ComputoPriceListRow::create([
								'parent_id'         => $second_lvl->id,
								'folder_id'         => $id,
								'code'              => $d[0],
								'short_description' => $d[1],
								'description'       => $d[2],
								'long_description'  => $d[3],
								'um'                => $d[4],
								'price'             => $d[5],
								'mat'               => $d[6],
							]);
						}
						if (isset($a[3])) {
							$fourth_lvl = ComputoPriceListRow::where('code', $a[0] . '.' . $a[1] . '.' . $a[2] . '.' . $a[3])->where('folder_id', $id)->first() ?: ComputoPriceListRow::create([
								'parent_id'         => $third_lvl->id,
								'folder_id'         => $id,
								'code'              => $d[0],
								'short_description' => $d[1],
								'description'       => $d[2],
								'long_description'  => $d[3],
								'um'                => $d[4],
								'price'             => $d[5],
								'mat'               => $d[6],
							]);
						}
						if (isset($a[4])) {
							ComputoPriceListRow::where('code', $a[0] . '.' . $a[1] . '.' . $a[2] . '.' . $a[3] . '.' . $a[4])->where('folder_id', $id)->first() ?: ComputoPriceListRow::create([
								'parent_id'         => $fourth_lvl->id,
								'folder_id'         => $id,
								'code'              => $d[0],
								'short_description' => $d[1],
								'description'       => $d[2],
								'long_description'  => $d[3],
								'um'                => $d[4],
								'price'             => $d[5],
								'mat'               => $d[6],
							]);
						}
					}
				}
			}
			$this->emit('price_list-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiunta'),
				'subtitle' => __('Il prezzario è stato aggiunto con successo!')
			]);
			$this->uploaded_price_lists = [];
		}

		public function delete($id) {
			$this->authorize('delete_price_lists');
			$price_list = ComputoPriceList::find($id);
			if(auth()->user()->isAdmin() || $price_list->user_id === auth()->user()->id) {
				$price_list->delete();
			}
			$this->emit('document-removed');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Eliminazione'),
				'subtitle' => __('Il prezzario è stato eliminato con successo!')
			]);
		}

		public function render() {
			if(auth()->user()->isAdmin()) {
			$this->price_lists = ComputoPriceList::where('user_id', null)->get();
			} else {
				$this->price_lists = ComputoPriceList::where('user_id', auth()->user()->id)->get();
			}
			return view('livewire.price-list.index');
		}
	}
