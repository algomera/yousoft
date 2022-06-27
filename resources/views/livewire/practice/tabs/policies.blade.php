<x-card>
	<p class="text-blue-400 italic text-sm">Scarica i documenti necessari, compilali e caricali</p>
	<x-table.table>
		<x-table.thead>
			<tr>
				<x-table.th>#</x-table.th>
				<x-table.th>Polizza</x-table.th>
				<x-table.th>Stato</x-table.th>
				<x-table.th></x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@forelse($practice->policies as $policy)
				<tr wire:key="{{ $loop->index }}">
					<x-table.td>{{ $loop->index + 1 }}</x-table.td>
					<x-table.td class="w-full">{{ $policy->name }}</x-table.td>
					<x-table.td class="min-w-[200px]">
						@if($policy->uploaded_path)
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
							<x-button wire:click="download({{ $policy }})" size="xs"
							          :disabled="!$policy->path">
								<x-icon name="download" class="w-4 h-4 text-white"></x-icon>
							</x-button>
							<div class="flex items-center space-x-5">
								@if(!$policy->uploaded_path)
									@isset($uploaded_policy[$file_policy[$loop->index]->id])
										@if($uploaded_policy[$file_policy[$loop->index]->id])
											<x-button type="button"
											          wire:click="upload({{ $file_policy[$loop->index]->id }})"
											          size="xs"
											          class="!bg-green-600 hover:!bg-green-700 focus:ring-green-500">
												<x-icon name="upload" class="w-4 h-4 text-white"></x-icon>
											</x-button>
										@endif
									@else
										<label class="inline-flex items-center border border-transparent font-medium shadow-sm text-white @if($file_policy[$loop->index]->uploaded_path) bg-green-600 hover:bg-green-700 focus:ring-green-500 @else bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 @endif focus:outline-none focus:ring-2 focus:ring-offset-2 px-2.5 py-1.5 text-xs rounded cursor-pointer disabled:opacity-25 transition">
											<input wire:model="uploaded_policy.{{$file_policy[$loop->index]->id}}"
											       type="file" name="file_policy"
											       id="file_policy"
											       class="sr-only"/>
											<x-icon wire:loading.remove
											        wire:target="uploaded_policy.{{$file_policy[$loop->index]->id}}"
											        name="upload" class="w-4 h-4 text-white"></x-icon>
											<x-icon wire:loading
											        wire:target="uploaded_policy.{{$file_policy[$loop->index]->id}}"
											        name="loading"
											        class="w-4 h-4 text-white"></x-icon>
										</label>
									@endisset
								@else
									<x-danger-button type="button"
									                 wire:click="delete({{ $file_policy[$loop->index]->id }})"
									                 size="xs">
										<x-icon name="trash" class="w-4 h-4 text-white"></x-icon>
									</x-danger-button>
								@endif
							</div>
						</div>
					</x-table.td>
				</tr>
			@empty
				<tr>
					<x-table.td colspan="10" class="text-center">Nessuna polizza inserita</x-table.td>
				</tr>
			@endforelse
		</x-table.tbody>
	</x-table.table>
</x-card>