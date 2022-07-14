<x-app-layout>
	<div class="grid xl:grid-cols-2 gap-5">
		<div class="flex w-full order-2 xl:order-1">
			<livewire:calendar.events-list></livewire:calendar.events-list>
		</div>
		<div class="order-1">
			<livewire:calendar.calendar
					week-starts-at="1"
					event-view="livewire/calendar/views/event"
					day-of-week-view="livewire/calendar/views/day-of-week"
					before-calendar-view="livewire/calendar/views/before-calendar-view"
					calendar-view="livewire/calendar/views/calendar"
					day-view="livewire/calendar/views/day"
					:drag-and-drop-enabled="false"
			/>
		</div>
	</div>
</x-app-layout>
