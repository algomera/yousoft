<div>
	<x-card class="p-4 space-y-0">
		<div class="space-y-3">
			<div class="flex items-center justify-between">
				<div>
					<h3 class="text-lg leading-6 font-medium text-gray-900">{{ __('Cartella') }}</h3>
					@if($sub_folder->documents->count())
						<p class="mt-1 max-w-2xl text-sm text-gray-500">{{ __('N. documenti nella cartella') }}: <span
									class="font-semibold">{{ $sub_folder->documents->count() }}</span></p>
					@endif
				</div>
				@can('upload-required-documents-file', $sub_folder->practice)
					<x-button
							wire:click="$emit('openModal', 'practice.tabs.document.modals.add-document', {{ json_encode([$sub_folder->id]) }})"
							prepend="plus" iconColor="text-white">{{ __('Aggiungi') }}
					</x-button>
				@endcan
			</div>

			@canany(['approve-required-documents-folder', 'disapprove-required-documents-folder'], $current_sub_folder->practice)
				@if($current_sub_folder->documents->count())
					<div class="flex justify-end items-center space-x-3">
						@can('approve-required-documents-folder', $current_sub_folder->practice)
							@if($current_sub_folder->$status == 1)
								<x-button wire:click="approve" size="xs">{{ __('Approva') }}</x-button>
							@endif
						@endcan

						@can('disapprove-required-documents-folder', $current_sub_folder->practice)
							@if($current_sub_folder->$status == 2)
								<x-danger-button wire:click="disapprove"
								                 size="xs">{{ __('Non Approvare') }}</x-danger-button>
							@endif
						@endcan
					</div>
				@endif
			@endcanany
		</div>
		<div class="border-t border-gray-200 px-4 !mt-2">
			<ul role="list" class="divide-y divide-gray-200">
				@forelse($sub_folder->documents as $i => $document)
					<li class="py-4 flex w-full" wire:key="{{ $loop->index }}">
						<div class="flex items-center justify-center text-sm bg-gray-50 border border-gray-200 font-semibold h-8 w-8 rounded-full">
							{{ $i + 1 }}
						</div>
						<div class="ml-3 w-full">
							<p class="text-sm text-gray-500 font-semibold italic">{{ $document->name }}</p>
							<p class="text-sm text-gray-500">{{ $document->note }}</p>
							<div class="flex items-center justify-between mt-1 flex-wrap">
								<p class="text-sm text-gray-500">
									<span class="font-bold">Data creazione:</span>
									<span>{{ $document->created_at->format('d/m/Y') }}</span>
								</p>
								<div class="flex items-center space-x-3">
									@can('download-required-documents-file', $sub_folder->practice)
										<x-icon name="download" wire:click="download({{ $document->id }})"
										        class="text-indigo-500 w-4 h-4 cursor-pointer"></x-icon>
									@endcan
									@can('delete-required-documents-file', $sub_folder->practice)
										<x-icon name="trash" wire:click="delete({{ $document->id }})"
										        class="text-red-500 w-4 h-4 cursor-pointer"></x-icon>
									@endcan
								</div>
							</div>
							@if($document->type)
								<hr class="!my-2 border-gray-100">
								<div class="flex flex-col justify-start">
									<span class="text-gray-500 uppercase text-xs font-semibold">Tags:</span>
									<div class="-mx-1">
										@foreach(explode(',', $document->type) as $type)
											<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium m-0.5 bg-gray-100 text-gray-800">{{ $type }}</span>
										@endforeach
									</div>
								</div>
							@endif
						</div>
					</li>
				@empty
					<li class="text-center py-4 text-sm text-gray-500">
						Nessun documento inserito
					</li>
				@endforelse
			</ul>
		</div>
	</x-card>

</div>