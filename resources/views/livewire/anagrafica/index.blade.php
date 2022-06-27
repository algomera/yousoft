<x-slot name="header">
	<x-page-header>
		Anagrafiche
		<x-slot name="actions">
			<x-button prepend="plus" iconColor="text-white"
			          x-on:click="Livewire.emit('openModal', 'anagrafica.create')">
				Aggiungi
			</x-button>
		</x-slot>
	</x-page-header>
</x-slot>
<x-card>
	<x-table.table>
		<x-table.thead>
			<tr>
				<x-table.th>Categoria</x-table.th>
				<x-table.th>Ragione Sociale</x-table.th>
				<x-table.th>Nome</x-table.th>
				<x-table.th>Cognome</x-table.th>
				<x-table.th>Ruoli</x-table.th>
				<x-table.th></x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@forelse ($anagrafiche as $anagrafica)
				<tr wire:key="{{ $loop->index }}">
					<x-table.td>{{$anagrafica->subject_type}}</x-table.td>
					<x-table.td>{{$anagrafica->company_name}}</x-table.td>
					<x-table.td>{{$anagrafica->first_name}}</x-table.td>
					<x-table.td>{{$anagrafica->last_name}}</x-table.td>
					<x-table.td>
						<div class="flex space-x-1">
							@foreach($anagrafica->roles as $role)
								<div class="flex-shrink-0 border border-gray-900 h-4 w-4 rounded-full"
								     style="background: {{ $role->color }}" x-tooltip.raw="{{ $role->name }}"></div>
							@endforeach
						</div>
					</x-table.td>
					<x-table.td>
						<div class="flex items-center space-x-3">
							<x-icon name="eye" class="w-5 h-5 text-indigo-500 flex-shrink-0"
							        wire:click="$emit('openModal', 'anagrafica.show', {{ json_encode([$anagrafica->id]) }})"></x-icon>
							<x-icon name="pencil-alt" class="w-5 h-5 text-indigo-500 flex-shrink-0"
							        wire:click="$emit('openModal', 'anagrafica.edit', {{ json_encode([$anagrafica->id]) }})"></x-icon>
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