<div class="lg:flex">
	<video x-ref="video" src="{{ asset($video->path) }}" class="w-full h-full lg:max-w-[450px] lg:max-h-[450px] aspect-square" controls
	       preload="auto"></video>
	<div class="p-4 w-full">
		<div class="flex flex-col space-y-2">
			@isset($video->name)
				<div class="flex flex-col text-xs text-gray-500">
					<span class="font-bold">Nome:</span>
					<span>{{ $video->name }}</span>
				</div>
			@endisset
			@isset($video->description)
				<div class="flex flex-col text-xs text-gray-500">
					<span class="font-bold">Descrizione:</span>
					<span>{{ $video->description }}</span>
				</div>
			@endisset
			@isset($video->reference)
				<div class="flex flex-col text-xs text-gray-500">
					<span class="font-bold">Riferimento:</span>
					<span>{{ $video->reference }}</span>
				</div>
			@endisset
			@isset($video->position)
				<div class="flex flex-col text-xs text-gray-500">
					<span class="font-bold">Posizione:</span>
					<span class="underline" x-on:click.stop="window.open('http://www.google.com/maps/place/{{$video->position}}', '_blank')">{{ $video->position }}</span>
				</div>
			@endisset
		</div>
	</div>
</div>
