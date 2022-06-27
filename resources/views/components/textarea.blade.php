@props(['disabled' => false, 'required' => false, 'name', 'label' => false, 'append' => false, 'prepend' => false, 'iconColor' => 'text-gray-800'])
@php
	$n = $attributes->wire('model')->value() ?: $name;
	$slug = $attributes->wire('model')->value() ?: $n;
	$inputClass = 'shadow-sm block w-full sm:text-sm rounded-md';
@endphp
@error($slug)
@php
	$inputClass .= ' border-red-300 focus:outline-none text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500';
@endphp
@else
	@php
		$inputClass .= ' border-gray-300 focus:border-indigo-300 focus:ring-indigo-200';
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
		<div class="mt-1">
			<textarea
					{{ $attributes->merge(['class' => $inputClass]) }}
					{{ $disabled ? 'disabled' : '' }}
					name="{{ $slug }}"
					id="{{ $slug }}"
					{{ $required ? 'required' : '' }}
			></textarea>
		</div>
		<x-input-error :for="$slug"></x-input-error>
	</div>
