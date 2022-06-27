@props(['disabled' => false, 'required' => false, 'name', 'label' => false, 'hint' => false])
@php
	$n = $attributes->wire('model')->value() ?: $name;
	$slug = $attributes->wire('model')->value() ?: $n;
	$inputClass = 'appearance-none w-full rounded-md shadow-sm sm:text-sm focus:ring focus:ring-opacity-50';
@endphp
@error($slug)
@php
	$inputClass .= ' pr-11 border-red-300 focus:outline-none text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500';
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
		<div class="relative mt-1">
			<input
					{{ $attributes->merge(['class' => $inputClass]) }}
					type="number"
					step="0.01"
					placeholder="0,00"
					{{ $disabled ? 'disabled' : '' }}
					name="{{ $slug }}"
					id="{{ $slug }}"
					{{ $required ? 'required' : '' }}
			>
			@error($slug)
			<div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
				<x-icon
						name="exclamation-circle"
						class="w-5 h-5 text-red-500"
				></x-icon>
			</div>
			@else
				<div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
					<x-icon name="€" class="text-gray-500 w-5 h-5"></x-icon>
				</div>
				@enderror
		</div>
		@if($hint)
			<p class="mt-1 text-xs text-gray-500">{{ $hint }}</p>
		@endif
		<x-input-error :for="$slug"></x-input-error>
	</div>
