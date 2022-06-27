<div class="mt-3">
	<x-table.table>
		<x-table.thead>
			<tr>
				<x-table.th>N.</x-table.th>
				<x-table.th>Descrizione</x-table.th>
				<x-table.th>Superficie (m²)</x-table.th>
				<x-table.th>Trasm. Ante (W/m²k)</x-table.th>
				<x-table.th>Trasm. Post (W/m²k)</x-table.th>
				<x-table.th>Trasm. Term. Period. YIE (W/m²k)</x-table.th>
				<x-table.th>Confine</x-table.th>
				<x-table.th>Coibentazione</x-table.th>
				<x-table.th></x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@forelse($surfaces as $i => $surface)
				<tr>
					<x-table.td>{{ $i + 1 }}</x-table.td>
					<x-table.td>{{ $surface->description_surface }}</x-table.td>
					<x-table.td>{{ $surface->surface }}</x-table.td>
					<x-table.td>{{ $surface->trasm_ante }}</x-table.td>
					<x-table.td>{{ $surface->trasm_post }}</x-table.td>
					<x-table.td>{{ $surface->trasm_term }}</x-table.td>
					<x-table.td>{{ $surface->confine }}</x-table.td>
					<x-table.td>{{ $surface->insulation }}</x-table.td>
					<x-table.td>
						<div class="flex items-center space-x-3">
							<x-modal>
								<x-slot name="trigger">
									<x-icon name="trash" class="w-5 h-5 text-red-500 flex-shrink-0"></x-icon>
								</x-slot>
								<x-slot name="title">
									Conferma eliminazione
								</x-slot>
								Sei sicuro di voler eliminare la superficie?
								<x-slot name="footer">
									<x-link-button x-on:click="open = false">Annulla</x-link-button>
									<x-danger-button class="ml-2" wire:click="deleteSurface({{ $surface->id }})">
										Elimina
									</x-danger-button>
								</x-slot>
							</x-modal>
						</div>
					</x-table.td>
				</tr>
			@empty
				<tr>
					<x-table.td colspan="10" class="text-center">Nessuna superficie inserita</x-table.td>
				</tr>
			@endforelse
			@if($surfaces)
				<tr class="bg-gray-50">
					<x-table.td class="!py-1.5" colspan="10">
						<div class="flex items-center space-x-2">
							<div>
								<span>Totale "Coperture": </span><span class="font-semibold">{{ $surfaces->sum('surface') }} m²</span>
							</div>
							<div>
								<span>di cui realizzati SAL n.1 </span>
								<div class="inline-block w-32">
									<x-input x-on:blur="$wire.saveSurfaceSal()" wire:model.defer="sal_1" type="number"
									         class="py-1 font-bold" name="sal_1"
									         append="m²">{{ $sal_1 ?? '-' }}</x-input>
								</div>
							</div>
							<div>
								<span>SAL n.2 </span>
								<div class="inline-block w-32">
									<x-input x-on:blur="$wire.saveSurfaceSal()" wire:model.defer="sal_2" type="number"
									         class="py-1 font-bold" name="sal_2"
									         append="m²">{{ $sal_2 ?? '-' }}</x-input>
								</div>
							</div>
							<div>
								<span>SAL F. </span>
								<div class="inline-block w-32">
									<x-input x-on:blur="$wire.saveSurfaceSal()" wire:model.defer="sal_f" type="number"
									         class="py-1 font-bold" name="sal_f"
									         append="m²">{{ $sal_f ?? '-' }}</x-input>
								</div>
							</div>
						</div>
					</x-table.td>
				</tr>
			@endif
		</x-table.tbody>
	</x-table.table>
</div>