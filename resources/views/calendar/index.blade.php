<x-app-layout>
	<livewire:calendar.calendar
			week-starts-at="1"
			event-view="livewire/calendar/views/event"
			day-of-week-view="livewire/calendar/views/day-of-week"
			before-calendar-view="livewire/calendar/views/before-calendar-view"
			calendar-view="livewire/calendar/views/calendar"
			day-view="livewire/calendar/views/day"
			:drag-and-drop-enabled="false"
	/>
</x-app-layout>