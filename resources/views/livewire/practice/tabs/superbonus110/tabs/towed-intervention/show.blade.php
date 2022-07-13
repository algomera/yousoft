<div class="space-y-5">
	<x-section-heading class="!py-0 !border-t-0">Interventi trainati oggetto dei lavori</x-section-heading>
	@isset($condomino_id)
		<livewire:practice.tabs.superbonus110.tabs.towed-intervention.condomino-section :condomino="$condomino"/>
	@endisset
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="space-y-3">
			<div class="flex items-center mt-3">
				<input wire:model="towed_intervention.thermical_isolation_intervention"
				       id="thermical_isolation_intervention"
				       name="thermical_isolation_intervention" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="thermical_isolation_intervention"
				       class="ml-3 block text-sm font-medium text-gray-700">1. Intervento di isolamento termico delle
					superfici opache verticali, orizzontali e inclinate</label>
			</div>
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
				</nav>
				@can('update', $practice)
					<x-button type="button"
					          wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-surface', {{ json_encode(['practice' => $practice->id, 'intervention' => 'towed', 'condomino_id' => $condomino_id, 'is_common' => $is_common, 'type' => $currentSurface]) }})"
					          prepend="plus" iconColor="text-white">
						Aggiungi {{ strtoupper($currentSurface) }}
					</x-button>
				@endcan
			</div>
			<div>
				@switch($currentSurface)
					@case('PV')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.pv-surface
								:practice="$practice" :currentSurface="$currentSurface" intervention="towed"
								:condomino_id="$condomino_id" :is_common="$is_common"/>
						@break
					@case('PO')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.po-surface
								:practice="$practice" :currentSurface="$currentSurface" intervention="towed"
								:condomino_id="$condomino_id" :is_common="$is_common"/>
						@break
					@case('PS')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.ps-surface
								:practice="$practice" :currentSurface="$currentSurface" intervention="towed"
								:condomino_id="$condomino_id" :is_common="$is_common"/>
						@break
					@case('POND')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.pond-surface
								:practice="$practice" :currentSurface="$currentSurface" intervention="towed"
								:condomino_id="$condomino_id" :is_common="$is_common"/>
						@break
				@endswitch
			</div>
			<div>
				<x-label for="total_intervention_surface">Superficie totale oggetto dell'intervento *:</x-label>
				<div class="w-44 mb-1">
					<x-input wire:model.defer="towed_intervention.total_intervention_surface" type="number"
					         name="total_intervention_surface"
					         id="total_intervention_surface" append="m²"></x-input>
				</div>
			</div>
			<div>
				<x-label for="total_expected_cost">Il costo complessivo previsto in progetto dei lavori sulle pratiche
					opache ammonta a *:
				</x-label>
				<div class="w-44 mb-1">
					<x-input-euro wire:model.defer="towed_intervention.total_expected_cost"
					              name="total_expected_cost" id="total_expected_cost" label="Importo stimato"/>
				</div>
				<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es. progettazione, direzione
					lavori, asseverazione tecnica e fiscale)</p>
			</div>
			<x-card class="p-4 border rounded-md">
				<div class="space-y-3">
					<livewire:practice.tabs.superbonus110.intervention.fixtures :practice="$practice"
					                                                            :condomino_id="$condomino_id"
					                                                            :is_common="$is_common"/>
					<div>
						<x-label for="in_project_cost">Le spese previste in progetto dei lavori al punto IN ammontano a
							*:
						</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.in_project_cost"
							              name="in_project_cost" id="in_project_cost"/>
						</div>
						<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es. progettazione,
							direzione
							lavori, asseverazione tecnica e fiscale)</p>
					</div>
					<div>
						<x-label for="work_expected_cost">La spesa prevista per gli interventi di cui ai punti PV, PO,
							PS e IN ammonta a
							*:
						</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.work_expected_cost"
							              name="work_expected_cost" id="work_expected_cost"/>
						</div>
						<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es. progettazione,
							direzione
							lavori, asseverazione tecnica e fiscale)</p>
					</div>
					<div>
						<x-label for="in_max_cost">La spesa massima ammissibile è pari a:</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.in_max_cost"
							              name="in_max_cost" id="in_max_cost"/>
						</div>
					</div>
					<div>
						<x-label for="in_energetic_savings">Il risparmio di energia primaria non rinnovabile di progetto
							è
							:
						</x-label>
						<div class="w-44 mb-1">
							<x-input wire:model.defer="towed_intervention.in_energetic_savings"
							         name="in_energetic_savings" id="in_energetic_savings"
							         type="number" append="KWh" hint="all'anno"></x-input>
						</div>
					</div>
				</div>
			</x-card>
			<x-card class="p-4 border rounded-md">
				<div class="space-y-3">
					<livewire:practice.tabs.superbonus110.intervention.sunscreens :practice="$practice"
					                                                              :condomino_id="$condomino_id"
					                                                              :is_common="$is_common"/>
					<div>
						<x-label for="ss_project_cost">Le spese previste in progetto dei lavori al punto SS ammontano a
							*:
						</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.ss_project_cost"
							              name="ss_project_cost" id="ss_project_cost"/>
						</div>
					</div>
					<div>
						<x-label for="ss_max_cost">La spesa massima ammissibile è pari a:</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.ss_max_cost"
							              name="ss_max_cost" id="ss_max_cost"/>
						</div>
					</div>
					<div>
						<x-label for="ss_energetic_savings">Il risparmio di energia primaria non rinnovabile di progetto
							è
							:
						</x-label>
						<div class="w-44 mb-1">
							<x-input wire:model.defer="towed_intervention.ss_energetic_savings"
							         name="ss_energetic_savings" id="ss_energetic_savings"
							         type="number" append="KWh" hint="all'anno"></x-input>
						</div>
					</div>
				</div>
			</x-card>
			<hr>
			<div class="flex items-center mt-3">
				<input wire:model="towed_intervention.wacs_replacement"
				       id="wacs_replacement"
				       name="wacs_replacement" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="wacs_replacement"
				       class="ml-3 block text-sm font-medium text-gray-700">2. Intervento di sostituzione degli impianti
					di climatizzazione invernale esistenti</label>
			</div>
			<div class="space-y-5">
				<x-label>Con impianti dotati di:</x-label>
				<livewire:practice.tabs.superbonus110.intervention.condensing-boilers :practice="$practice"
				                                                                      :condomino_id="$condomino_id"
				                                                                      :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.condensing-hot-air-generators :practice="$practice"
				                                                                                 :condomino_id="$condomino_id"
				                                                                                 :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.heat-pumps :practice="$practice"
				                                                              :condomino_id="$condomino_id"
				                                                              :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.absorption-heat-pumps :practice="$practice"
				                                                                         :condomino_id="$condomino_id"
				                                                                         :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.hybrid-systems :practice="$practice"
				                                                                  :condomino_id="$condomino_id"
				                                                                  :is_common="$is_common"/>
				<x-card class="border p-4 rounded-md">
					<div class="space-y-3">
						<livewire:practice.tabs.superbonus110.intervention.water-heatpumps-installations
								:practice="$practice"
								:condomino_id="$condomino_id"
								:is_common="$is_common"/>
						<div>
							<x-label for="sa_project_cost">Il costo complessivo previsto degli interventi sull'impianto
								(Punto 2) ammonta a
								*:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.sa_project_cost"
								              name="sa_project_cost" id="sa_project_cost"/>
							</div>
							<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es.
								progettazione, direzione
								lavori, asseverazione tecnica e fiscale)</p>
						</div>
						<div>
							<x-label for="sa_max_cost">La spesa massima ammissibile per la sostituzione degli
								impianti è pari a:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.sa_max_cost"
								              name="sa_max_cost" id="sa_max_cost"/>
							</div>
						</div>
						<div>
							<x-label for="sa_energetic_savings">Il risparmio di energia primaria non rinnovabile di
								progetto
								è
								:
							</x-label>
							<div class="w-44 mb-1">
								<x-input wire:model.defer="towed_intervention.sa_energetic_savings"
								         name="sa_energetic_savings" id="sa_energetic_savings"
								         type="number" append="KWh" hint="all'anno"></x-input>
							</div>
						</div>
					</div>
				</x-card>
				<x-card class="border p-4 rounded-md">
					<div class="space-y-3">
						<livewire:practice.tabs.superbonus110.intervention.microgeneration-systems :practice="$practice"
						                                                                           :condomino_id="$condomino_id"
						                                                                           :is_common="$is_common"/>
						<div>
							<x-label for="co_project_cost">Il costo previsto per i sistemi di microgenerazione CO
								ammonta a *:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.co_project_cost"
								              name="co_project_cost" id="co_project_cost"/>
							</div>
							<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es.
								progettazione, direzione
								lavori, asseverazione tecnica e fiscale)</p>
						</div>
						<div>
							<x-label for="co_max_cost">La spesa massima ammissibile per l'intervento è pari a:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.co_max_cost"
								              name="co_max_cost" id="co_max_cost"/>
							</div>
						</div>
						<div>
							<x-label for="co_energetic_savings">Il risparmio di energia primaria non rinnovabile di
								progetto
								è
								:
							</x-label>
							<div class="w-44 mb-1">
								<x-input wire:model.defer="towed_intervention.co_energetic_savings"
								         name="co_energetic_savings" id="co_energetic_savings"
								         type="number" append="KWh" hint="all'anno"></x-input>
							</div>
						</div>
					</div>
				</x-card>
				<x-card class="border p-4 rounded-md">
					<div class="space-y-3">
						<livewire:practice.tabs.superbonus110.intervention.biome-generators :practice="$practice"
						                                                                    :condomino_id="$condomino_id"
						                                                                    :is_common="$is_common"/>
						<div>
							<x-label for="ib_project_cost">Il costo previsto per i generatori a biomassa IB
								ammonta a *:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.ib_project_cost"
								              name="ib_project_cost" id="ib_project_cost"/>
							</div>
							<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es.
								progettazione, direzione
								lavori, asseverazione tecnica e fiscale)</p>
						</div>
						<div>
							<x-label for="ib_max_cost">La spesa massima ammissibile per l'intervento è pari a:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.ib_max_cost"
								              name="ib_max_cost" id="ib_max_cost"/>
							</div>
						</div>
						<div>
							<x-label for="ib_energetic_savings">Il risparmio di energia primaria non rinnovabile di
								progetto
								è
								:
							</x-label>
							<div class="w-44 mb-1">
								<x-input wire:model.defer="towed_intervention.ib_energetic_savings"
								         name="ib_energetic_savings" id="ib_energetic_savings"
								         type="number" append="KWh" hint="all'anno"></x-input>
							</div>
						</div>
					</div>
				</x-card>
				{{--								<livewire:practice.tabs.superbonus110.intervention.building-automations :practice="$practice"--}}
				{{--								                                                                        :condomino_id="$condomino_id"--}}
				{{--								                                                                        :is_common="$is_common"/>--}}
				<x-card class="border p-4 rounded-md">
					<div class="flex items-center mt-3">
						<input wire:model="towed_intervention.ba"
						       id="ba"
						       name="ba" type="checkbox"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
						<label for="ba"
						       class="ml-3 block text-sm font-medium text-gray-700">BA. Building Automation</label>
					</div>
					<div class="grid grid-cols-3 gap-4 mt-2">
						<fieldset class="col-span-12">
							<x-label>Climatizzazione invernale:</x-label>
							<div class="sm:flex sm:items-center sm:flex-wrap">
								<div class="flex items-center sm:mr-5 mb-2">
									<input wire:model.defer="towed_intervention.ba_winter_acs" name="ba_winter_acs"
									       type="radio"
									       value="notDefine"
									       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
									<label for="ba_winter_acs"
									       class="ml-3 block text-sm font-medium text-gray-700">N.D</label>
								</div>
								<div class="flex items-center sm:mr-5 mb-2">
									<input wire:model.defer="towed_intervention.ba_winter_acs" name="ba_winter_acs"
									       type="radio"
									       value="no"
									       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
									<label for="ba_winter_acs"
									       class="ml-3 block text-sm font-medium text-gray-700">No</label>
								</div>
								<div class="flex items-center sm:mr-5 mb-2">
									<input wire:model.defer="towed_intervention.ba_winter_acs" name="ba_winter_acs"
									       type="radio"
									       value="yes"
									       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
									<label for="ba_winter_acs"
									       class="ml-3 block text-sm font-medium text-gray-700">Si</label>
								</div>
							</div>
						</fieldset>
						<fieldset class="col-span-12">
							<x-label>Climatizzazione estiva:</x-label>
							<div class="sm:flex sm:items-center sm:flex-wrap">
								<div class="flex items-center sm:mr-5 mb-2">
									<input wire:model.defer="towed_intervention.ba_summer_acs" name="ba_summer_acs"
									       type="radio"
									       value="notDefine"
									       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
									<label for="ba_summer_acs"
									       class="ml-3 block text-sm font-medium text-gray-700">N.D</label>
								</div>
								<div class="flex items-center sm:mr-5 mb-2">
									<input wire:model.defer="towed_intervention.ba_summer_acs" name="ba_summer_acs"
									       type="radio"
									       value="no"
									       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
									<label for="ba_summer_acs"
									       class="ml-3 block text-sm font-medium text-gray-700">No</label>
								</div>
								<div class="flex items-center sm:mr-5 mb-2">
									<input wire:model.defer="towed_intervention.ba_summer_acs" name="ba_summer_acs"
									       type="radio"
									       value="yes"
									       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
									<label for="ba_summer_acs"
									       class="ml-3 block text-sm font-medium text-gray-700">Si</label>
								</div>
							</div>
						</fieldset>
						<fieldset class="col-span-12">
							<x-label>Prod. di acqua calda sanitaria:</x-label>
							<div class="sm:flex sm:items-center sm:flex-wrap">
								<div class="flex items-center sm:mr-5 mb-2">
									<input wire:model.defer="towed_intervention.ba_hot_water_production"
									       name="ba_hot_water_production"
									       type="radio" value="notDefine"
									       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
									<label for="ba_hot_water_production"
									       class="ml-3 block text-sm font-medium text-gray-700">N.D</label>
								</div>
								<div class="flex items-center sm:mr-5 mb-2">
									<input wire:model.defer="towed_intervention.ba_hot_water_production"
									       name="ba_hot_water_production"
									       type="radio"
									       value="no"
									       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
									<label for="ba_hot_water_production"
									       class="ml-3 block text-sm font-medium text-gray-700">No</label>
								</div>
								<div class="flex items-center sm:mr-5 mb-2">
									<input wire:model.defer="towed_intervention.ba_hot_water_production"
									       name="ba_hot_water_production"
									       type="radio"
									       value="yes"
									       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
									<label for="ba_hot_water_production"
									       class="ml-3 block text-sm font-medium text-gray-700">Si</label>
								</div>
							</div>
						</fieldset>
					</div>
					<div>
						<x-label>Superficie utile degli ambienti controllati:</x-label>
						<div class="w-full sm:w-44 mb-1">
							<x-input wire:model.defer="towed_intervention.ba_usable_area" type="number"
							         name="ba_usable_area"
							         id="ba_usable_area"
							         append="m²"></x-input>
						</div>
						<p class="mt-1 text-xs text-gray-500">I dispositivi installati hanno caratteristiche e funzioni
							conformi
							a quanto previsto dal “decreto requisiti ecobonus”</p>
					</div>
					<div>
						<x-label for="ss_project_cost">Il costo previsto per Building automation BA ammonta a *:
						</x-label>
						<div class="w-full sm:w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.ba_project_cost"
							              name="ba_project_cost" id="ba_project_cost"></x-input-euro>
						</div>
						<p class="mt-1 text-xs text-gray-500">* Incluso iva e spese professionali (es. progettazione,
							direzione
							lavori, assservazione tecnica e fiscale)</p>
					</div>
					<div>
						<x-label for="ba_max_cost">La spesa massima ammissibile dal "decreto requisiti ecobonus" è pari
							a:
						</x-label>
						<div class="w-full sm:w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.ba_max_cost"
							              name="ba_max_cost" id="ba_max_cost"></x-input-euro>
						</div>
					</div>
					<div>
						<x-label for="ba_energetic_savings">Il risparmio di energia primaria non rinnovabile di progetto
							è:
						</x-label>
						<div class="w-full sm:w-44 mb-1">
							<x-input wire:model.defer="towed_intervention.ba_energetic_savings"
							         name="ba_energetic_savings" id="ba_energetic_savings"
							         type="number" append="KWh" hint="all'anno"></x-input>
						</div>
					</div>
				</x-card>
				<div>
					<x-label>Destinati a:</x-label>
					<div class="sm:flex sm:items-center sm:flex-wrap">
						<div class="flex items-center sm:mr-5 mb-2">
							<input wire:model="towed_intervention.use_winter"
							       name="use_winter" type="checkbox"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
							<label for="use_winter"
							       class="ml-3 block text-sm font-medium text-gray-700">Climatizzazione
								invernale</label>
						</div>
						<div class="flex items-center sm:mr-5 mb-2">
							<input wire:model="towed_intervention.use_summer"
							       name="use_summer" type="checkbox"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
							<label for="use_summer"
							       class="ml-3 block text-sm font-medium text-gray-700">Climatizzazione estiva</label>
						</div>
						<div class="flex items-center sm:mr-5 mb-2">
							<input wire:model="towed_intervention.use_water"
							       name="use_water" type="checkbox"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
							<label for="use_water"
							       class="ml-3 block text-sm font-medium text-gray-700">Produzione di acqua calda
								sanitaria</label>
						</div>
					</div>
				</div>
				<x-card class="p-4 border rounded-md">
					<div class="space-y-3">
						<livewire:practice.tabs.superbonus110.intervention.solar-panels :practice="$practice"
						                                                                :condomino_id="$condomino_id"
						                                                                :is_common="$is_common"/>
						<div>
							<x-label for="st_project_cost">Il costo previsto per i collettori solari ST ammonta a
								*:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.st_project_cost"
								              name="st_project_cost" id="st_project_cost"/>
							</div>
							<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es.
								progettazione, direzione
								lavori, asseverazione tecnica e fiscale)</p>
						</div>
						<div>
							<x-label for="st_max_cost">La spesa massima ammissibile è pari a:</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.st_max_cost"
								              name="st_max_cost" id="st_max_cost"/>
							</div>
						</div>
						<div>
							<x-label for="st_energetic_savings">Il risparmio di energia primaria non rinnovabile di
								progetto
								è:
							</x-label>
							<div class="w-44 mb-1">
								<x-input wire:model.defer="towed_intervention.st_energetic_savings"
								         name="st_energetic_savings" id="st_energetic_savings"
								         type="number" append="KWh" hint="all'anno"></x-input>
							</div>
						</div>
					</div>
				</x-card>
				<x-card class="border p-4 rounded-md">
					<div class="flex items-center">
						<input wire:model="towed_intervention.fv"
						       id="fv"
						       name="fv" type="checkbox"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
						<label for="fv"
						       class="ml-3 block text-sm font-medium text-gray-700">FV. Fotovoltaico</label>
					</div>
					<div class="grid grid-cols-12 gap-4">
						<div class="col-span-12 sm:col-span-6">
							<x-input wire:model.defer="towed_intervention.fv_pod_code" type="text" name="fv_pod_code"
							         id="fv_pod_code"
							         label="Codice POD"></x-input>
						</div>
						<div class="col-span-12 sm:col-span-6">
							<x-input wire:model.defer="towed_intervention.fv_max_power" type="number"
							         name="fv_max_power" id="fv_max_power"
							         label="Potenza di picco" append="kW"></x-input>
						</div>
					</div>
					<div>
						<x-label for="fv_project_cost">Il costo previsto per il fotovoltaico FV ammonta a
							*:
						</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.fv_project_cost"
							              name="fv_project_cost" id="fv_project_cost"></x-input-euro>
						</div>
					</div>
					<div>
						<x-label for="fv_project_cost">La spesa massima ammissibile è pari a:</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.fv_max_cost"
							              name="fv_max_cost" id="fv_max_cost"></x-input-euro>
						</div>
					</div>
					<hr>
					<div class="pl-4 space-y-5">
						<div class="flex items-center">
							<input wire:model="towed_intervention.ac"
							       id="ac"
							       name="ac" type="checkbox"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
							<label for="ac"
							       class="ml-3 block text-sm font-medium text-gray-700">AC. Sistema di accumulo</label>
						</div>
						<div class="grid grid-cols-12 gap-4 mt-3">
							<div class="col-span-12 sm:col-span-6">
								<x-input wire:model.defer="towed_intervention.ac_capacity" type="number"
								         name="ac_capacity" id="ac_capacity"
								         label="Capacità" append="KWh"></x-input>
							</div>
						</div>
						<div class="space-y-3">
							<x-label for="ac_project_cost">Il costo previsto per il sistema di accumulo AC ammonta a
								*:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.ac_project_cost"
								              name="ac_project_cost" id="ac_project_cost"/>
							</div>
							<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es.
								progettazione, direzione
								lavori, asseverazione tecnica e fiscale)</p>
						</div>
						<div>
							<x-label for="ac_max_cost">La spesa massima ammissibile è pari a:</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.ac_max_cost"
								              name="ac_max_cost" id="ac_max_cost"/>
							</div>
						</div>
					</div>
				</x-card>
				<x-card class="border p-4 rounded-md">
					<div class="flex items-center">
						<input wire:model="towed_intervention.cr"
						       id="cr"
						       name="cr" type="checkbox"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
						<label for="cr"
						       class="ml-3 block text-sm font-medium text-gray-700">CR. Infrastrutture per la ricarica
							di veicoli elettrici</label>
					</div>
					<div>
						<x-label for="cr_project_cost">Il costo previsto per le infrastrutture CR ammonta a
							*:
						</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.cr_project_cost"
							              name="cr_project_cost" id="cr_project_cost"></x-input-euro>
						</div>
					</div>
					<div>
						<div class="w-44 mb-1">
							<x-input wire:model.defer="towed_intervention.cr_installed_columns" type="number" step="1"
							         name="cr_installed_columns"
							         id="cr_installed_columns"
							         label="Numero di colonnine installate"></x-input>
						</div>
					</div>
					<div>
						<x-label for="cr_project_cost">La spesa massima ammissibile è pari a:</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.cr_max_cost"
							              name="cr_max_cost" id="cr_max_cost"></x-input-euro>
						</div>
					</div>
				</x-card>

				<x-card class="border p-4 rounded-md">
					<div class="flex items-center">
						<input wire:model="towed_intervention.eba"
						       id="eba"
						       name="eba" type="checkbox"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
						<label for="eba"
						       class="ml-3 block text-sm font-medium text-gray-700">EBA. Eliminazione delle barriere
							architettoniche</label>
					</div>
					<div>
						<x-label for="eba_project_cost">a) Il costo omnicomprensivo previsto in progetto dell'intervento
							di cui all'articolo 16-bis, comma 1, lettera e), del testo unico di cui al decreto del
							Presidente della Repubblica 22 dicembre 1986, n.917 anche ove effettuati in favore di
							persone di età superiore a sessantacinque anni è di:
						</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.eba_project_cost"
							              name="eba_project_cost" id="eba_project_cost"></x-input-euro>
						</div>
					</div>
					<div>
						<x-label for="eba_sismic_cost">b) Per le stesse unità immobiliari sono previste spese
							complessive relative ad interventi antisismici di cui al comma 4 dell'art.119 del D.L.
							34/2020 e successive modificazioni e ad altri interventi di cui all'art. 16 bis del DPR
							917/86, pari a:
						</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.eba_sismic_cost"
							              name="eba_sismic_cost" id="eba_sismic_cost"></x-input-euro>
						</div>
					</div>
					<div>
						<x-label for="eba_barr_deleting_cost">Fermo restando che la spesa massima ammissibile per tutti
							gli interventi di cui ai precedenti punti a) e b) non può superare 96.000 € per unità
							immobiliare, la spesa massima ammissibile disponibile per l'eliminazione delle barriere
							architettoniche è pertanto pari a:
						</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.eba_barr_deleting_cost"
							              name="eba_barr_deleting_cost" id="eba_barr_deleting_cost"></x-input-euro>
						</div>
					</div>
					<div>
						<x-label for="eba_project_cost">La spesa ammessa a progetto è pari a:</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.eba_max_cost"
							              name="eba_max_cost" id="eba_max_cost"></x-input-euro>
						</div>
					</div>
				</x-card>
				<div>
					<x-label>Per un ammontare pari a</x-label>
					<div class="grid grid-cols-12 gap-4">
						<div class="col-span-6 sm:col-span-3 lg:col-span-2">
							<x-label for="total_towed_cost_1">SAL n.1</x-label>
							<x-input-euro wire:model.defer="towed_intervention.total_towed_cost_1"
							              name="total_towed_cost_1" id="total_towed_cost_1"></x-input-euro>
						</div>
						<div class="col-span-6 sm:col-span-3 lg:col-span-2">
							<x-label for="total_towed_cost_2">SAL n.2</x-label>
							<x-input-euro wire:model.defer="towed_intervention.total_towed_cost_2"
							              name="total_towed_cost_2" id="total_towed_cost_2"></x-input-euro>
						</div>
						<div class="col-span-6 sm:col-span-3 lg:col-span-2">
							<x-label for="final_towed_cost">SAL F</x-label>
							<x-input-euro wire:model.defer="towed_intervention.final_towed_cost"
							              name="final_towed_cost" id="final_towed_cost"></x-input-euro>
						</div>
					</div>
				</div>
				<div>
					<x-label for="total_intervention_surface">
						La spesa ammessa è pari a:
					</x-label>
					<div class="w-44 mb-1">
						<x-input-euro wire:model.defer="towed_intervention.max_towed_cost"></x-input-euro>
					</div>
				</div>
			</div>
		</div>

		@can('update', $practice)
			<div class="flex justify-end space-x-3">
				<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
				<x-button>Salva</x-button>
			</div>
		@endcan
	</form>
</div>