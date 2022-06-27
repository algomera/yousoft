<div class="lg:flex">
	<img class="w-full h-full lg:max-w-[450px] lg:max-h-[450px] aspect-square" src="{{ asset($photo->image) }}"
	     alt="{{$photo->name}}">
	<div class="p-4 w-full">
		<div class="flex flex-col space-y-2">
			@isset($photo->name)
				<div class="flex flex-col text-xs text-gray-500">
					<span class="font-bold">Nome:</span>
					<span>{{ $photo->name }}</span>
				</div>
			@endisset
			@isset($photo->description)
				<div class="flex flex-col text-xs text-gray-500">
					<span class="font-bold">Descrizione:</span>
					<span>{{ $photo->description }}</span>
				</div>
			@endisset
			@isset($photo->reference)
				<div class="flex flex-col text-xs text-gray-500">
					<span class="font-bold">Riferimento:</span>
					<span>{{ $photo->reference }}</span>
				</div>
			@endisset
			@isset($photo->position)
				<div class="flex flex-col text-xs text-gray-500">
					<span class="font-bold">Posizione:</span>
					<span>{{ $photo->position }}</span>
				</div>
			@endisset
		</div>
	</div>
</div>
