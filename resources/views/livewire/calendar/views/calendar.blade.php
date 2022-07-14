<div
		@if($pollMillis !== null && $pollAction !== null)
			wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
		@elseif($pollMillis !== null)
			wire:poll.{{ $pollMillis }}ms
		@endif
		class="bg-gray-50 lg:h-0 lg:min-h-[768px]"
>
	<div class="lg:flex lg:h-full lg:flex-col">
		@includeIf($beforeCalendarView)
		<div class="shadow ring-1 ring-black ring-opacity-5 lg:flex lg:flex-auto lg:flex-col">
			<div class="grid grid-cols-7 gap-px border-b border-gray-300 bg-gray-200 text-center text-xs font-semibold leading-6 text-gray-700 lg:flex-none">
				@include($dayOfWeekView)
			</div>
			<div class="bg-gray-200 flex leading-6 lg:flex-auto text-gray-700 text-xs">
				<div class="hidden w-full lg:grid lg:grid-cols-7 lg:grid-rows-6 lg:gap-px">
					@foreach($monthGrid as $week)
						@foreach($week as $day)
							@include($dayView, [
									'componentId' => $componentId,
									'day' => $day,
									'dayInMonth' => $day->isSameMonth($startsAt),
									'isToday' => $day->isToday(),
									'events' => $getEventsForDay($day, $events),
								])
						@endforeach
					@endforeach
				</div>
				<div class="gap-px grid grid-cols-7 grid-rows-6 lg:hidden w-full">
					@foreach($monthGrid as $week)
						@foreach($week as $day)
							@include($dayView, [
									'componentId' => $componentId,
									'day' => $day,
									'dayInMonth' => $day->isSameMonth($startsAt),
									'isToday' => $day->isToday(),
									'events' => $getEventsForDay($day, $events),
								])
						@endforeach
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
