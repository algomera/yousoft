<div>
	<x-table.table>
		<x-table.thead>
			<tr class="divide-x divide-gray-200">
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Codice</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Descrizione Lavori</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Importo lavori €</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Impon. IVA 10% €</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Impon. IVA 22% €</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">% spese prog.</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Importo spese prog. €</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">% Supp. Prog.</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Importo Supp. Prog. €</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">% Prog. Reg. Forf.</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Importo Prog. Reg. Forf.
				</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">% Ass. tecnica</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Importo Ass. tecnica €
				</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">% Ass. fiscale</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Importo Ass. fiscale €
				</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Tot. IVA al 10%</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Tot. IVA al 22%</x-table.th>
				<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Tot. incl. spese e IVA
				</x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@foreach($interventions as $k => $intervention)
				<tr wire:key="{{ $k }}" class="divide-x divide-gray-200">
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                        {{ $intervention->folder->code }}
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                        {{ $intervention->folder->name }}
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						{{ $intervention->total }}
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						<x-input x-on:blur="$wire.updateImpon22({{ $k }})" wire:model="interventions.{{$k}}.impon_iva_10" name="impon_iva_10" type="number" class="py-1 text-right !border-0 !shadow-none !ring-0"></x-input>
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						<x-input x-on:blur="$wire.updateImpon10({{ $k }})" wire:model="interventions.{{$k}}.impon_iva_22" name="impon_iva_22" type="number" class="py-1 text-right !border-0 !shadow-none !ring-0"></x-input>
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						<x-input x-on:blur="$wire.updateImportoSpeseProg({{ $k }})" wire:model="interventions.{{$k}}.spese_prog" name="spese_prog" type="number" class="py-1 text-right !border-0 !shadow-none !ring-0"></x-input>
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						{{ $intervention->importo_spese_prog }}
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						6
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						7
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						8
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						9
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						10
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						11
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						12
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						13
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						14
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						15
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						16
					</x-table.td>
				</tr>
			@endforeach
		</x-table.tbody>
	</x-table.table>
</div>
