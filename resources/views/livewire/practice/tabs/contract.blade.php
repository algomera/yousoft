<x-card>
	<p class="text-blue-400 italic text-sm">Scarica i documenti necessari, compilali e caricali</p>
	<x-table.table>
		<x-table.thead>
			<tr>
				<x-table.th>#</x-table.th>
				<x-table.th>Contratto</x-table.th>
				<x-table.th>Stato</x-table.th>
				<x-table.th></x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@forelse($practice->contracts as $contract)
				<tr wire:key="{{ $loop->index }}">
					<x-table.td>{{ $loop->index + 1 }}</x-table.td>
					<x-table.td class="w-full">{{ $contract->name }}</x-table.td>
					<x-table.td class="min-w-[200px]">
						@if($contract->uploaded_path)
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
							@can('download-contract', $practice)
								<x-button wire:click="download({{ $contract }})" size="xs"
								          :disabled="!$contract->path">
									<x-icon name="download" class="w-4 h-4 text-white"></x-icon>
								</x-button>
							@endcan
							<div class="flex items-center space-x-5">
								@if(!$contract->uploaded_path)
									@can('download-contract', $practice)
										@isset($uploaded_contract[$file_contract[$loop->index]->id])
											@if($uploaded_contract[$file_contract[$loop->index]->id])
												<x-button type="button"
												          wire:click="upload({{ $file_contract[$loop->index]->id }})"
												          size="xs"
												          class="!bg-green-600 hover:!bg-green-700 focus:ring-green-500">
													<x-icon name="upload" class="w-4 h-4 text-white"></x-icon>
												</x-button>
											@endif
										@else
											<label class="inline-flex items-center border border-transparent font-medium shadow-sm text-white @if($file_contract[$loop->index]->uploaded_path) bg-green-600 hover:bg-green-700 focus:ring-green-500 @else bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 @endif focus:outline-none focus:ring-2 focus:ring-offset-2 px-2.5 py-1.5 text-xs rounded cursor-pointer disabled:opacity-25 transition">
												<input wire:model="uploaded_contract.{{$file_contract[$loop->index]->id}}"
												       type="file" name="file_contract"
												       id="file_contract"
												       class="sr-only"/>
												<x-icon wire:loading.remove
												        wire:target="uploaded_contract.{{$file_contract[$loop->index]->id}}"
												        name="upload" class="w-4 h-4 text-white"></x-icon>
												<x-icon wire:loading
												        wire:target="uploaded_contract.{{$file_contract[$loop->index]->id}}"
												        name="loading"
												        class="w-4 h-4 text-white"></x-icon>
											</label>
										@endisset
									@endcan
								@else
									@can('delete-contract', $practice)
										<x-danger-button type="button"
										                 wire:click="delete({{ $file_contract[$loop->index]->id }})"
										                 size="xs">
											<x-icon name="trash" class="w-4 h-4 text-white"></x-icon>
										</x-danger-button>
									@endcan
								@endif
							</div>
						</div>
					</x-table.td>
				</tr>
			@empty
				<tr>
					<x-table.td colspan="10" class="text-center">Nessun contratto inserito</x-table.td>
				</tr>
			@endforelse
		</x-table.tbody>
	</x-table.table>
</x-card>