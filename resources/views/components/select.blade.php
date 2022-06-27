@props(['disabled' => false, 'required' => false, 'name', 'label' => false])
@php
	$n = $attributes->wire('model')->value() ?: $name;
	$slug = $attributes->wire('model')->value() ?: $n;
@endphp
@error($slug)
@php
	$inputClass = 'block w-full py-2 pl-3 pr-10 mt-1 text-base border-red-300 text-red-900 placeholder-red-300 rounded-md focus:outline-none disabled:bg-gray-100 disabled:text-gray-40 focus:ring-red-500 focus:border-red-500 sm:text-sm';
@endphp
@else
	@php
		$inputClass = 'block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none disabled:bg-gray-100 disabled:text-gray-40 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm';
	@endphp
	@enderror
	<div>
		<div class="flex items-center justify-between">
			@if ($label)
				<x-label :for="$name" :required="$required">{{ $label }}</x-label>
			@endif
			@isset($action)
				{{ $action }}
			@endisset
		</div>
		<select
				{{ $attributes->merge(['class' => $inputClass]) }}
				{{ $disabled ? 'disabled' : '' }}
				name="{{ $slug }}"
				id="{{ $slug }}"
				{{ $required ? 'required' : '' }}
		>
			{{ $slot }}
		</select>
		<x-input-error :for="$slug"></x-input-error>
	</div>
