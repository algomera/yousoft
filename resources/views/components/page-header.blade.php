<div {{ $attributes->merge(['class' => 'border-b']) }}>
	<div class="container mx-auto md:flex md:items-center md:justify-between p-4">
		<div class="flex-1 min-w-0">
			<h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">{{ $slot }}</h2>
			@isset($subtitle)
				{{ $subtitle }}
			@endisset
		</div>
		@isset($actions)
			{{ $actions }}
		@endisset
	</div>
</div>