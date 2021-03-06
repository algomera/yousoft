<header class="bg-gray-50 relative z-20 flex items-center justify-between border border-gray-200 py-4 px-6 lg:rounded-t-md lg:flex-none">
	<h1 class="text-lg font-semibold text-gray-900">
		<time datetime="2022-01" class="capitalize">{{ \Carbon\Carbon::createFromDate($startsAt)->translatedFormat('F Y') }}</time>
	</h1>
	<div class="flex items-center">
		<div class="flex items-center rounded-md shadow-sm md:items-stretch">
			<button type="button"
			        wire:click="goToPreviousMonth"
			        class="flex items-center justify-center rounded-l-md border border-r-0 border-gray-300 bg-white py-2 pl-3 pr-4 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:px-2 md:hover:bg-gray-50">
				<x-icon name="chevron-left" class="h-4 w-4"></x-icon>
			</button>
			<button type="button"
			        wire:click="goToCurrentMonth"
			        class="block py-2 border-t border-b border-gray-300 bg-white px-3.5 text-xs font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900 focus:relative">
				Oggi
			</button>
			<button type="button"
			        wire:click="goToNextMonth"
			        class="flex items-center justify-center rounded-r-md border border-l-0 border-gray-300 bg-white py-2 pl-4 pr-3 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:px-2 md:hover:bg-gray-50">
				<x-icon name="chevron-right" class="h-4 w-4"></x-icon>
			</button>
		</div>
	</div>
</header>