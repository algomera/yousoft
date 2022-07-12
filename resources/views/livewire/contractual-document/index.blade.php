<x-slot name="header">
	<x-page-header>
		Documenti Contrattuali
	</x-page-header>
</x-slot>
<x-card>
	@if($this->selected !== auth()->user()->id)
		<div>
			<div class="sm:hidden">
				<label for="tabs" class="sr-only">Select a tab</label>
				<select wire:model="selected" wire:ignore id="tabs" name="tabs"
				        class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
					@foreach($tabs as $k => $tab)
						<option @if($tab === $k) selected
						        @endif value="{{ $tab->id }}">{{ $tab->user_data->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="hidden sm:block">
				<nav class="flex space-x-4" aria-label="Tabs">
					@foreach($tabs as $tab)
						<span wire:click="$set('selected', {{ $tab->id }})"
						      class="{{ $tab->id === (int)$this->selected ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:text-gray-700' }} px-3 py-2 font-medium text-sm rounded-md cursor-pointer">{{ $tab->user_data->name }}</span>
					@endforeach
				</nav>
			</div>
		</div>
	@endif
	<x-table.table>
		<x-table.thead>
			<tr>
				<x-table.th>#</x-table.th>
				<x-table.th>Documento</x-table.th>
				<x-table.th>Stato</x-table.th>
				<x-table.th></x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@forelse($contractual_document as $document)
				<tr wire:key="{{ $loop->index }}">
					<x-table.td>{{ $loop->index + 1 }}</x-table.td>
					<x-table.td class="w-full">{{ $document->name }}</x-table.td>
					<x-table.td class="min-w-[200px]">
						@if($document->uploaded_path)
							<span class="inline-flex rounded-full bg-green-100 text-green-800 px-2 text-xs font-semibold leading-5">
								Caricato
							</span>
						@else
							<span class="inline-flex rounded-full bg-red-100 text-red-800 px-2 text-xs font-semibold leading-5">
								Da caricare
							</span>
						@endif
					</x-table.td>
					<x-table.td>
						<div class="flex items-center space-x-5">
							@can('download', $document)
								<x-button wire:click="download({{ $document }})" size="xs"
								          :disabled="!$document->uploaded_path">
									<x-icon name="download" class="w-4 h-4 text-white"></x-icon>
								</x-button>
							@endcan
							@can(['upload_contractual_documents', 'delete_contractual_documents'])
								<div class="flex items-center space-x-5">
									@if(!$document->uploaded_path)
										@can('upload', $document)
											@isset($uploaded_contractual_document[$contractual_document[$loop->index]->id])
												@if($uploaded_contractual_document[$contractual_document[$loop->index]->id])
													<x-button type="button"
													          wire:click="upload({{ $contractual_document[$loop->index]->id }})"
													          size="xs"
													          class="!bg-green-600 hover:!bg-green-700 focus:ring-green-500">
														<x-icon name="upload" class="w-4 h-4 text-white"></x-icon>
													</x-button>
												@endif
											@else
												<label class="inline-flex items-center border border-transparent font-medium shadow-sm text-white @if($contractual_document[$loop->index]->uploaded_path) bg-green-600 hover:bg-green-700 focus:ring-green-500 @else bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 @endif focus:outline-none focus:ring-2 focus:ring-offset-2 px-2.5 py-1.5 text-xs rounded cursor-pointer disabled:opacity-25 transition">
													<input wire:model="uploaded_contractual_document.{{$contractual_document[$loop->index]->id}}"
													       type="file" name="contractual_document"
													       id="contractual_document"
													       class="sr-only"/>
													<x-icon wire:loading.remove
													        wire:target="uploaded_contractual_document.{{$contractual_document[$loop->index]->id}}"
													        name="upload" class="w-4 h-4 text-white"></x-icon>
													<x-icon wire:loading
													        wire:target="uploaded_contractual_document.{{$contractual_document[$loop->index]->id}}"
													        name="loading"
													        class="w-4 h-4 text-white"></x-icon>
												</label>
											@endisset
										@endcan
									@else
										@can('delete', $document)
											<x-danger-button type="button"
											                 wire:click="delete({{ $contractual_document[$loop->index]->id }})"
											                 size="xs">
												<x-icon name="trash" class="w-4 h-4 text-white"></x-icon>
											</x-danger-button>
										@endcan
									@endif
								</div>
							@endcan
						</div>
					</x-table.td>
				</tr>
			@empty
				<tr>
					<x-table.td colspan="10" class="text-center">Nessun documento contrattuale inserito</x-table.td>
				</tr>
			@endforelse
		</x-table.tbody>
	</x-table.table>
</x-card>

@push('notifications')
	<x-notification/>
@endpush