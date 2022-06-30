<x-slot name="header">
	<x-page-header>
		Gestione File e Cartelle
		<x-slot name="actions">
			<x-button prepend="plus" iconColor="text-white"
			          x-on:click="Livewire.emit('openModal', 'folder-file-management.create-folder')">
				Aggiungi Cartella
			</x-button>
		</x-slot>
	</x-page-header>
</x-slot>
<x-card>
	<x-table.table>
		<x-table.thead>
			<tr>
				<x-table.th>Nome Cartella</x-table.th>
				<x-table.th>Data di creazione</x-table.th>
				<x-table.th>Tipologia</x-table.th>
				<x-table.th>Utente</x-table.th>
				<x-table.th></x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@forelse ($folders as $folder)
				<tr wire:key="{{ $loop->index }}">
					<x-table.td>{{$folder->name}}</x-table.td>
					<x-table.td>{{$folder->created_at->format('d/m/Y')}}</x-table.td>
					<x-table.td>{{$folder->type}}</x-table.td>
					<x-table.td>{{$folder->user->user_data->name}}</x-table.td>
					<x-table.td>
						<div class="flex items-center space-x-3">
							<x-icon name="eye" class="w-5 h-5 text-indigo-500 flex-shrink-0"
							        wire:click="$emit('openModal', 'folder-file-management.show', {{ json_encode([$folder->id]) }})"></x-icon>
							<x-icon name="pencil-alt" class="w-5 h-5 text-indigo-500 flex-shrink-0"
							        wire:click="$emit('openModal', 'folder-file-management.edit-folder', {{ json_encode([$folder->id]) }})"></x-icon>
							<x-modal>
								<x-slot name="trigger">
									<div class="text-red-600 hover:text-red-900">
										<x-icon name="trash" class="w-5 h-5"></x-icon>
									</div>
								</x-slot>
								<x-slot name="title">
									Conferma eliminazione
								</x-slot>
								Sei sicuro di voler eliminare la cartella "{{ $folder->name }}"?
								<x-slot name="footer">
									<x-link-button x-on:click="open = false">Annulla</x-link-button>
									<x-danger-button class="ml-2" wire:click="deleteFolder({{ $folder->id }})"
									                 wire:loading.attr="disabled">
										Elimina
									</x-danger-button>
								</x-slot>
							</x-modal>
						</div>
					</x-table.td>
				</tr>
			@empty
				<tr>
					<x-table.td colspan="10" class="text-center text-gray-500 py-4">Nessun risultato</x-table.td>
				</tr>
			@endforelse
		</x-table.tbody>
	</x-table.table>
</x-card>

@push('notifications')
	<x-notification/>
@endpush