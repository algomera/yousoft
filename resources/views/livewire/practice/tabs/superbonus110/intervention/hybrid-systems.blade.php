<div>
	<div class="flex items-center">
		<label for="condensing_boiler"
		       class="flex items-center space-x-3 block text-sm font-medium text-gray-700">
			<span>SI. Sistemi ibridi</span>
			@can('update', $practice)
				<x-button
						wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-hybrid-system', {{ json_encode(['practice' => $practice->id, 'condomino_id' => $condomino_id, 'is_common' => $is_common]) }})"
						type="button" size="sm">
					<x-icon name="plus" class="w-3 h-3 text-white"></x-icon>
				</x-button>
			@endcan
		</label>
	</div>
	<div class="mt-3 px-4 bg-gray-50 rounded-md">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($hybrid_systems as $i => $hybrid_system)
				<li class="py-4 flex">
					<div class="flex flex-col items-center space-y-3">
						<div class="flex items-center justify-center text-sm bg-gray-50 border border-gray-200 font-semibold h-8 w-8 rounded-full flex-shrink-0">
							{{ $i + 1 }}
						</div>
						<x-modal>
							<x-slot name="trigger">
								<div class="text-red-600 hover:text-red-900">
									<x-icon name="trash" class="w-5 h-5"></x-icon>
								</div>
							</x-slot>
							<x-slot name="title">
								Conferma eliminazione
							</x-slot>
							Sei sicuro di voler eliminare l'intervento?
							<x-slot name="footer">
								<x-link-button x-on:click="open = false">Annulla</x-link-button>
								<x-danger-button type="button" class="ml-2"
								                 wire:click="deleteHybridSystem({{ $hybrid_system->id }})"
								                 wire:loading.attr="disabled">
									Elimina
								</x-danger-button>
							</x-slot>
						</x-modal>
					</div>
					<div class="ml-3">
						<div class="flex flex-col mt-1 flex-wrap">
							@isset($hybrid_system->tipo_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo sostituito:</span>
									<span>{{ $hybrid_system->tipo_sostituito }}</span>
								</p>
							@endisset
							@isset($hybrid_system->p_nom_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">P. nom. sostituito:</span>
									<span>{{ $hybrid_system->p_nom_sostituito }} kW</span>
								</p>
							@endisset
							@isset($hybrid_system->tipo_di_alimentazione)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo di alimentazione:</span>
									<span>{{ $hybrid_system->tipo_di_alimentazione }}</span>
								</p>
							@endisset
							@isset($hybrid_system->condensing_potenza_nominale)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">(CC) Potenza nominale:</span>
									<span>{{ $hybrid_system->condensing_potenza_nominale }} kW</span>
								</p>
							@endisset
							@isset($hybrid_system->condensing_rend_utile_nom)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">(CC) Rend. utile nom.:</span>
									<span>{{ $hybrid_system->condensing_rend_utile_nom }} %</span>
								</p>
							@endisset
							@isset($hybrid_system->condensing_efficienza_ns)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">(CC) Efficienza ns:</span>
									<span>{{ $hybrid_system->condensing_efficienza_ns }} %</span>
								</p>
							@endisset
							@isset($hybrid_system->heat_tipo_di_pdc)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">(PC) Tipo di PDC:</span>
									<span>{{ $hybrid_system->heat_tipo_di_pdc }}</span>
								</p>
							@endisset
							@isset($hybrid_system->heat_potenza_nominale)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">(PC) Potenza nominale:</span>
									<span>{{ $hybrid_system->heat_potenza_nominale }} kW</span>
								</p>
							@endisset
							@isset($hybrid_system->heat_p_elettrica_assorbita)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">(PC) Potenza elettrica assorbita:</span>
									<span>{{ $hybrid_system->heat_p_elettrica_assorbita }} kW</span>
								</p>
							@endisset
							@isset($hybrid_system->heat_tipo_roof_top)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">(PC) Tipo Roof Top:</span>
									<span>{{ $hybrid_system->heat_tipo_roof_top ? 'Si' : 'No' }}</span>
								</p>
							@endisset
							@isset($hybrid_system->heat_sonde_geotermiche)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">(PC) Sonde geotermiche:</span>
									<span>{{ $hybrid_system->heat_sonde_geotermiche ? 'Si' : 'No' }}</span>
								</p>
							@endisset
							@isset($hybrid_system->heat_inverter)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">(PC) Inverter:</span>
									<span>{{ $hybrid_system->heat_inverter ? 'Si' : 'No' }}</span>
								</p>
							@endisset
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">
					Nessun sistema ibrido inserito
				</li>
			@endforelse
		</ul>
	</div>
</div>