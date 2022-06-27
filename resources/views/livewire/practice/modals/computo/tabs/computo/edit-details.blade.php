<div>
	<x-card class="p-4">
		<div class="grid grid-cols-10 gap-8">
			<div class="col-span-10 lg:col-span-2">
				<div class="flex flex-col space-y-3">
					<div class="flex items-center justify-between">
						<span class="text-sm font-medium text-gray-500">U.M.</span>
						<span class="text-sm font-semibold text-gray-900">{{ $row->price_row->um }}</span>
					</div>
					<div class="flex items-center justify-between">
						<span class="text-sm font-medium text-gray-500">Prezzo un.</span>
						<span class="text-sm font-semibold text-gray-900">{{ \App\Helpers\Money::format($row->price_row->price) }}</span>
					</div>
					<div class="flex items-center justify-between">
						<span class="text-sm font-medium text-gray-500">Sconto un.</span>
						<span class="text-sm font-semibold text-gray-900">{{ \App\Helpers\Money::format($row->price_row->mat) }}</span>
					</div>
				</div>
			</div>
			<div class="col-span-10 lg:col-span-8">
				<div class="flex flex-col space-y-3">
					<div class="flex items-center space-x-4">
						<span class="text-sm font-medium text-gray-500">Codice E.P.</span>
						<span class="text-sm font-semibold text-gray-900">{{ strtoupper($row->price_row->code) }}</span>
					</div>
					<div class="flex flex-col">
						<span class="text-sm font-medium text-gray-500">Descrizione E.P.</span>
						<div class="text-sm text-gray-900">
							{{ $row->price_row->parent->short_description }}<br>{{ $row->short_description }}
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr class="my-3">
		<div class="grid grid-cols-10 gap-4">
			<div class="col-span-10 lg:col-span-10">
				<x-table.table>
					<x-table.thead>
						<tr class="divide-x divide-gray-200">
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">N.</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Commento</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Espressione
							</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">NPS</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Lunghezza</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Larghezza</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">H-P-S</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Totale</x-table.th>
							<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900"></x-table.th>
						</tr>
					</x-table.thead>
					<x-table.tbody>
						@foreach($details as $k => $detail)
							<tr class="divide-x divide-gray-200">
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $loop->index + 1 }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $detail->note }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $detail->expression }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $detail->nps }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $detail->length }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $detail->width }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $detail->hps }}
								</x-table.td>
								<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									{{ $detail->total }}
								</x-table.td>
								<x-table.td class="w-0 whitespace-nowrap px-2 py-2 text-sm text-gray-900">
									<div class="flex items-center space-x-3">
										<x-modal>
											<x-slot name="trigger">
												<div class="text-red-600 hover:text-red-900">
													<x-icon name="trash" class="w-5 h-5"></x-icon>
												</div>
											</x-slot>
											<x-slot name="title">
												Conferma eliminazione
											</x-slot>
											Sei sicuro di voler eliminare questo dettaglio?
											<x-slot name="footer">
												<x-link-button x-on:click="open = false">Annulla</x-link-button>
												<x-danger-button class="ml-2"
												                 wire:click="deleteDetail({{ $detail->id }})"
												                 wire:loading.attr="disabled">
													Elimina
												</x-danger-button>
											</x-slot>
										</x-modal>
									</div>
								</x-table.td>
							</tr>
						@endforeach
					</x-table.tbody>
				</x-table.table>
			</div>
		</div>
	</x-card>
	<div class="fixed bottom-0 inset-x-0 w-full">
		<div class="col-span-10 bg-gray-50 px-4 py-2 flex items-center justify-end">
			<div class="flex space-x-8">
				<span class="text-sm">Prezzo un.: <span
							class="font-semibold">{{ \App\Helpers\Money::format($row->price_row->price) }}</span></span>
				<span class="text-sm">Quantità: <span class="font-semibold">{{ $row->price_row->um }}</span></span>
				<span class="text-sm">Totale immissione: <span
							class="font-semibold">{{ \App\Helpers\Money::format($row->price_row->price * $details->sum('total')) }}</span></span>
			</div>
		</div>
		<div class="py-2 px-4 flex items-center justify-between">
			<div>
				<x-button
						wire:click="$emit('openModal', 'practice.modals.computo.tabs.computo.add-detail', {{ json_encode(['intervention_row_id' => $row->id, 'practice_id' => $practice_id, 'selectedIntervention' => $selectedIntervention, 'row' => $row->price_row->id]) }})"
						prepend="plus" iconColor="text-white">Dettaglio
				</x-button>
			</div>
			<div class="flex items-center space-x-3">
				<x-button wire:click="save">Salva ed esci</x-button>
			</div>
		</div>
	</div>
</div>