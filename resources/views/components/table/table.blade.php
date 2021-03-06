<div {{ $attributes->merge(['class' => 'flex flex-col']) }}>
	<div class="-mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
		<div class="inline-block min-w-full align-middle md:px-6 lg:px-8 pb-4">
			<div class="overflow-hidden border">
				<table class="min-w-full divide-y divide-gray-300">
					{{ $slot }}
				</table>
			</div>
		</div>
	</div>
</div>