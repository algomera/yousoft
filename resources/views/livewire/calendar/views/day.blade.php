<div
		ondragenter="onLivewireCalendarEventDragEnter(event, '{{ $componentId }}', '{{ $day }}', '{{ $dragAndDropClasses }}');"
		ondragleave="onLivewireCalendarEventDragLeave(event, '{{ $componentId }}', '{{ $day }}', '{{ $dragAndDropClasses }}');"
		ondragover="onLivewireCalendarEventDragOver(event);"
		ondrop="onLivewireCalendarEventDrop(event, '{{ $componentId }}', '{{ $day }}', {{ $day->year }}, {{ $day->month }}, {{ $day->day }}, '{{ $dragAndDropClasses }}');"
		class="flex h-14 flex-col hover:cursor-pointer lg:hover:cursor-default lg:block lg:h-auto relative py-2 px-3 {{ $dayInMonth ? 'bg-white hover:bg-gray-50 lg:hover:bg-white' : 'bg-gray-50 text-gray-500 hover:bg-gray-50' }}">

	{{-- Wrapper for Drag and Drop --}}
	<div
			class="w-full h-full"
			id="{{ $componentId }}-{{ $day }}">

		<div
				@if($dayClickEnabled)
					wire:click="onDayClick({{ $day->year }}, {{ $day->month }}, {{ $day->day }})"
				@endif
				class="w-full h-full flex flex-col">

			{{-- Number of Day --}}
			<div class="ml-auto lg:ml-0 lg:flex lg:items-center">
				<p class="text-xs {{ $isToday ? 'text-indigo-500 lg:flex lg:h-6 lg:w-6 lg:items-center lg:justify-center lg:rounded-full lg:bg-indigo-600 font-semibold lg:text-white' : '' }}">
					{{ $day->format('j') }}
				</p>
			</div>

			{{-- Events --}}
			<div class="h-14 overflow-y-scroll hidden lg:block mt-2 space-y-3">
				@foreach($events as $event)
					<div class="group flex flex-col">
						<div
								@if($dragAndDropEnabled)
									draggable="true"
								@endif
								ondragstart="onLivewireCalendarEventDragStart(event, '{{ $event['id'] }}')">
							@include($eventView, [
								'event' => $event,
							])
						</div>
					</div>
				@endforeach
			</div>
			<div class="lg:hidden -mx-0.5 mt-auto flex flex-wrap-reverse">
				@foreach($events as $event)
					<span class="mx-0.5 mb-1 h-1.5 w-1.5 rounded-full bg-gray-400"></span>
				@endforeach
			</div>
		</div>
	</div>
</div>
