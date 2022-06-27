@props(['size' => 'md', 'append' => false, 'prepend' => false, 'iconColor' => 'text-gray-800'])

@php
	$classes = 'inline-flex items-center justify-center border border-transparent font-medium shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500';
		switch ($size) {
			case 'xs':
				$classes .= ' px-2.5 py-1.5 text-xs rounded';
				break;
				case 'sm':
					$classes .= ' px-3 py-2 text-sm leading-4 rounded-md';
					break;
					case 'xl':
					$classes .= ' px-4 py-2 text-base rounded-md';
					break;
					case '2xl':
					$classes .= ' px-6 py-3 text-base rounded-md';
					break;
					default:
						$classes .= ' px-4 py-2 text-sm rounded-md';
						break;
		}
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => $classes . ' disabled:opacity-25 transition']) }}>
	@if($prepend)
		<x-icon name="{{$prepend}}" class="{{$iconColor ?: 'text-gray-800'}} w-4 h-4 -ml-0.5 mr-2"></x-icon>
	@endif
	{{ $slot }}
	@if($append)
		<x-icon name="{{$append}}" class="{{$iconColor ?: 'text-gray-800'}} w-4 h-4 ml-2 -mr-0.5"></x-icon>
	@endif
</button>
