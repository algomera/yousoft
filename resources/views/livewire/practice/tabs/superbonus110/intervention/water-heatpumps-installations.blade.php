<div>
	<div class="flex flex-col items-start">
		<label for="condensing_boiler"
		       class="flex items-center space-x-3 block text-sm font-medium text-gray-700">
			<span>SA. Installazione di scaldacqua a pompa di calore</span>
			<x-button
					wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-water-heatpump-installation', {{ json_encode(['practice' => $practice->id, 'condomino_id' => $condomino_id, 'is_common' => $is_common]) }})"
					type="button" size="sm">
				<x-icon name="plus" class="w-3 h-3 text-white"></x-icon>
			</x-button>
		</label>
		<p class="text-xs text-gray-500 mt-1">In sostituzione di un sistema di produzione di acqua calda quando avviene con lo stesso generatore di calore destinato alla climatizzazione invernale ai sensi delle lettre b) e c) del comma 1 dell’articolo 119 del Decreto Rilancio</p>
	</div>
	<div class="mt-3 px-4 bg-gray-50 rounded-md">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($water_heatpumps_installations as $i => $water_heatpumps_installation)
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
								<x-danger-button type="button" class="ml-2" wire:click="deleteWaterHeatpumpsInstallation({{ $condensing_boiler->id }})"
								                 wire:loading.attr="disabled">
									Elimina
								</x-danger-button>
							</x-slot>
						</x-modal>
					</div>
					<div class="ml-3">
						<div class="flex flex-col mt-1 flex-wrap">
							@isset($water_heatpumps_installation->tipo_scaldacqua_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo scaldacqua sostituito:</span>
									<span>{{ $water_heatpumps_installation->tipo_scaldacqua_sostituito }}</span>
								</p>
							@endisset
							@isset($water_heatpumps_installation->pu_scaldacqua_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Pu scaldacqua sostituito:</span>
									<span>{{ $water_heatpumps_installation->pu_scaldacqua_sostituito }} kW</span>
								</p>
							@endisset
							@isset($water_heatpumps_installation->pu_scaldacqua_a_pdc)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Pu scaldacqua a PDC:</span>
									<span>{{ $water_heatpumps_installation->pu_scaldacqua_a_pdc }} kW</span>
								</p>
							@endisset
							@isset($water_heatpumps_installation->cop_nuovo_scaldacqua)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">COP del nuovo scaldacqua:</span>
									<span>{{ $water_heatpumps_installation->cop_nuovo_scaldacqua }}</span>
								</p>
							@endisset
							@isset($water_heatpumps_installation->capacita_accumulo)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Capacità accumulo:</span>
									<span>{{ $water_heatpumps_installation->capacita_accumulo }} L</span>
								</p>
							@endisset
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">
					Nessun scaldacqua inserito
				</li>
			@endforelse
		</ul>
	</div>
</div>