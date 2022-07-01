<x-app-layout>
	<x-slot name="header">
		<x-page-header>
			Dashboard
		</x-page-header>
	</x-slot>
	<x-card>
		<div>
			<h3 class="text-lg leading-6 font-medium text-gray-900">Statistiche:</h3>
			<dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
				<div class="px-4 py-5 bg-[#aed36e] rounded-lg overflow-hidden sm:p-6">
					<dt class="text-sm font-medium text-white truncate">Pratiche</dt>
					<dd class="mt-1 text-3xl font-semibold text-white">{{ $data['total_practices'] }}</dd>
				</div>

				<div class="px-4 py-5 bg-[#ba5663] rounded-lg overflow-hidden sm:p-6">
					<dt class="text-sm font-medium text-white truncate">Imprese Iscritte</dt>
					<dd class="mt-1 text-3xl font-semibold text-white">{{ $data['total_business'] }}</dd>
				</div>

				<div class="px-4 py-5 bg-[#141d4a] rounded-lg overflow-hidden sm:p-6">
					<dt class="text-sm font-medium text-white truncate">Importo Totale</dt>
					<dd class="mt-1 text-3xl font-semibold text-white">{{ Money::format($data['total_import']) }}</dd>
				</div>

			</dl>
		</div>
		<hr>
		<div>
			<h3 class="text-lg leading-6 font-medium text-gray-900">Totali SAL:</h3>
			<dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
				<div class="px-4 py-5 bg-[#6a9ac2] rounded-lg overflow-hidden sm:p-6">
					<dt class="text-sm font-medium text-white truncate">SAL 1</dt>
					<dd class="mt-1 text-3xl font-semibold text-white">{{ Money::format($data['total_sal_1_import']) }}</dd>
				</div>

				<div class="px-4 py-5 bg-[#6a9ac2] rounded-lg overflow-hidden sm:p-6">
					<dt class="text-sm font-medium text-white truncate">SAL 2</dt>
					<dd class="mt-1 text-3xl font-semibold text-white">{{ Money::format($data['total_sal_2_import']) }}</dd>
				</div>

				<div class="px-4 py-5 bg-[#6a9ac2] rounded-lg overflow-hidden sm:p-6">
					<dt class="text-sm font-medium text-white truncate">SAL Finale</dt>
					<dd class="mt-1 text-3xl font-semibold text-white">{{ Money::format($data['total_sal_f_import']) }}</dd>
				</div>
			</dl>
		</div>
		<hr>
		<div>
			<h3 class="text-lg leading-6 font-medium text-gray-900">Resoconto anno {{ date('Y') }}:</h3>
			<x-table.table class="mt-5">
				<x-table.thead>
					<tr>
						<x-table.th>Mese</x-table.th>
						<x-table.th>SAL 1</x-table.th>
						<x-table.th>SAL 2</x-table.th>
						<x-table.th>SAL Finale</x-table.th>
					</tr>
				</x-table.thead>
				<x-table.tbody>
					@foreach($data['months'] as $m => $month)
						<tr class="{{ date('m') === $m ? 'font-bold' : '' }} {{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
							<x-table.td>{{ $month }}</x-table.td>
							<x-table.td>{{ Money::format(\App\Practice::where('sal_1_work_start', date('Y').'-'.$m)->sum('sal_1_import')) }}</x-table.td>
							<x-table.td>{{ Money::format(\App\Practice::where('sal_2_work_start', date('Y').'-'.$m)->sum('sal_2_import')) }}</x-table.td>
							<x-table.td>{{ Money::format(\App\Practice::where('sal_f_work_start', date('Y').'-'.$m)->sum('sal_f_import')) }}</x-table.td>
						</tr>
					@endforeach
				</x-table.tbody>
			</x-table.table>
		</div>
		<hr>
		<div>
			<h3 class="text-lg leading-6 font-medium text-gray-900">Resoconto per regione:</h3>
			<x-table.table class="mt-5">
				<x-table.thead>
					<tr>
						<x-table.th>Regione</x-table.th>
						<x-table.th>N. pratiche</x-table.th>
						<x-table.th>SAL 1</x-table.th>
						<x-table.th>SAL 2</x-table.th>
						<x-table.th>SAL Finale</x-table.th>
					</tr>
				</x-table.thead>
				<x-table.tbody>
					@foreach($data['regions'] as $region)
						<tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
							<x-table.td>{{ $region }}</x-table.td>
							<x-table.td>{{ \App\Practice::where('region', $region)->count() }}</x-table.td>
							<x-table.td>{{ Money::format(\App\Practice::where('region', $region)->sum('sal_1_import')) }}</x-table.td>
							<x-table.td>{{ Money::format(\App\Practice::where('region', $region)->sum('sal_2_import')) }}</x-table.td>
							<x-table.td>{{ Money::format(\App\Practice::where('region', $region)->sum('sal_f_import')) }}</x-table.td>
						</tr>
					@endforeach
				</x-table.tbody>
			</x-table.table>
		</div>
	</x-card>
</x-app-layout>