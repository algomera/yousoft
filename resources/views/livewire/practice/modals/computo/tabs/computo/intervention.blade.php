<div>
	<div class="grid grid-cols-10 overflow-hidden h-[250px]">
		<div class="col-span-10 lg:col-span-2 pr-4 overflow-y-auto relative">
			<nav class="space-y-0 space-x-2 lg:space-x-0 lg:space-y-1 flex flex-row h-[250px] mt-3 lg:flex-col"
			     aria-label="Sidebar">
				<x-intervention-list-folder-loop :items="$tree" :selected="$selected"></x-intervention-list-folder-loop>
			</nav>
		</div>
		<div class="col-span-10 lg:col-span-8 overflow-y-auto relative">
			@if($selected)
				<x-table.table class="h-[250px]">
					<x-table.thead>
						<tr class="divide-x divide-gray-200">
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">N.</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Prezzario</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Codice E.P.</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Descrizione</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Prog. Ragg.</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">U.M.</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Quantità</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Prezzo un.</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Sconto un.</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Totale</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Mat.</x-table.th>
						</tr>
					</x-table.thead>
					<x-table.tbody>
						@foreach($rows as $k => $row)
							<tr wire:click="selectInterventionRow({{ $row }})" class="divide-x divide-gray-200 cursor-pointer hover:bg-gray-50">
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $loop->index + 1 }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $row->price_row->price_list->code }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 uppercase">
									{{ $row->price_row->code }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $row->price_row->parent->short_description }} {{ $row->price_row->short_description }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900"></x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $row->price_row->um }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $row->details->sum('total') }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ \App\Helpers\Money::format($row->price_row->price) }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									---
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ \App\Helpers\Money::format($row->price_row->price * $row->details->sum('total')) }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ \App\Helpers\Money::format($row->price_row->mat) }}
								</x-table.td>
							</tr>
						@endforeach
					</x-table.tbody>
				</x-table.table>
			@endif
		</div>
	</div>
	<div class="bg-gray-50 px-4 py-1.5 flex items-center justify-end -mx-4">
		<div class="flex space-x-8">
			<span class="text-sm">Totale lavori C.M.: <span class="font-semibold">{{ \App\Helpers\Money::format($rows->sum('total')) }}</span></span>
		</div>
	</div>
</div>