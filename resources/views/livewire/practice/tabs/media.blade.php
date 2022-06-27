<x-card class="border p-4 rounded-md">
	<div class="block">
		<div class="border-b border-gray-200">
			<nav class="-mb-px flex space-x-8" aria-label="Tabs">
				@foreach($tabs as $k => $tab)
					<div wire:click="$set('selectedTab', '{{$k}}')"
					     class="@if($selectedTab === $k) border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 @endif whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm cursor-pointer">
						{{ $tab }}
					</div>
				@endforeach
			</nav>
		</div>
	</div>
	@switch($selectedTab)
		@case('photos')
			<livewire:practice.tabs.media.photos :practice="$practice" />
			@break
		@case('videos')
			<livewire:practice.tabs.media.videos :practice="$practice" />
			@break
	@endswitch
</x-card>