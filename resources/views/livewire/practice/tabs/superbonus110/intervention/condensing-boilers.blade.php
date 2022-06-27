<div>
	<div class="flex items-center">
		<label for="condensing_boiler"
		       class="flex items-center space-x-3 block text-sm font-medium text-gray-700">
			<span>CC. Caldaie a condensazione</span>
			<x-button
					wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-condensing-boiler', {{ json_encode(['practice' => $practice->id, 'condomino_id' => $condomino_id, 'is_common' => $is_common]) }})"
					type="button" size="sm">
				<x-icon name="plus" class="w-3 h-3 text-white"></x-icon>
			</x-button>
		</label>
	</div>
	<div class="mt-3 px-4 bg-gray-50 rounded-md">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($condensing_boilers as $i => $condensing_boiler)
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
								<x-danger-button type="button" class="ml-2" wire:click="deleteCondensingBoiler({{ $condensing_boiler->id }})"
								                 wire:loading.attr="disabled">
									Elimina
								</x-danger-button>
							</x-slot>
						</x-modal>
					</div>
					<div class="ml-3">
						<div class="flex flex-col mt-1 flex-wrap">
							@isset($condensing_boiler->tipo_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo sostituito:</span>
									<span>{{ $condensing_boiler->tipo_sostituito }}</span>
								</p>
							@endisset
							@isset($condensing_boiler->p_nom_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">P. nom. sostituito:</span>
									<span>{{ $condensing_boiler->p_nom_sostituito }} kW</span>
								</p>
							@endisset
							@isset($condensing_boiler->potenza_nominale)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Potenza nominale:</span>
									<span>{{ $condensing_boiler->potenza_nominale }} kW</span>
								</p>
							@endisset
							@isset($condensing_boiler->rend_utile_nom)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Rend. utile nom.:</span>
									<span>{{ $condensing_boiler->rend_utile_nom }} %</span>
								</p>
							@endisset
							@isset($condensing_boiler->use_destination)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Destinazione d'uso:</span>
									<span>{{ $condensing_boiler->use_destination }}</span>
								</p>
							@endisset
							@isset($condensing_boiler->efficienza_ns)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Efficienza ns:</span>
									<span>{{ $condensing_boiler->efficienza_ns }} %</span>
								</p>
							@endisset
							@isset($condensing_boiler->efficienza_acs_nwh)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Efficienza ACS nwh:</span>
									<span>{{ $condensing_boiler->efficienza_acs_nwh }} %</span>
								</p>
							@endisset
							@isset($condensing_boiler->tipo_di_alimentazione)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo di alimentazione:</span>
									<span>{{ $condensing_boiler->tipo_di_alimentazione }}</span>
								</p>
							@endisset
							@isset($condensing_boiler->classe_termo_evoluto)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Classe disp. termoregolazione evoluto:</span>
									<span>{{ $condensing_boiler->classe_termo_evoluto }}</span>
								</p>
							@endisset
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">
					Nessuna caldaia inserita
				</li>
			@endforelse
		</ul>
	</div>
</div>