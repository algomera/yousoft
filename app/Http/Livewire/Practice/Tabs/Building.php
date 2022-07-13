<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Practice as PracticeModel;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Illuminate\Support\Facades\Storage;
	use Livewire\Component;
	use Livewire\WithFileUploads;

	class Building extends Component
	{
		use WithFileUploads;
		use AuthorizesRequests;

		public PracticeModel $practice;
		public $condomini;
		public $building;
		public $tmp_excel_file;
		protected $rules = [
			'building.intervention_name'        => 'required|string',
			'building.company_role'             => 'required|string',
			'building.intervention_tipology'    => 'required|accepted|boolean',
			'building.fiscal_code'              => 'required|size:11',
			'building.condominio'               => 'required|string',
			'building.build_type'               => 'required|string',
			'building.zone'                     => 'required|string',
			'building.section'                  => 'nullable|string',
			'building.foil'                     => 'required|string',
			'building.particle'                 => 'required|string',
			'building.subaltern'                => 'required|string',
			'building.unit_building_number'     => 'required|string',
			'building.pertinence_number'        => 'required|string',
			'building.resolution_stairs'        => 'nullable|string',
			'building.note'                     => 'nullable|string',
			'building.cultural_constraints'     => 'nullable|string',
			'building.denied_intervents'        => 'nullable|string',
			'building.mountain_common'          => 'nullable|string',
			'building.infringment_common'       => 'nullable|string',
			'building.sismic_events_zone'       => 'nullable|string',
			'building.isUnderRenovation'        => 'nullable|string',
			'building.nonMetan_area'            => 'nullable|string',
			'building.building_authorization'   => 'nullable|string',
			'building.license_number'           => 'nullable|string',
			'building.license_date'             => 'nullable|date',
			'building.construction_date'        => 'nullable|numeric|digits:4',
			'building.administrator_fullname'   => 'nullable|string',
			'building.administrator_surname'    => 'nullable|string',
			'building.administrator_name'       => 'nullable|string',
			'building.administrator_fiscalcode' => 'nullable|string|size:16',
			'building.administrator_address'    => 'nullable|string',
			'building.administrator_city'       => 'nullable|string',
			'building.administrator_province'   => 'nullable|string|size:2',
			'building.administrator_cap'        => 'nullable|string',
			'building.administrator_telephone'  => 'nullable|string|size:10',
			'building.administrator_cellphone'  => 'nullable|string|size:10',
			'building.administrator_email'      => 'nullable|email:rfc,dns',
			//			'building.imported_excel_file'      => 'nullable|file|mimes:xls,xlsx,csv|max:512'
		];
		protected $validationAttributes = [
			'intervention_name'        => 'Nome Intervento',
			'company_role'             => 'Ruolo dell\'impresa',
			'intervention_tipology'    => 'Tipologia intervento',
			'fiscal_code'              => 'Codice Fiscale',
			'condominio'               => 'Nome Condominio',
			'build_type'               => 'Tipo di condominio',
			'zone'                     => 'Zona',
			'section'                  => 'Sezione',
			'foil'                     => 'Foglio',
			'particle'                 => 'Particella',
			'subaltern'                => 'Subalterno',
			'unit_building_number'     => 'N. unità imm.',
			'pertinence_number'        => 'N. pertinenze',
			'resolution_stairs'        => 'Scale delibere',
			'note'                     => 'Note',
			'license_number'           => 'N. licenza/titolo',
			'license_date'             => 'Data licenza/titolo',
			'construction_date'        => 'Anno costruzione',
			'administrator_fullname'   => 'Nominativo',
			'administrator_name'       => 'Nome',
			'administrator_surname'    => 'Cognome',
			'administrator_fiscalcode' => 'Codice Fiscale',
			'administrator_address'    => 'Indirizzo',
			'administrator_city'       => 'Città',
			'administrator_province'   => 'Provincia',
			'administrator_cap'        => 'CAP',
			'administrator_telephone'  => 'Telefono',
			'administrator_cellphone'  => 'Cellulare',
			'administrator_email'      => 'Email',
		];
		protected $listeners = [
			'condomino-created' => '$refresh'
		];

		public function mount() {
			$this->building = $this->practice->building;
		}

		public function exportExcel() {
			$this->authorize('export-condomini-excel', $this->practice);
			return redirect()->route('practice.condomini.export', $this->practice->id);
		}

		public function importExcel() {
			$this->authorize('import-condomini-excel', $this->practice);
			$extension = pathinfo($this->tmp_excel_file->getClientOriginalName(), PATHINFO_EXTENSION);
			$filename = pathinfo($this->tmp_excel_file->getClientOriginalName(), PATHINFO_FILENAME);
			// Dovendo avere un solo file caricato, cancello gli altri (se presenti) nella cartella
			if (count(Storage::allFiles('practices/' . $this->practice->id . '/excel'))) {
				$files = Storage::allFiles('practices/' . $this->practice->id . '/excel');
				Storage::delete($files);
			}
			$path = $this->tmp_excel_file->storeAs('practices/' . $this->practice->id . '/excel', $filename . '.' . $extension);
			$this->building->imported_excel_file = $path;
			$this->building->update([
				'imported_excel_file' => $path
			]);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Caricamento'),
				'subtitle' => __('Il file è stato caricato con successo!')
			]);
			$this->tmp_excel_file = null;
		}

		public function downloadExcel() {
			$this->authorize('download-condomini-excel', $this->practice);
			$file = $this->building->imported_excel_file;
			return Storage::download($file);
		}

		public function deleteExcel() {
			$this->authorize('delete-condomini-excel', $this->practice);
			$this->building->update([
				'imported_excel_file' => null
			]);
			$files = Storage::allFiles('practices/' . $this->practice->id . '/excel');
			Storage::delete($files);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Eliminazione'),
				'subtitle' => __('Il file è stato eliminato con successo!')
			]);
		}

		public function save() {
			$this->authorize('update', $this->practice);
			$validated = $this->validate();
			if (!$this->condomini->count()) {
				$this->addError('condomini', 'Inserisci almeno un condomino.');
				$this->dispatchBrowserEvent('open-notification', [
					'title'    => __('Errore'),
					'subtitle' => __('Controlla che i dati siano corretti e riprova!'),
					'type'     => 'error'
				]);
			} else {
				$this->building->save($validated);
				$this->dispatchBrowserEvent('open-notification', [
					'title'    => __('Aggiornamento'),
					'subtitle' => __('L\'immobile è stato aggiornato con successo!')
				]);
				$this->emitUp('change-tab', 'superbonus');
			}
		}

		public function render() {
			$this->condomini = $this->practice->condomini;
			return view('livewire.practice.tabs.building');
		}
	}
