@props(['route'])

<a
		href="{{ $route['url'] }}"
		@if ($route['active'])
			class="flex items-center justify-between px-2 py-2 text-sm font-medium text-gray-900 bg-gray-100 rounded-md group"
		@else
			class="flex items-center justify-between px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-50 hover:text-gray-900 group"
		@endif
>
	<div class="flex items-center">
		<x-icon
				name="{{ $route['icon'] }}"
				class="w-6 h-6 mr-4 group-hover:text-gray-900 {{ $route['active'] ? 'text-gray-900' : 'text-gray-500' }}"
		></x-icon>
		{{ $route['name'] }}
	</div>
</a>