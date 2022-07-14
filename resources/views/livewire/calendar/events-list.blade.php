<div class="w-full">
	<h3 class="block lg:hidden text-center font-bold pb-3">{{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}</h3>
	@if($practices !== null && $practices->count() > 0)
		<div class="bg-white shadow overflow-hidden sm:rounded-md">
			<ul role="list" class="divide-y divide-gray-200">
				@foreach($practices as $practice)
					<li>
						<div class="block hover:bg-gray-50 cursor-pointer">
							<div class="flex items-center py-4">
								<div class="min-w-0 flex-1 flex items-center">
									<div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
										<div>
											<p class="text-sm font-medium text-indigo-600 truncate">{{ $practice->building->condominio }}</p>
											<p class="mt-2 flex items-center text-sm text-gray-500">
												<span class="truncate">{{ $practice->address }}, {{ $practice->civic }} - {{ $practice->cap }} {{ $practice->common }} ({{ $practice->province }})</span>
											</p>
										</div>
										<div class="hidden md:block">
											<div class="mt-1 text-right">
												<p class="text-xs text-gray-500">
													{{-- Inizio lavori:--}}
													<time datetime="{{$practice->work_start}}"
													      class="capitalize">{{ \Carbon\Carbon::parse($practice->work_start)->translatedFormat('d F Y') }}</time>
												</p>
											</div>
										</div>
									</div>
								</div>
								{{--								<div>--}}
								{{--									<x-icon name="eye" class="h-5 w-5 text-gray-400"></x-icon>--}}
								{{--								</div>--}}
							</div>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	@else
		<div class="text-center">
			<x-icon name="collection" class="mx-auto w-12 h-12 text-gray-300"></x-icon>
			<h3 class="mt-2 text-sm font-medium text-gray-900">Nessuna pratica</h3>
			<p class="mt-1 text-sm text-gray-500">Questo giorno non contiene nessuna pratica</p>
		</div>
	@endif
</div>
