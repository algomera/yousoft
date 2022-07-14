<div
		class="border"
		@if($pollMillis !== null && $pollAction !== null)
			wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
		@elseif($pollMillis !== null)
			wire:poll.{{ $pollMillis }}ms
		@endif
>
	@isset($beforeCalendarView)
		<div>
			@include($beforeCalendarView)
		</div>
	@endisset

	<div class="flex">
		<div class="overflow-x-auto w-full">
			<div class="inline-block min-w-full overflow-hidden">

				<div class="w-full flex flex-row">
					@foreach($monthGrid->first() as $day)
						@include($dayOfWeekView, ['day' => $day])
					@endforeach
				</div>

				@foreach($monthGrid as $week)
					<div class="w-full bg-gray-200 border-b grid grid-cols-7 gap-px">
						@foreach($week as $day)
							@include($dayView, [
									'componentId' => $componentId,
									'day' => $day,
									'dayInMonth' => $day->isSameMonth($startsAt),
									'isToday' => $day->isToday(),
									'events' => $getEventsForDay($day, $events),
								])
						@endforeach
					</div>
				@endforeach
			</div>
		</div>
	</div>

	@isset($afterCalendarView)
		<div>
			@include($afterCalendarView)
		</div>
	@endisset
</div>
