<div class="grid grid-cols-10 overflow-hidden mt-3">
	<div class="col-span-10 lg:col-span-2 pr-4 pt-1">
		<div class="flex items-center space-x-2 w-full">
			<div class="flex-1">
				<x-select wire:model="selectedPriceList" name="price_list" id="price_list" class="!mt-0">
					@foreach($price_lists as $k => $price_list)
						<option wire:ignore wire:key="{{$price_list->id}}"
						        value="{{$price_list->id}}">{{$price_list->name}}</option>
					@endforeach
				</x-select>
			</div>
{{--			<x-button class="h-[38px]">--}}
{{--				<x-icon name="search" class="w-4 h-4"></x-icon>--}}
{{--			</x-button>--}}
		</div>
		<nav class="space-y-0 space-x-2 lg:space-x-0 lg:space-y-1.5 flex flex-row h-[450px] overflow-y-auto mt-3 lg:flex-col"
		     aria-label="Sidebar">
			<x-price-list-folder-loop :items="$tree" :selected="$selected"></x-price-list-folder-loop>
		</nav>
	</div>
	<div class="col-span-10 lg:col-span-8">
		@if($selected)
			<x-table.table>
				<x-table.thead>
					<tr>
						<x-table.th>Codice E.P.</x-table.th>
						<x-table.th>Descrizione</x-table.th>
						<x-table.th>U.M.</x-table.th>
						<x-table.th>Prezzo</x-table.th>
						<x-table.th>% Mat.</x-table.th>
					</tr>
				</x-table.thead>
				<x-table.tbody>
					@foreach($price_list_rows as $k => $row)
						<tr wire:key="{{ $k }}-{{ $row->id }}" wire:click="selectLeaf({{ $row }})"
						    class="cursor-pointer hover:bg-gray-50">
							<x-table.td>
								<div class="w-40">
									{{ $row->code }}
								</div>
							</x-table.td>
							<x-table.td>{{ $row->short_description }}</x-table.td>
							<x-table.td>{{ $row->um }}</x-table.td>
							<x-table.td>{{ $row->price }}</x-table.td>
							<x-table.td>{{ $row->mat }}</x-table.td>
						</tr>
					@endforeach
				</x-table.tbody>
			</x-table.table>
		@else
			<div class="w-full h-full flex items-center justify-center">
				<div class="text-center">
					<x-icon name="folder" class="mx-auto h-12 w-12 text-gray-300"></x-icon>
					<h3 class="mt-2 text-sm font-medium text-gray-400">Seleziona una voce</h3>
				</div>
			</div>
		@endif
	</div>
</div>