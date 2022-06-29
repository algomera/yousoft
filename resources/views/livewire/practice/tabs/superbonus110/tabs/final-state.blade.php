<x-card class="space-y-5 border p-4 rounded-md">
	<form wire:submit.prevent="save" class="space-y-5">
		<x-section-heading class="!py-0 border-t-0">Dati Stato Finale</x-section-heading>
		<div class="space-y-3">
			<div>
				<x-label class="underline">Impianto termico esistente nella situazione ante intervento:</x-label>
			</div>
			<div>
				<x-select wire:model.defer="final_state.plant_type" name="plant_type" label="Tipo di impianto">
					<option value="Impianto autonomo">Impianto autonomo</option>
					<option value="Impianto centralizzato">Impianto centralizzato</option>
					<option value="Impianto centralizzato contabilizzato per singolo utente">Impianto centralizzato
						contabilizzato per singolo utente
					</option>
					<option value="Impianto centralizzato con più generatori di calore">Impianto centralizzato con più
						generatori di calore
					</option>
					<option value="Impianto centralizzato con più generatori di calore e contabilizzato per singolo utente">
						Impianto centralizzato con più generatori di calore e contabilizzato per singolo utente
					</option>
					<option value="Altro">Altro</option>
				</x-select>
			</div>
			<div>
				<x-select wire:model.defer="final_state.heat_terminals" name="heat_terminals"
				          label="Tipo di erogazione del calore">
					<option value="Termoconvettori">Termoconvettori</option>
					<option value="Ventilconvettori">Ventilconvettori</option>
					<option value="Bocchette aria calda">Bocchette aria calda</option>
					<option value="Radiatori">Radiatori</option>
					<option value="Pannelli radianti isolati dalle strutture">Pannelli radianti isolati dalle
						strutture
					</option>
					<option value="Pannelli radianti annegati nella struttura">Pannelli radianti annegati nella
						struttura
					</option>
					<option value="Altro">Altro</option>
				</x-select>
			</div>
			<div>
				<x-select wire:model.defer="final_state.distribution_type" name="distribution_type"
				          label="Tipo di distribuzione">
					<option value="Edifici a colonne montanti situati totalmente all'interno di ambienti riscaldati">
						Edifici a colonne montanti situati totalmente all'interno di ambienti riscaldati
					</option>
					<option value="Edifici a colonne montanti non isolati termicamente inseriti all'interno delle pareti">
						Edifici a colonne montanti non isolati termicamente inseriti all'interno delle pareti
					</option>
					<option value="Edifici con distribuzione orizzontale o ad anello">Edifici con distribuzione
						orizzontale o ad anello
					</option>
					<option value="Altro">Altro</option>
				</x-select>
			</div>
			<div>
				<x-select wire:model.defer="final_state.adjustment_type" name="adjustment_type"
				          label="Tipo di regolazione">
					<option value="Regolazione centralizzata">Regolazione centralizzata</option>
					<option value="Regolazione su terminale di erogazione">Regolazione su terminale di erogazione
					</option>
					<option value="Regolazione ad ambiente o a zona">Regolazione ad ambiente o a zona</option>
					<option value="Altro">Altro</option>
				</x-select>
			</div>
			<div>
				<livewire:practice.tabs.superbonus110.tabs.final-state.generators :practice="$practice"/>
			</div>
			<div>
				<x-label for="final_state.overall_power">Potenza nominale complessiva</x-label>
				<div class="w-44 mb-1">
					<x-input wire:model.defer="final_state.overall_power" type="number"
					         name="overall_power" append="kW"></x-input>
				</div>
			</div>
			<div>
				<x-select wire:model.defer="final_state.energetic_vector" name="energetic_vector"
				          label="Vettore energetico prevalente">
					<option value="Gas metano">Gas metano</option>
					<option value="Gasolio">Gasolio</option>
					<option value="Gpl">Gpl</option>
					<option value="Teleriscaldamento">Teleriscaldamento</option>
					<option value="Olio combustibile">Olio combustibile</option>
					<option value="Energia elettrica">Energia elettrica</option>
					<option value="Biomassa">Biomassa</option>
					<option value="Altro">Altro</option>
				</x-select>
			</div>
			<div class="space-y-3">
				<div class="flex items-center mt-3">
					<input wire:model="final_state.summer_acs_presence"
					       id="summer_acs_presence"
					       name="summer_acs_presence" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="summer_acs_presence"
					       class="ml-3 block text-sm font-medium text-gray-700">Presenza dell'impianto di
						condizionamento estivo</label>
				</div>
				<x-textarea wire:model.defer="final_state.summer_acs_renovation" name="summer_acs_renovation"
				            label="Eventuali interventi di manutenzione straordinaria" rows="6"></x-textarea>
			</div>
			<div>
				<x-label class="underline">APE IE. Involucro Edilizio</x-label>
			</div>
			<div>
				<x-select wire:model.defer="final_state.construction_tipology" name="construction_tipology"
				          label="Tipologia costruttiva">
					<option value="Muratura portante">Muratura portante</option>
					<option value="Telaio in cemento armato">Telaio in cemento armato</option>
					<option value="Telaio in acciaio">Telaio in acciaio</option>
					<option value="Mista">Mista</option>
					<option value="Pannelli prefabbricati">Pannelli prefabbricati</option>
				</x-select>
			</div>
			<div class="grid grid-cols-2 sm:grid-cols-3 gap-x-3 gap-y-4">
				<div>
					<x-label for="final_state.heated_volume">Volume lordo riscaldato V</x-label>
					<div class="w-full mb-1">
						<x-input wire:model.defer="final_state.heated_volume" type="number"
						         name="heated_volume" append="m³"></x-input>
					</div>
				</div>
				<div>
					<x-label for="final_state.dispersing_surface">Superficie disperdente S</x-label>
					<div class="w-full mb-1">
						<x-input wire:model.defer="final_state.dispersing_surface" type="number"
						         name="dispersing_surface" append="m²"></x-input>
					</div>
				</div>
				<div>
					<x-label for="final_state.SV_report">Rapporto S/V</x-label>
					<div class="w-full mb-1">
						<x-input wire:model.defer="final_state.SV_report" type="number"
						         name="SV_report"></x-input>
					</div>
				</div>
				<div>
					<x-label for="final_state.useful_heated_surface">Superficie utile riscaldata</x-label>
					<div class="w-full mb-1">
						<x-input wire:model.defer="final_state.useful_heated_surface" type="number"
						         name="useful_heated_surface" append="m²"></x-input>
					</div>
				</div>
				<div>
					<x-label for="final_state.useful_cooled_surface">Superficie utile raffrescata</x-label>
					<div class="w-full mb-1">
						<x-input wire:model.defer="final_state.useful_cooled_surface" type="number"
						         name="useful_cooled_surface" append="m²"></x-input>
					</div>
				</div>
				<div>
					<x-label for="final_state.generator_inst_date">Anno di installazione del generatore</x-label>
					<div class="w-full mb-1">
						<x-input wire:model.defer="final_state.generator_inst_date" type="number"
						         step="1" min="0" name="generator_inst_date"></x-input>
					</div>
				</div>
			</div>
			<x-textarea wire:model.defer="final_state.extra_maintenance" name="extra_maintenance"
			            label="Eventuali interventi di manutenzione straordinaria o ristrutturazione"
			            rows="6"></x-textarea>
			<hr class="border-2">
			<div>
				<x-label class="underline">APE IR. Impianto di Riscaldamento nella situazione post intervento</x-label>
			</div>
			<div>
				<div class="flex items-center mt-3">
					<input wire:model="final_state.winter_acs"
					       id="winter_acs"
					       name="winter_acs" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="winter_acs"
					       class="ml-3 block text-sm font-medium text-gray-700">Climatizzazione invernale</label>
				</div>
				<div class="flex items-center mt-3">
					<input wire:model="final_state.hot_water_production"
					       id="hot_water_production"
					       name="hot_water_production" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="hot_water_production"
					       class="ml-3 block text-sm font-medium text-gray-700">Produzione di acqua calda
						sanitaria</label>
				</div>
				<div class="flex items-center mt-3">
					<input wire:model="final_state.mechanic_ventilation"
					       id="mechanic_ventilation"
					       name="mechanic_ventilation" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="mechanic_ventilation"
					       class="ml-3 block text-sm font-medium text-gray-700">Ventilazione meccanica</label>
				</div>
				<div class="flex items-center mt-3">
					<input wire:model="final_state.summer_acs"
					       id="summer_acs"
					       name="summer_acs" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="summer_acs"
					       class="ml-3 block text-sm font-medium text-gray-700">Climatizzazione estiva</label>
				</div>
				<div class="flex items-center mt-3">
					<input wire:model="final_state.lighting"
					       id="lighting"
					       name="lighting" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="lighting"
					       class="ml-3 block text-sm font-medium text-gray-700">Illuminazione</label>
				</div>
				<div class="flex items-center mt-3">
					<input wire:model="final_state.transport"
					       id="transport"
					       name="transport" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="transport"
					       class="ml-3 block text-sm font-medium text-gray-700">Trasporto di persone o cose</label>
				</div>
			</div>
			<hr class="border-2">
			<div>
				<x-label class="underline">APE DC. Dati climatici</x-label>
			</div>
			<div>
				<x-label for="final_state.project_temperature">Temperatura di progetto</x-label>
				<div class="w-44 mb-1">
					<x-input wire:model.defer="final_state.project_temperature" type="number"
					         step="0.1" name="project_temperature" append="°C"></x-input>
				</div>
			</div>
			<hr class="border-2">
			<div>
				<x-label class="underline">APE TR. Tecnologie di utilizzo delle fonti rinnovabili, ove presenti
				</x-label>
			</div>
			<div>
				<x-label for="final_state.fotovoltaic_max_power">Fotovoltaico potenza di picco</x-label>
				<div class="w-44 mb-1">
					<x-input wire:model.defer="final_state.fotovoltaic_max_power" type="number"
					         name="fotovoltaic_max_power" append="kW"></x-input>
				</div>
			</div>
			<div>
				<x-label for="final_state.eolic_nominal_power">Eolico potenza nominale</x-label>
				<div class="w-44 mb-1">
					<x-input wire:model.defer="final_state.eolic_nominal_power" type="number"
					         name="eolic_nominal_power" append="kW"></x-input>
				</div>
			</div>
			<div>
				<x-label for="final_state.collector_surface">Solare termico superficie dei collettori</x-label>
				<div class="w-44 mb-1">
					<x-input wire:model.defer="final_state.collector_surface" type="number"
					         name="collector_surface" append="m²"></x-input>
				</div>
			</div>
			<hr class="border-2">
			<div>
				<x-label class="font-bold">Risultati della valutazione energetica</x-label>
			</div>
			<div>
				<x-label class="underline">APE NM. Norme e metodologie</x-label>
			</div>
			<x-textarea wire:model.defer="final_state.technical_standard" name="technical_standard"
			            label="Riferimento alle norme tecniche utilizzate" rows="6"></x-textarea>
			<x-textarea wire:model.defer="final_state.energetic_evaluation_method" name="energetic_evaluation_method"
			            label="Metodo di valutazione della prestazione energetica utilizzato" rows="6"></x-textarea>
			<hr class="border-2">
			<div>
				<x-label class="underline">APE DE. Descrizione edificio</x-label>
			</div>
			<x-textarea wire:model.defer="final_state.building_description" name="building_description"
			            label="Descrizione dell'edificio e della sua localizzazione e destinazione d'uso"
			            rows="6"></x-textarea>
			<hr class="border-2">
			<div>
				<x-label class="underline">APE I. Indici di prestazione energetica</x-label>
			</div>
			<div>
				<x-label for="final_state.nr_energy_perf_index">Indice di prestazione energetica non rinnovabile per la
					climatizzazione invernale proprio dell'edificio EPH,nren
				</x-label>
				<div class="w-56 mb-1">
					<x-input wire:model.defer="final_state.nr_energy_perf_index" type="number"
					         class="pr-20"
					         name="nr_energy_perf_index" append="kWh/m²" hint="all'anno"></x-input>
				</div>
			</div>
			<div>
				<x-label for="final_state.nr_energy_perf_index">Indice di prestazione energetica rinnovabile per la
					climatizzazione
					invernale proprio dell'edificio EPH,ren
				</x-label>
				<div class="w-56 mb-1">
					<x-input wire:model.defer="final_state.r_energy_perf_index" type="number"
					         class="pr-20"
					         name="r_energy_perf_index" append="kWh/m²" hint="all'anno"></x-input>
				</div>
			</div>
			<hr class="border-2">
			<div>
				<x-label class="underline">APE Q. Qualità invernale ed estiva dell'involucro</x-label>
			</div>
			<div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
				<div>
					<x-label for="final_state.EPH">EPH,nd</x-label>
					<div class="w-full mb-1">
						<x-input wire:model.defer="final_state.EPH" type="number"
						         class="pr-20"
						         name="EPH" append="kWh/m²" hint="all'anno"></x-input>
					</div>
				</div>
				<div>
					<x-label for="final_state.Asup">Asol,est/Asup utile</x-label>
					<div class="w-full mb-1">
						<x-input wire:model.defer="final_state.Asup" type="number"
						         name="Asup"></x-input>
					</div>
				</div>
				<div>
					<x-label for="final_state.YIE">YIE</x-label>
					<div class="w-full mb-1">
						<x-input wire:model.defer="final_state.YIE" type="number"
						         name="YIE"></x-input>
					</div>
				</div>
			</div>
			<div>
				<x-label for="final_state.EPgl_nren">Indice di prestazione energetica globale dell'edificio espresso in
					energia primaria non rinnovabile EPgl,nren
				</x-label>
				<div class="w-56 mb-1">
					<x-input wire:model.defer="final_state.EPgl_nren" type="number"
					         class="pr-20"
					         name="EPgl_nren" append="kWh/m²" hint="all'anno"></x-input>
				</div>
			</div>
			<div>
				<x-select wire:model.defer="final_state.invernal_case_quality" name="invernal_case_quality"
				          label="Qualità invernale involucro">
					<option value="Bassa">Bassa</option>
					<option value="Media">Media</option>
					<option value="Alta">Alta</option>
				</x-select>
			</div>
			<div>
				<x-select wire:model.defer="final_state.summer_case_quality" name="summer_case_quality"
				          label="Qualità estiva involucro">
					<option value="Bassa">Bassa</option>
					<option value="Media">Media</option>
					<option value="Alta">Alta</option>
				</x-select>
			</div>
			<div>
				<x-select wire:model.defer="final_state.energetic_class" name="energetic_class"
				          label="Classe energetica">
					<option value="A4">A4</option>
					<option value="A3">A3</option>
					<option value="A2">A2</option>
					<option value="A1">A1</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="E">E</option>
					<option value="F">F</option>
					<option value="G">G</option>
				</x-select>
			</div>
			<div class="flex items-center mt-3">
				<input wire:model="final_state.people_transport"
				       id="people_transport"
				       name="people_transport" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="people_transport"
				       class="ml-3 block text-sm font-medium text-gray-700">Trasporto di persone o cose</label>
			</div>
			<hr class="border-2">
			<div>
				<x-label class="underline">APE LC. Lista delle raccomandazioni</x-label>
			</div>
			<x-textarea wire:model.defer="final_state.possible_improvements" name="possible_improvements"
			            label="Possibili interventi di miglioramento" rows="6"></x-textarea>
		</div>

		{{ $errors }}

		<div class="flex justify-end space-x-3">
			<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
			<x-button>Salva</x-button>
		</div>
	</form>
</x-card>