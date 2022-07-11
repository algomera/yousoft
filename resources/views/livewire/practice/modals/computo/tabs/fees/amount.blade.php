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
			@foreach($fees_amount as $k => $fees_amount)
				<tr wire:key="{{ $k }}" class="divide-x divide-gray-200">
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                        {{ $fees_amount->folder->code }}
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                        {{ $fees_amount->folder->name }}
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						<x-input name="importo_lavori" value="{{ $fees_amount->importo_lavori }}" type="number" class="py-1 text-right !border-0 !shadow-none !ring-0" disabled readonly></x-input>
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						<x-input x-on:blur="$wire.calculate({{ $k }})" wire:model="fees_amount.{{$k}}.impon_iva_10" name="impon_iva_10" type="number" class="py-1 text-right !border-0 !shadow-none !ring-0"></x-input>
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						<x-input x-on:blur="$wire.calculate({{ $k }})" wire:model="fees_amount.{{$k}}.impon_iva_22" name="impon_iva_22" type="number" class="py-1 text-right !border-0 !shadow-none !ring-0"></x-input>
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						<x-input x-on:blur="$wire.calculate({{ $k }})" wire:model="fees_amount.{{$k}}.spese_prog" name="spese_prog" type="number" class="py-1 text-right !border-0 !shadow-none !ring-0"></x-input>
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						{{ $fees_amount->importo_spese_prog }}
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						<x-input x-on:blur="$wire.calculate({{ $k }})" wire:model="fees_amount.{{$k}}.supp_prog" name="supp_prog" type="number" class="py-1 text-right !border-0 !shadow-none !ring-0"></x-input>
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						{{ $fees_amount->importo_supp_prog }}
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						<x-input x-on:blur="$wire.calculate({{ $k }})" wire:model="fees_amount.{{$k}}.prog_reg_forf" name="prog_reg_forf" type="number" class="py-1 text-right !border-0 !shadow-none !ring-0"></x-input>
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						{{ $fees_amount->importo_prog_reg_forf }}
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						<x-input x-on:blur="$wire.calculate({{ $k }})" wire:model="fees_amount.{{$k}}.ass_tecnica" name="ass_tecnica" type="number" class="py-1 text-right !border-0 !shadow-none !ring-0"></x-input>
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						{{ $fees_amount->importo_ass_tecnica }}
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						<x-input x-on:blur="$wire.calculate({{ $k }})" wire:model="fees_amount.{{$k}}.ass_fiscale" name="ass_fiscale" type="number" class="py-1 text-right !border-0 !shadow-none !ring-0"></x-input>
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						{{ $fees_amount->importo_ass_fiscale }}
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						{{ $fees_amount->tot_iva_10 }}
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						{{ $fees_amount->tot_iva_22 }} ???
					</x-table.td>
					<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900 text-right">
						<strong>{{ $fees_amount->tot_spese_e_iva }}</strong>
					</x-table.td>
				</tr>
			@endforeach
		</x-table.tbody>
	</x-table.table>
</div>
