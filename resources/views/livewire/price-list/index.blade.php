<x-slot name="header">
	<x-page-header>
		Prezzari DEI
		@can('create_price_lists')
			<x-slot name="actions">
				<x-button prepend="plus" iconColor="text-white"
				          x-on:click="Livewire.emit('openModal', 'price-list.create')">
					Nuovo
				</x-button>
			</x-slot>
	</x-page-header>
	@endcan
</x-slot>
<x-card>
	<p class="text-blue-400 italic text-sm">Per ogni prezzario, carica TUTTI documenti in una sola volta</p>
	<x-table.table>
		<x-table.thead>
			<tr>
				<x-table.th>#</x-table.th>
				<x-table.th>Nome</x-table.th>
				<x-table.th></x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@forelse($price_lists as $price_list)
				<tr wire:key="{{ $loop->index }}">
					<x-table.td>{{ $loop->index + 1 }}</x-table.td>
					<x-table.td class="w-full">{{ $price_list->name }}</x-table.td>
					<x-table.td>
						<div class="flex items-center space-x-5">
							@can(['upload_price_lists', 'delete_price_lists'])
								@if($price_list->price_row->count() === 0)
									@can('upload_price_lists')
										@isset($uploaded_price_lists[$price_lists[$loop->index]->id])
											@if($uploaded_price_lists[$price_lists[$loop->index]->id])
												<x-button type="button"
												          wire:click="upload({{ $price_lists[$loop->index]->id }})"
												          size="xs"
												          class="!bg-green-600 hover:!bg-green-700 focus:ring-green-500">
													<x-icon name="upload" class="w-4 h-4 text-white"></x-icon>
												</x-button>
											@endif
										@else
											<label class="inline-flex items-center border border-transparent font-medium shadow-sm text-white @if($price_lists[$loop->index]->uploaded_path) bg-green-600 hover:bg-green-700 focus:ring-green-500 @else bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 @endif focus:outline-none focus:ring-2 focus:ring-offset-2 px-2.5 py-1.5 text-xs rounded cursor-pointer disabled:opacity-25 transition">
												<input wire:model="uploaded_price_lists.{{$price_lists[$loop->index]->id}}"
												       type="file" name="price_list"
												       multiple
												       id="price_list"
												       class="sr-only"/>
												<x-icon wire:loading.remove
												        wire:target="uploaded_price_lists.{{$price_lists[$loop->index]->id}}"
												        name="upload" class="w-4 h-4 text-white"></x-icon>
												<x-icon wire:loading
												        wire:target="uploaded_price_lists.{{$price_lists[$loop->index]->id}}"
												        name="loading"
												        class="w-4 h-4 text-white"></x-icon>
											</label>
										@endisset
									@endcan
								@else
									@can('delete_price_lists')

										<x-modal type="warning">
											<x-slot name="trigger">
												<x-danger-button type="button" size="xs">
													<x-icon name="trash" class="w-4 h-4 text-white"></x-icon>
												</x-danger-button>
											</x-slot>
											<x-slot name="title">
												Conferma eliminazione
											</x-slot>
											<div>
												<p>Sei sicuro di voler eliminare il prezzario?</p>
												<strong>Il prezzario e le voci collegate presenti nelle pratiche saranno eliminate definitivamente!</strong>
											</div>
											<x-slot name="footer">
												<x-link-button x-on:click="open = false">Annulla</x-link-button>
												<x-danger-button class="ml-2"
												                 wire:click="delete({{ $price_lists[$loop->index]->id }})"
												                 wire:loading.attr="disabled">
													Elimina definitivamente
												</x-danger-button>
											</x-slot>
										</x-modal>
									@endcan
								@endif
						</div>
						@endcan
						</div>
					</x-table.td>
				</tr>
			@empty
				<tr>
					<x-table.td colspan="10" class="text-center">Nessun prezzario inserito</x-table.td>
				</tr>
			@endforelse
		</x-table.tbody>
	</x-table.table>
</x-card>

@push('notifications')
	<x-notification/>
@endpush