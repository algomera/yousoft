<div
		@if($eventClickEnabled)
			wire:click.stop="onEventClick('{{ $event['id']  }}')"
		@endif
		class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600 hover:cursor-pointer">

	@isset($event['title'])
		<p class="text-xs font-semibold">
			{{ $event['title'] }}
		</p>
	@endisset
	@isset($event['description'])
		<p class="{{ isset($event['title']) ? 'mt-0.5' : '' }} text-xs text-gray-500">
			{{ $event['description'] ?? 'No description' }}
		</p>
	@endisset
</div>
