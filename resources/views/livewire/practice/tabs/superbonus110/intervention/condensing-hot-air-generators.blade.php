<div>
	<div class="flex items-center">
		<label for="condensing_boiler"
		       class="flex items-center space-x-3 block text-sm font-medium text-gray-700">
			<span>GA. Generatori di aria calda a condensazione</span>
			<x-button
					wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-condensing-hot-air-generator', {{ json_encode(['practice' => $practice->id, 'condomino_id' => $condomino_id, 'is_common' => $is_common]) }})"
					type="button" size="sm">
				<x-icon name="plus" class="w-3 h-3 text-white"></x-icon>
			</x-button>
		</label>
	</div>
	<div class="mt-3 px-4 bg-gray-50 rounded-md">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($condensing_hot_air_generators as $i => $condensing_hot_air_generator)
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
								                 wire:click="deleteCondensingHotAirGenerator({{ $condensing_hot_air_generator->id }})"
								                 wire:loading.attr="disabled">
									Elimina
								</x-danger-button>
							</x-slot>
						</x-modal>
					</div>
					<div class="ml-3">
						<div class="flex flex-col mt-1 flex-wrap">
							@isset($condensing_hot_air_generator->tipo_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo sostituito:</span>
									<span>{{ $condensing_hot_air_generator->tipo_sostituito }}</span>
								</p>
							@endisset
							@isset($condensing_hot_air_generator->p_nom_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">P. nom. sostituito:</span>
									<span>{{ $condensing_hot_air_generator->p_nom_sostituito }} kW</span>
								</p>
							@endisset
							@isset($condensing_hot_air_generator->potenza_nominale)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Potenza nominale:</span>
									<span>{{ $condensing_hot_air_generator->potenza_nominale }} kW</span>
								</p>
							@endisset
							@isset($condensing_hot_air_generator->rend_utile_nom)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Rend. utile nom.:</span>
									<span>{{ $condensing_hot_air_generator->rend_utile_nom }} %</span>
								</p>
							@endisset
							@isset($condensing_hot_air_generator->tipo_di_alimentazione)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo di alimentazione:</span>
									<span>{{ $condensing_hot_air_generator->tipo_di_alimentazione }}</span>
								</p>
							@endisset
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">
					Nessun generatore di aria calda inserito
				</li>
			@endforelse
		</ul>
	</div>
</div>