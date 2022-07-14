<li
		@if($eventClickEnabled)
			wire:click.stop="onEventClick('{{ $event['id']  }}')"
		@endif
		class="text-xs hover:cursor-pointer">
	<div class="group flex">
		<p class="flex-auto truncate font-medium text-gray-900 group-hover:text-indigo-600">{{ $event['title'] }}</p>
	</div>
</li>
