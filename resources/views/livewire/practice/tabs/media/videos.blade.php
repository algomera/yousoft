<div class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
	@forelse($videos as $video)
		<div wire:click="$emit('openModal', 'practice.tabs.media.modals.video-lightbox', {{ json_encode([$video]) }})" class="relative cursor-pointer">
			<div class="relative group block w-full aspect-square rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
				<img src="/img/placeholder.png"
				     alt="" class="object-cover aspect-square pointer-events-none group-hover:opacity-75">
				<div class="flex items-center justify-center absolute inset-0 rounded-md opacity-0 group-hover:opacity-100 group-hover:bg-black/80">
					<x-icon name="eye" class="w-6 h-6 text-white"></x-icon>
				</div>
			</div>
			<div class="flex items-center justify-between">
				<div>
					<p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">{{ $video->name }}</p>
					<p class="block text-xs font-medium text-gray-500 pointer-events-none">{{ $video->created_at->format('d/m/Y') }}</p>
				</div>
				@isset($video->position)
					<x-icon name="location-marker" class="w-6 h-6 text-indigo-500"></x-icon>
				@endisset
			</div>
		</div>
	@empty
		<span class="py-4 text-sm text-gray-500">Nessun video caricato</span>
	@endforelse
</div>