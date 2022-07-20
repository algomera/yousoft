<div class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
	@forelse($photos as $photo)
		<div wire:click="$emit('openModal', 'practice.tabs.media.modals.photo-lightbox', {{ json_encode([$photo]) }})"
		     class="relative cursor-pointer">
			<div class="relative group block w-full aspect-square rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
				<img src="{{ \Storage::get($photo->path) }}"
				     alt="" class="object-cover aspect-square pointer-events-none group-hover:opacity-75">
				<div class="flex items-center justify-center absolute inset-0 rounded-md opacity-0 group-hover:opacity-100 group-hover:bg-black/80">
					<x-icon name="eye" class="w-6 h-6 text-white"></x-icon>
				</div>
			</div>
			<div class="flex items-center justify-between">
				<div>
					<p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">{{ $photo->name }}</p>
					<p class="block text-xs font-medium text-gray-500 pointer-events-none">{{ $photo->created_at->format('d/m/Y') }}</p>
				</div>
				@isset($photo->position)
					<div x-on:click.stop="window.open('http://www.google.com/maps/place/{{$photo->position}}', '_blank')">
						<x-icon name="location-marker" class="w-6 h-6 text-indigo-500"></x-icon>
					</div>
				@endisset
			</div>
		</div>
	@empty
		<span class="py-4 text-sm text-gray-500">Nessuna foto caricata</span>
	@endforelse
</div>