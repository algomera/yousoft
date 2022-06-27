@props(['actions'])

<div {{ $attributes->merge(['class' => 'py-5 border-t border-gray-200 sm:flex w-full sm:items-center']) }}>
	<h3 class="text-lg leading-6 font-medium text-gray-900">{{ $slot }}</h3>
	@isset($actions)
		<div class="mt-3 flex w-full sm:mt-0 sm:ml-4">
			{{ $actions }}
		</div>
	@endisset
</div>