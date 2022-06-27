<x-slot name="header">
	<x-page-header>
		Pratiche
		<x-slot name="subtitle">
			<div class="flex items-center space-x-2 mt-1">
				<p class="text-sm text-gray-500">
					<span class="font-bold">N. pratiche:</span>
					<span>{{ $practices->count() }}</span>
				</p>
				<span class="text-gray-500">&middot;</span>
				<p class="text-sm text-gray-500">
					<span class="font-bold">Importo stimato:</span>
					<span>{{ Money::format($practices->sum('import')) }}</span>
				</p>
				<span class="text-gray-500">&middot;</span>
				<p class="text-sm text-gray-500">
					<span class="font-bold">SAL 1:</span>
					<span>{{ Money::format($practices->sum('sal_1_import')) }}</span>
				</p>
				<span class="text-gray-500">&middot;</span>
				<p class="text-sm text-gray-500">
					<span class="font-bold">SAL 2:</span>
					<span>{{ Money::format($practices->sum('sal_2_import')) }}</span>
				</p>
				<span class="text-gray-500">&middot;</span>
				<p class="text-sm text-gray-500">
					<span class="font-bold">SAL F:</span>
					<span>{{ Money::format($practices->sum('sal_f_import')) }}</span>
				</p>
			</div>
		</x-slot>
	</x-page-header>
