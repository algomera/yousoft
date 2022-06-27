<div>
	<div class="flex items-center">
		<label for="condensing_boiler"
		       class="flex items-center space-x-3 block text-sm font-medium text-gray-700">
			<span>PC. Pompe di calore</span>
			<x-button
					wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-heat-pump', {{ json_encode(['practice' => $practice->id, 'condomino_id' => $condomino_id, 'is_common' => $is_common]) }})"
					type="button" size="sm">
				<x-icon name="plus" class="w-3 h-3 text-white"></x-icon>
			</x-button>
		</label>
	</div>
	<div class="mt-3 px-4 bg-gray-50 rounded-md">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($heat_pumps as $i => $heat_pump)
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
								<x-danger-button type="button" class="ml-2" wire:click="deleteHeatPump({{ $heat_pump->id }})"
								                 wire:loading.attr="disabled">
									Elimina
								</x-danger-button>
							</x-slot>
						</x-modal>
					</div>
					<div class="ml-3">
						<div class="flex flex-col mt-1 flex-wrap">
							@isset($heat_pump->tipo_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo sostituito:</span>
									<span>{{ $heat_pump->tipo_sostituito }}</span>
								</p>
							@endisset
							@isset($heat_pump->p_nom_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">P. nom. sostituito:</span>
									<span>{{ $heat_pump->p_nom_sostituito }} kW</span>
								</p>
							@endisset
							@isset($heat_pump->tipo_di_pdc)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo di PDC:</span>
									<span>{{ $heat_pump->tipo_di_pdc }}</span>
								</p>
							@endisset
							@isset($heat_pump->potenza_nominale)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Potenza nominale:</span>
									<span>{{ $heat_pump->potenza_nominale }} kW</span>
								</p>
							@endisset
							@isset($heat_pump->p_elettrica_assorbita)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Potenza elettr. assorbita:</span>
									<span>{{ $heat_pump->p_elettrica_assorbita }} kW</span>
								</p>
							@endisset
							@isset($heat_pump->cop)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">COP:</span>
									<span>{{ $heat_pump->cop }}</span>
								</p>
							@endisset
							@isset($heat_pump->sup_riscaldata_dalla_pdc)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Sup. riscaldata dalla PDC:</span>
									<span>{{ $heat_pump->sup_riscaldata_dalla_pdc }} m²</span>
								</p>
							@endisset
							@isset($heat_pump->tipo_roof_top)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo Roof Top:</span>
									<span>{{ $heat_pump->tipo_roof_top ? 'Si' : 'No' }}</span>
								</p>
							@endisset
							@isset($heat_pump->sonde_geotermiche)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Sonde geotermiche:</span>
									<span>{{ $heat_pump->sonde_geotermiche ? 'Si' : 'No' }}</span>
								</p>
							@endisset
							@isset($heat_pump->inverter)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Inverter:</span>
									<span>{{ $heat_pump->inverter ? 'Si' : 'No' }}</span>
								</p>
							@endisset
							@isset($heat_pump->reversibile)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Reversibile:</span>
									<span>{{ $heat_pump->reversibile ? 'Si' : 'No' }}</span>
								</p>
							@endisset
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">
					Nessuna pompa di calore inserita
				</li>
			@endforelse
		</ul>
	</div>
</div>