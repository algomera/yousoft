<x-card class="space-y-0">
	<div class="flex items-center justify-between px-4 py-5 sm:px-6">
		<div>
			<h3 class="text-lg leading-6 font-medium text-gray-900">Dati Anagrafica</h3>
			<p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $anagrafica->company_name }}
				• {{ $anagrafica->subject_type }}</p>
		</div>
		<x-button wire:click="$emit('openModal', 'anagrafica.edit', {{ json_encode([$anagrafica->id]) }})">Modifica</x-button>
	</div>
	<div class="border-t border-gray-200 px-4 py-5 sm:px-6">
		<dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
			<div class="sm:col-span-1">
				<dt class="text-sm font-medium text-gray-500">Full name</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $anagrafica->first_name }} {{ $anagrafica->last_name }}</dd>
			</div>
			<div class="sm:col-span-1">
				<dt class="text-sm font-medium text-gray-500">Indirizzo</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
					@isset($anagrafica->address)
						{{ $anagrafica->address }} -
					@endisset
					@isset($anagrafica->cap)
						{{ $anagrafica->cap }}
					@endisset
					@isset($anagrafica->city)
						{{ $anagrafica->city }}
					@endisset
					@isset($anagrafica->province)
						<span class="uppercase">({{ $anagrafica->province }})</span>
					@endisset
				</dd>
			</div>
			<div class="sm:col-span-2">
				<dt class="text-sm font-medium text-gray-500">IBAN</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 uppercase">{{ $anagrafica->iban ?: '-' }}</dd>
			</div>
			<div class="sm:col-span-1">
				<dt class="text-sm font-medium text-gray-500">P.IVA</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 uppercase">{{ $anagrafica->vat ?: '-' }}</dd>
			</div>
			<div class="sm:col-span-1">
				<dt class="text-sm font-medium text-gray-500">Codice Fiscale</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 uppercase">{{ $anagrafica->fiscal_code ?: '-' }}</dd>
			</div>
			<div class="sm:col-span-1">
				<dt class="text-sm font-medium text-gray-500">Telefono</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $anagrafica->phone ?: '-' }}</dd>
			</div>
			<div class="sm:col-span-1">
				<dt class="text-sm font-medium text-gray-500">Fax</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $anagrafica->fax ?: '-' }}</dd>
			</div>
			<div class="sm:col-span-1">
				<dt class="text-sm font-medium text-gray-500">E-mail</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $anagrafica->email ?: '-' }}</dd>
			</div>
			<div class="sm:col-span-1">
				<dt class="text-sm font-medium text-gray-500">E-mail PEC</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $anagrafica->email_pec ?: '-' }}</dd>
			</div>
			<div class="sm:col-span-2">
				<dt class="text-sm font-medium text-gray-500">Dati di nascita</dt>
				<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
					@isset($anagrafica->date_of_birth)
						{{ date('d/m/Y', strtotime($anagrafica->date_of_birth)) }} -
						{{ $anagrafica->common_of_birth }}
						({{ $anagrafica->province_of_birth }})
					@else
						{{ '-' }}
					@endisset
				</dd>
			</div>
		</dl>
	</div>
</x-card>
