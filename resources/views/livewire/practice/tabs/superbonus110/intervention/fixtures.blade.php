<div>
	<div class="flex items-center">
		<label for="condensing_boiler"
		       class="flex items-center space-x-3 block text-sm font-medium text-gray-700">
			<span>IN. Sostituzione degli infissi</span>
			@can('update', $practice)
				<x-button
						wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-fixture', {{ json_encode(['practice' => $practice->id, 'condomino_id' => $condomino_id, 'is_common' => $is_common]) }})"
						type="button" size="sm">
					<x-icon name="plus" class="w-3 h-3 text-white"></x-icon>
				</x-button>
			@endcan
		</label>
	</div>
	<div class="mt-3 px-4 bg-gray-50 rounded-md">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($fixtures as $i => $fixture)
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
								                 wire:click="deleteFixture({{ $fixture->id }})"
								                 wire:loading.attr="disabled">
									Elimina
								</x-danger-button>
							</x-slot>
						</x-modal>
					</div>
					<div class="ml-3">
						<div class="flex flex-col mt-1 flex-wrap">
							@isset($fixture->description)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Descrizione:</span>
									<span>{{ $fixture->description }}</span>
								</p>
							@endisset
							@isset($fixture->superficie)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Superficie:</span>
									<span>{{ $fixture->superficie }} m²</span>
								</p>
							@endisset
							@isset($fixture->trasm_ante)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Trasm. Ante:</span>
									<span>{{ $fixture->trasm_ante }} W/m²k</span>
								</p>
							@endisset
							@isset($fixture->trasm_post)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Trasm. Post:</span>
									<span>{{ $fixture->trasm_post }} W/m²k</span>
								</p>
							@endisset
							@isset($fixture->telaio_prima)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Telaio prima:</span>
									<span>{{ $fixture->telaio_prima }}</span>
								</p>
							@endisset
							@isset($fixture->vetro_prima)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Vetro Prima:</span>
									<span>{{ $fixture->vetro_prima }}</span>
								</p>
							@endisset
							@isset($fixture->telaio_dopo)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Telaio dopo:</span>
									<span>{{ $fixture->telaio_dopo }}</span>
								</p>
							@endisset
							@isset($fixture->vetro_dopo)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Vetro Prima:</span>
									<span>{{ $fixture->vetro_dopo }}</span>
								</p>
							@endisset
							@isset($fixture->oscurante)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Oscurante:</span>
									<span>{{ $fixture->oscurante }}</span>
								</p>
							@endisset
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">
					Nessuna infisso inserito
				</li>
			@endforelse
		</ul>
	</div>
</div>