<x-card class="border rounded-md !space-y-0">
	<x-page-header class="!border-b-0">
		{{ $condomino->fullname }}
		<x-slot name="subtitle">
			<div class="flex items-center space-x-2 mt-1">
				<p class="text-sm text-gray-500">
					<span class="font-bold">Codice Fiscale:</span>
					<span class="uppercase">{{ $condomino->cf }}</span>
				</p>
				<span class="text-gray-500">&middot;</span>
				<p class="text-sm text-gray-500">
					<span class="font-bold">Telefono:</span>
					<span>{{ $condomino->phone }}</span>
				</p>
				<span class="text-gray-500">&middot;</span>
				<p class="text-sm text-gray-500">
					<span class="font-bold">Email:</span>
					<span>{{ $condomino->email }}</span>
				</p>
			</div>
		</x-slot>
		<x-slot name="actions">
			<div class="flex items-center space-x-3">
				<x-button
						wire:click="$emit('openModal', 'modals.condomino.edit', {{ json_encode([$condomino]) }})"
						type="button" size="xs">
					<x-icon name="pencil-alt" class="w-4 h-4 text-white"></x-icon>
				</x-button>
				<x-modal>
					<x-slot name="trigger">
						<x-danger-button type="button" size="xs">
							<x-icon name="trash" class="w-4 h-4 text-white"></x-icon>
						</x-danger-button>
					</x-slot>
					<x-slot name="title">
						Conferma eliminazione
					</x-slot>
					Sei sicuro di voler eliminare il condomino {{ $condomino->fullname }}?
					<x-slot name="footer">
						<x-link-button x-on:click="open = false">Annulla</x-link-button>
						<x-danger-button class="ml-2" wire:click="deleteCondomino"
						                 wire:loading.attr="disabled">
							Elimina
						</x-danger-button>
					</x-slot>
				</x-modal>
			</div>
		</x-slot>
	</x-page-header>
</x-card>