<div class="flex-1 py-2 border -mt-px -ml-px flex items-center justify-center bg-white last:-mr-px">
	<p class="text-xs font-semibold leading-6 text-gray-700 capitalize">
		{{ $day->translatedFormat('D')[0] }}<span class="sr-only sm:not-sr-only">{{$day->translatedFormat('D')[1]}}{{$day->translatedFormat('D')[2]}}</span>
	</p>
</div>