</x-slot>
<x-card>
	<x-card class="hidden border rounded-md p-4 sm:block">
		<div>
			<form action="" method="GET">
				<div class="flex items-end space-x-4 mb-2">
					<x-select name="practical_month" id="practical_month" label="Mese" class="w-28">
						<option value="">Tutti</option>
						<option value="01" {{ request()->get('practical_month') === '01' ? 'selected' : '' }}>
							Gennaio
						</option>
						<option value="02" {{ request()->get('practical_month') === '02' ? 'selected' : '' }}>
							Febbario
						</option>
						<option value="03" {{ request()->get('practical_month') === '03' ? 'selected' : '' }}>
							Marzo
						</option>
						<option value="04" {{ request()->get('practical_month') === '04' ? 'selected' : '' }}>
							Aprile
						</option>
						<option value="05" {{ request()->get('practical_month') === '05' ? 'selected' : '' }}>
							Maggio
						</option>
						<option value="06" {{ request()->get('practical_month') === '06' ? 'selected' : '' }}>
							Giugno
						</option>
						<option value="07" {{ request()->get('practical_month') === '07' ? 'selected' : '' }}>
							Luglio
						</option>
						<option value="08" {{ request()->get('practical_month') === '08' ? 'selected' : '' }}>
							Agosto
						</option>
						<option value="09" {{ request()->get('practical_month') === '09' ? 'selected' : '' }}>
							Settembre
						</option>
						<option value="10" {{ request()->get('practical_month') === '10' ? 'selected' : '' }}>
							Ottobre
						</option>
						<option value="11" {{ request()->get('practical_month') === '11' ? 'selected' : '' }}>
							Novembre
						</option>
						<option value="12" {{ request()->get('practical_month') === '12' ? 'selected' : '' }}>
							Dicembre
						</option>
					</x-select>
					<x-select name="practical_phase" id="practical_phase" label="Fase pratica">
						<option value="">Tutte</option>
						<option value="Nessuna" {{ request()->get('practical_phase') === 'Nessuna' ? 'selected' : '' }}>
							Nessuna
						</option>
						<option value="In istruttoria" {{ request()->get('practical_phase') === 'In istruttoria' ? 'selected' : '' }}>
							In istruttoria
						</option>
						<option value="In progettazione" {{ request()->get('practical_phase') === 'In progettazione' ? 'selected' : '' }}>
							In progettazione
						</option>
						<option value="In offertazione" {{ request()->get('practical_phase') === 'In offertazione' ? 'selected' : '' }}>
							In offertazione
						</option>
						<option value="In contrattualizzazione lavoro" {{ request()->get('practical_phase') === 'In contrattualizzazione lavoro' ? 'selected' : '' }}>
							In contrattualizzazione lavoro
						</option>
						<option value="In contrattualizazione cessione/finanziamento" {{ request()->get('practical_phase') === 'In contrattualizazione cessione/finanziamento' ? 'selected' : '' }}>
							In contrattualizazione cessione/finanziamento
						</option>
						<option value="Contrattualizzato" {{ request()->get('practical_phase') === 'Contrattualizzato' ? 'selected' : '' }}>
							Contrattualizzato
						</option>
						<option value="In fatturazione" {{ request()->get('practical_phase') === 'In fatturazione' ? 'selected' : '' }}>
							In fatturazione
						</option>
						<option value="In pagamento" {{ request()->get('practical_phase') === 'In pagamento' ? 'selected' : '' }}>
							In pagamento
						</option>
						<option value="Operazione terminata con successo" {{ request()->get('practical_phase') === 'Operazione terminata con successo' ? 'selected' : '' }}>
							Operazione terminata con successo
						</option>
						<option value="Operazione rinunciata" {{ request()->get('practical_phase') === 'Operazione rinunciata' ? 'selected' : '' }}>
							Operazione rinunciata
						</option>
					</x-select>
					<div class="w-full max-w-3xl">
						<x-input type="text" name="practical_description" id="practical_description"
						         label="Descrizione"></x-input>
					</div>
					<x-input type="text" name="practical_number" id="practical_number" label="N. Pratica"></x-input>
					<x-button>Ricerca</x-button>
				</div>
			</form>
		</div>

		@can('create_practices')
			<x-button wire:click="createPractice" wire:loading.attr="disabled" prepend="plus" iconColor="text-white">
				Nuova
			</x-button>
			<div wire:loading wire:target="createPractice" class="ml-2">
				<span class="text-sm text-gray-400">Caricamento..</span>
			</div>
		@endcan
	</x-card>
	<x-table.table>
		<x-table.thead>
			<tr>
				<x-table.th>Piattaforma</x-table.th>
				<x-table.th>Pratica</x-table.th>
				<x-table.th>Data</x-table.th>
				<x-table.th>Denominazione</x-table.th>
				<x-table.th>Fase</x-table.th>
				<x-table.th>Mese lav. 110%</x-table.th>
				<x-table.th>Lista incentivi</x-table.th>
				<x-table.th>Richiedente</x-table.th>
				<x-table.th>Importo stimato</x-table.th>
				<x-table.th></x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@forelse ($practices as $practice)
				<tr @if($practice->applicant->company_name == '' || $practice->policy_name == '' ) class="new_practice" @endif>
					<x-table.td>{{$practice->applicant->user->user_data->name}}</x-table.td>
					<x-table.td>{{$practice->id}}</x-table.td>
					<x-table.td>{{ date('d/m/Y', strtotime($practice->created_at)) }}</x-table.td>
					<x-table.td>{{$practice->policy_name}}</x-table.td>
					<x-table.td>{{$practice->practical_phase}}</x-table.td>
					<x-table.td>{{$practice->month_processing}}</x-table.td>
					<x-table.td>{{$practice->bonus}}</x-table.td>
					<x-table.td>{{$practice->applicant->company_name}}</x-table.td>
					<x-table.td>{{Money::format($practice->import) ?? '-'}}</x-table.td>
					<x-table.td>
						<div class="flex items-center space-x-3">
							@can('read_practices')
								<a href="{{route('practice.edit', $practice) }}"
								   class="text-indigo-600 hover:text-indigo-900">
									<x-icon name="pencil-alt" class="w-5 h-5"></x-icon>
								</a>
							@endcan

							@can('delete_practices')
								<x-modal>
									<x-slot name="trigger">
										<div class="text-red-600 hover:text-red-900">
											<x-icon name="trash" class="w-5 h-5"></x-icon>
										</div>
									</x-slot>
									<x-slot name="title">
										Conferma eliminazione
									</x-slot>
									Sei sicuro di voler eliminare la pratica n. {{ $practice->id }}?
									<x-slot name="footer">
										<x-link-button x-on:click="open = false">Annulla</x-link-button>
										<x-danger-button class="ml-2" wire:click="deletePractice({{ $practice->id }})"
										                 wire:loading.attr="disabled">
											Elimina
										</x-danger-button>
									</x-slot>
								</x-modal>
							@endcan
							@can('download_computo')
								{{-- TODO: Visualizza solo se c'è il computo metrico --}}
								<a href="#"
								   class="text-indigo-600 hover:text-indigo-900">
									<x-icon name="download" class="w-5 h-5"></x-icon>
								</a>
							@endcan
						</div>
					</x-table.td>
				</tr>
			@empty
				<tr>
					<x-table.td colspan="10" class="text-center text-gray-500 py-4">Nessun risultato</x-table.td>
				</tr>
			@endforelse
		</x-table.tbody>
	</x-table.table>
</x-card>

@push('notifications')
	<x-notification/>
@endpush