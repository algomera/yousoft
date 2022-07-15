<div class="p-4">
	<div class="px-4 py-5 sm:px-6">
		<h3 class="text-lg leading-6 font-medium text-gray-900">Informazioni Pratica</h3>
	</div>
	<div class="border-t border-gray-200 px-4 py-5 sm:p-0">
		<dl class="sm:divide-y sm:divide-gray-200">
			<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
				<dt class="text-sm font-medium text-gray-500">Condominio</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $practice->building->condominio }}</dd>
			</div>
			<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
				<dt class="text-sm font-medium text-gray-500">Indirizzo</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $practice->address }}
					, {{ $practice->civic }} - {{ $practice->cap }} {{ $practice->common }} ({{ $practice->province }})
				</dd>
			</div>
			<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
				<dt class="text-sm font-medium text-gray-500">Data inizio lavori</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ \Carbon\Carbon::parse($practice->work_start)->translatedFormat('d F Y') }}</dd>
			</div>
			<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
				<dt class="text-sm font-medium text-gray-500">Importo totale</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ \App\Helpers\Money::format($practice->import) }}</dd>
			</div>
			<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
				<dt class="text-sm font-medium text-gray-500">SALs</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 grid grid-cols-3 gap-3">
					<div class="flex flex-col items-start space-y-1">
						<span class="text-gray-500 font-medium">SAL 1</span>
						<span>{{ \App\Helpers\Money::format($practice->sal_1_import) }}</span>
					</div>
					<div class="flex flex-col items-start space-y-1">
						<span class="text-gray-500 font-medium">SAL 2</span>
						<span>{{ \App\Helpers\Money::format($practice->sal_2_import) }}</span>
					</div>
					<div class="flex flex-col items-start space-y-1">
						<span class="text-gray-500 font-medium">SAL F</span>
						<span>{{ \App\Helpers\Money::format($practice->sal_f_import) }}</span>
					</div>
				</dd>
			</div>
			<div class="py-4 sm:py-5 flex flex-col space-y-3 items-stretch md:flex-row md:space-y-0 md:items-start justify-between">
				@can('downloadComputo', $practice)
					<x-button class="justify-center" prepend="download" iconColor="text-white">Scarica Computo</x-button>
				@endcan
				@can('view', $practice)
					<x-button class="justify-center" append="arrow-right" iconColor="text-white" wire:click="goToPractice">Vai alla pratica</x-button>
				@endcan
			</div>
		</dl>
	</div>
</div>