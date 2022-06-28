<div>
	<div class="flex items-center">
		<label for="condensing_boiler"
		       class="flex items-center space-x-3 block text-sm font-medium text-gray-700">
			<span class="font-bold">Tipo e numero di generatori presenti prima dell'intervento</span>
			<x-button
					wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.final-state.modals.add-generator', {{ json_encode(['practice' => $practice->id]) }})"
					type="button" size="sm">
				<x-icon name="plus" class="w-3 h-3 text-white"></x-icon>
			</x-button>
		</label>
	</div>
	<div class="mt-3 px-4 bg-gray-50 rounded-md">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($generators as $i => $generator)
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
							Sei sicuro di voler eliminare il generatore?
							<x-slot name="footer">
								<x-link-button x-on:click="open = false">Annulla</x-link-button>
								<x-danger-button type="button" class="ml-2" wire:click="deleteGenerator({{ $generator->id }})"
								                 wire:loading.attr="disabled">
									Elimina
								</x-danger-button>
							</x-slot>
						</x-modal>
					</div>
					<div class="ml-3">
						<div class="flex flex-col mt-1 flex-wrap">
							@isset($generator->generator_type)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo:</span>
									<span>{{ $generator->generator_type }}</span>
								</p>
							@endisset
							@isset($generator->generator_number)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">N° di generatori:</span>
									<span>{{ $generator->generator_number }}</span>
								</p>
							@endisset
							@isset($generator->performance_percentage)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Rendimento al 100% della potenza:</span>
									<span>{{ $generator->performance_percentage }} %</span>
								</p>
							@endisset
							@isset($generator->useful_power)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Potenza utile nominale complessiva:</span>
									<span>{{ $generator->useful_power }} kW</span>
								</p>
							@endisset
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">
					Nessuna generatore inserito
				</li>
			@endforelse
		</ul>
	</div>
</div>