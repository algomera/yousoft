<x-card class="space-y-5 border p-4 rounded-md">
	<form wire:submit.prevent="save" class="space-y-5">
		<x-section-heading class="!py-0 border-t-0">Interventi trainanti oggetto dei lavori</x-section-heading>
		<div class="space-y-3">
			<div class="flex items-center mt-3">
				<input wire:model="driving_intervention.thermical_isolation_intervention"
				       id="thermical_isolation_intervention"
				       name="thermical_isolation_intervention" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="thermical_isolation_intervention"
				       class="ml-3 block text-sm font-medium text-gray-700">Intervento di isolamento termico delle
					superfici opache verticali, orizzontali e inclinate</label>
			</div>
			<div>
				<x-label>Le superfici oggetto dell'intervento sono:</x-label>
				<div class="flex items-center justify-between">
					<nav class="flex space-x-4">
						<div wire:click="$set('currentSurface', 'PV')"
						     class="flex items-center space-x-2 @if($currentSurface === 'PV') bg-gray-100 text-gray-700 @else text-gray-500 hover:text-gray-700 @endif px-3 py-2 font-medium text-sm rounded-md cursor-pointer">
							<span>(PV) Pareti Verticali</span>
						</div>

						<div wire:click="$set('currentSurface', 'PO')"
						     class="flex items-center space-x-2 @if($currentSurface === 'PO') bg-gray-100 text-gray-700 @else text-gray-500 hover:text-gray-700 @endif px-3 py-2 font-medium text-sm rounded-md cursor-pointer">
							<span>(PO) Coperture</span>
						</div>

						<div wire:click="$set('currentSurface', 'PS')"
						     class="flex items-center space-x-2 @if($currentSurface === 'PS') bg-gray-100 text-gray-700 @else text-gray-500 hover:text-gray-700 @endif px-3 py-2 font-medium text-sm rounded-md cursor-pointer">
							<span>(PS) Pavimenti</span>
						</div>

						<div wire:click="$set('currentSurface', 'POND')"
						     class="flex items-center space-x-2 @if($currentSurface === 'POND') bg-gray-100 text-gray-700 @else text-gray-500 hover:text-gray-700 @endif px-3 py-2 font-medium text-sm rounded-md cursor-pointer">
							<span>(POND) Cop. non disperdenti</span>
						</div>
					</nav>
					<x-button type="button"
					          wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-surface', {{ json_encode(['practice' => $practice->id, 'intervention' => 'driving', 'condomino_id' => null, 'is_common' => 0, 'type' => $currentSurface]) }})"
					          prepend="plus" iconColor="text-white">
						Aggiungi {{ strtoupper($currentSurface) }}
					</x-button>
				</div>
				@switch($currentSurface)
					@case('PV')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.pv-surface
								:practice="$practice" :currentSurface="$currentSurface" intervention="driving"/>
						@break
					@case('PO')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.po-surface
								:practice="$practice" :currentSurface="$currentSurface" intervention="driving"/>
						@break
					@case('PS')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.ps-surface
								:practice="$practice" :currentSurface="$currentSurface" intervention="driving"/>
						@break
					@case('POND')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.pond-surface
								:practice="$practice" :currentSurface="$currentSurface" intervention="driving"/>
						@break
				@endswitch
			</div>
			<div>
				<x-label for="total_intervention_surface">Superficie totale oggetto dell'intervento *:</x-label>
				<div class="w-44 mb-1">
					<x-input wire:model.defer="driving_intervention.total_intervention_surface" type="number"
					         name="total_intervention_surface"
					         id="total_intervention_surface" append="m²"></x-input>
				</div>
				<p class="mt-1 text-xs text-gray-500">* il POND non viene considerato nel calcolo per l'ammissibilità
					dell'intervento trainante sull'involucro (maggiore del 25% della sup. disperdente)</p>
			</div>
			<div>
				<x-label for="total_expected_cost">Il costo complessivo previsto in progetto dei lavori sulle pratiche
					opache ammonta a *:
				</x-label>
				<div class="w-44 mb-1">
					<x-input-euro wire:model.defer="driving_intervention.total_expected_cost" name="total_expected_cost"
					              id="total_expected_cost"></x-input-euro>
				</div>
				<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es. progettazione, direzione
					lavori, asseverazione tecnica e fiscale)</p>
			</div>
			<div>
				<x-label for="max_possible_cost">La spesa massima ammissibile dei lavori sulle parti opache è pari a:
				</x-label>
				<div class="w-44 mb-1">
					<x-input-euro wire:model.defer="driving_intervention.max_possible_cost" name="max_possible_cost"
					              id="max_possible_cost"></x-input-euro>
				</div>
			</div>
			<div>
				<x-label>Il costo dei lavori realizzati è pari a</x-label>
				<div class="grid grid-cols-12 gap-4">
					<div class="col-span-6 sm:col-span-3 lg:col-span-2">
						<x-label for="total_isolation_cost_1">SAL n.1</x-label>
						<x-input-euro wire:model.defer="driving_intervention.total_isolation_cost_1"
						              id="total_isolation_cost_1"
						              hint="almeno al 30%"></x-input-euro>
					</div>
					<div class="col-span-6 sm:col-span-3 lg:col-span-2">
						<x-label for="total_isolation_cost_2">SAL n.2</x-label>
						<x-input-euro wire:model.defer="driving_intervention.total_isolation_cost_2"
						              id="total_isolation_cost_2"
						              hint="almeno al 60%"></x-input-euro>
					</div>
					<div class="col-span-6 sm:col-span-3 lg:col-span-2">
						<x-label for="final_isolation_cost">SAL F</x-label>
						<x-input-euro wire:model.defer="driving_intervention.final_isolation_cost"
						              id="final_isolation_cost"></x-input-euro>
					</div>
					<div class="col-span-6 sm:col-span-3 lg:col-span-2">
						<x-label>SAL 1+2</x-label>
						<x-input type="text" name="sal_1_2_total" disabled></x-input>
					</div>
					<div class="col-span-6 sm:col-span-3 lg:col-span-2">
						<x-label>SAL 1+2 F</x-label>
						<x-input type="text" name="final_sal_1_2_total" disabled></x-input>
					</div>
				</div>
			</div>
			<div>
				<x-label>Di cui per coperture non disperdenti:</x-label>
				<div class="w-44 mb-1">
					<x-input-euro wire:model.defer="driving_intervention.dispersing_covers" name="dispersing_covers"
					              id="dispersing_covers"></x-input-euro>
				</div>
			</div>
			<div>
				<x-label>Il risparmio di energia primaria non rinnovabile di progetto è:</x-label>
				<div class="w-44 mb-1">
					<x-input wire:model.defer="driving_intervention.isolation_energetic_savings" type="number"
					         name="isolation_energetic_savings" id="isolation_energetic_savings"
					         append="KWh"
					         hint="all'anno"></x-input>
				</div>
			</div>
			<div>
				<div class="flex items-center mt-3">
					<input wire:model="driving_intervention.winter_acs_replacing"
					       id="winter_acs_replacing"
					       name="winter_acs_replacing" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="winter_acs_replacing"
					       class="ml-3 block text-sm font-medium text-gray-700">Intervento di sostituzione degli
						impianti di climatizzazione invernale esistenti</label>
				</div>
			</div>
			<div>
				<x-label>Potenza utile complessiva pari a:</x-label>
				<div class="w-44 mb-1">
					<x-input wire:model.defer="driving_intervention.total_power" type="number" name="total_power"
					         id="total_power"
					         append="KWh"></x-input>
				</div>
			</div>
			<div>
				<x-label>Composto da n.</x-label>
				<div class="w-44 mb-1">
					<x-input wire:model.defer="driving_intervention.generators" type="number" step="1" name="generators"
					         id="generators"
					         hint="Generatori di calore"></x-input>
				</div>
			</div>
			<div class="space-y-5">
				<x-label>Con impianti centralizzati dotati di:</x-label>
				<livewire:practice.tabs.superbonus110.intervention.condensing-boilers :practice="$practice"/>
				<livewire:practice.tabs.superbonus110.intervention.heat-pumps :practice="$practice"/>
				<livewire:practice.tabs.superbonus110.intervention.absorption-heat-pumps :practice="$practice"/>
				<livewire:practice.tabs.superbonus110.intervention.hybrid-systems :practice="$practice"/>
				<livewire:practice.tabs.superbonus110.intervention.microgeneration-systems :practice="$practice"/>
				<livewire:practice.tabs.superbonus110.intervention.water-heatpumps-installations :practice="$practice"/>
				<livewire:practice.tabs.superbonus110.intervention.biome-generators :practice="$practice"/>
				<livewire:practice.tabs.superbonus110.intervention.solar-panels :practice="$practice"/>
				<div>
					<x-label>Destinati a:</x-label>
					<div class="sm:flex sm:items-center sm:flex-wrap">
						<div class="flex items-center sm:mr-5 mb-2">
							<input wire:model="driving_intervention.use_winter"
							       name="use_winter" type="checkbox"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
							<label for="use_winter"
							       class="ml-3 block text-sm font-medium text-gray-700">Climatizzazione
								invernale</label>
						</div>
						<div class="flex items-center sm:mr-5 mb-2">
							<input wire:model="driving_intervention.use_summer"
							       name="use_summer" type="checkbox"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
							<label for="use_summer"
							       class="ml-3 block text-sm font-medium text-gray-700">Climatizzazione estiva</label>
						</div>
						<div class="flex items-center sm:mr-5 mb-2">
							<input wire:model="driving_intervention.use_water"
							       name="use_water" type="checkbox"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
							<label for="use_water"
							       class="ml-3 block text-sm font-medium text-gray-700">Produzione di acqua calda
								sanitaria</label>
						</div>
					</div>
				</div>
			</div>
			<div>
				<x-label>Il costo complessivo di progetto degli interventi sull’impianto ammonta a *: <span
							class="font-semibold">? €</span></x-label>
				<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es. progettazione, direzione
					lavori, asseverazione tecnica e fiscale)</p>
			</div>
			<div>
				<x-label>L'ammontare massimo dei lavori per la sostituzione degli impianti è pari a: <span
							class="font-semibold">? €</span></x-label>
			</div>
			<div>
				<x-label>Per un ammontare pari a</x-label>
				<div class="grid grid-cols-12 gap-4">
					<div class="col-span-6 sm:col-span-3 lg:col-span-2">
						<x-label for="total_replacing_cost_1">SAL n.1</x-label>
						<x-input-euro wire:model.defer="driving_intervention.total_replacing_cost_1"
						              name="total_replacing_cost_1" id="total_replacing_cost_1"
						              hint="almeno al 30%"></x-input-euro>
					</div>
					<div class="col-span-6 sm:col-span-3 lg:col-span-2">
						<x-label for="total_replacing_cost_2">SAL n.2</x-label>
						<x-input-euro wire:model.defer="driving_intervention.total_replacing_cost_2"
						              name="total_replacing_cost_2" id="total_replacing_cost_2"
						              hint="almeno al 60%"></x-input-euro>
					</div>
					<div class="col-span-6 sm:col-span-3 lg:col-span-2">
						<x-label for="final_replacing_cost">SAL F</x-label>
						<x-input-euro wire:model.defer="driving_intervention.final_replacing_cost"
						              name="final_replacing_cost" id="final_replacing_cost"></x-input-euro>
					</div>
					<div class="col-span-6 sm:col-span-3 lg:col-span-2">
						<x-label>SAL 1+2</x-label>
						<x-input type="text" name="sal_1_2_replacing_total" disabled></x-input>
					</div>
					<div class="col-span-6 sm:col-span-3 lg:col-span-2">
						<x-label>SAL 1+2 F</x-label>
						<x-input type="text" name="final_sal_1_2_replacing_total" disabled></x-input>
					</div>
				</div>
			</div>
			<div>
				<x-label for="total_intervention_surface">
					Il risparmio di energia primaria non rinnovabile di progetto è
				</x-label>
				<div class="w-44 mb-1">
					<x-input wire:model.defer="driving_intervention.replacing_energetic_savings" type="number"
					         name="total_intervention_surface"
					         id="total_intervention_surface" append="KWh" hint="all'anno"></x-input>
				</div>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
			<x-button>Salva</x-button>
		</div>
	</form>
</x-card>