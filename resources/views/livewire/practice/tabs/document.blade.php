<x-card>
	<div class="grid grid-cols-10 gap-4">
		<div class="col-span-10 lg:col-span-2">
			<x-section-heading class="!border-t-0 !pt-0">Stato dei lavori:</x-section-heading>
			<nav class="space-y-0 space-x-2 lg:space-x-0 lg:space-y-2 flex flex-row overflow-x-auto lg:flex-col"
			     aria-label="Sidebar">
				@foreach($tabs as $k => $tab)
					<div wire:click="$set('selectedTab', '{{$k}}')"
					     class="@if($k === $selectedTab) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer">
						<span class="truncate">{{ $tab }}</span>
						<span class="@if($k === $selectedTab) bg-white @else bg-gray-100 text-gray-600 group-hover:bg-gray-200 @endif ml-auto py-0.5 px-3 text-xs rounded-full hidden lg:inline-block">{{ $practice->sub_folder->where('folder_type', $k)->count() }}</span>
					</div>
				@endforeach
			</nav>
		</div>
		<div class="col-span-10 lg:col-span-8">
			<div class="bg-white">
				<ul role="list" class="divide-y divide-gray-200 rounded-md overflow-hidden">
					@foreach($sub_folders as $sub_folder)
						<li wire:click="showFolderContent({{$sub_folder}})">
							<div class="block hover:bg-gray-50 cursor-pointer">
								<div class="px-4 py-4 flex items-center sm:px-6">
									<div class="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
										<div class="truncate">
											<div class="flex items-center space-x-2 mt-1">
												<p class="text-xs text-gray-500">
													<span class="text-indigo-600 capitalize font-medium">{{ $sub_folder->role ?: '-' }}</span>
												</p>
												@if($sub_folder->documents->count())
													<span class="text-gray-500">·</span>
													<p class="text-xs text-gray-500">
														<span>{{ $sub_folder->documents->count() }}</span>
														<span class="font-bold">files</span>
													</p>
												@endif
											</div>
											<div class="mt-2 flex">
												<div class="flex items-center text-sm text-gray-500">
													<p class="whitespace-normal">
														{{ $sub_folder->name }}
													</p>
												</div>
											</div>
										</div>
										<div class="mt-4 flex-shrink-0 sm:mt-0 sm:ml-5">
											<div class="flex overflow-hidden space-x-1">
												<div class="flex items-center justify-center folder_document_status @if($sub_folder->assev_t_status == 0) not_viewed @elseif($sub_folder->assev_t_status == 1) not_approved @else approved @endif"
												     x-tooltip.raw="@if($sub_folder->assev_t_status == 0) Non visualizzato @elseif($sub_folder->assev_t_status == 1) Non approvato @else Approvato @endif dall' Assev. T">
													T
												</div>
												<div class="flex items-center justify-center folder_document_status @if($sub_folder->assev_f_status == 0) not_viewed @elseif($sub_folder->assev_f_status == 1) not_approved @else approved @endif"
												     x-tooltip.raw="@if($sub_folder->assev_f_status == 0) Non visualizzato @elseif($sub_folder->assev_f_status == 1) Non approvato @else Approvato @endif dall' Assev. F">
													F
												</div>
												<div class="flex items-center justify-center folder_document_status @if($sub_folder->bank_status == 0) not_viewed @elseif($sub_folder->bank_status == 1) not_approved @else approved @endif"
												     x-tooltip.raw="@if($sub_folder->bank_status == 0) Non visualizzato @elseif($sub_folder->bank_status == 1) Non approvato @else Approvato @endif dalla Banca">
													B
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</x-card>