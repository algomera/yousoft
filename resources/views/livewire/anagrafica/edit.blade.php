<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-6 gap-6">
			<div class="col-span-6 lg:col-span-4 grid sm:grid-cols-12 gap-4">
				<div class="col-span-12">
					<x-select wire:model.defer="anagrafica.subject_type" name="subject_type" id="subject_type"
					          label="Tipologia soggetto" required>
						<option value="null" selected disabled>Seleziona..</option>
						@foreach(config('anagrafiche.subject_types') as $subject_type)
							<option value="{{ $subject_type }}">{{ $subject_type }}</option>
						@endforeach
					</x-select>
				</div>
				<div class="col-span-12">
					<x-select wire:model.defer="anagrafica.consultant_type" name="consultant_type" id="consultant_type"
					          label="Tipologia consulente">
						<option value="null" selected disabled>Seleziona..</option>
						@foreach(config('anagrafiche.consultant_types') as $consultant_type)
							<option value="{{ $consultant_type }}">{{ $consultant_type }}</option>
						@endforeach
					</x-select>
				</div>
				<div class="col-span-12">
					<x-input wire:model.defer="anagrafica.company_name" type="text" name="company_name"
					         id="company_name"
					         label="Ragione Sociale" required></x-input>
				</div>
				<div class="col-span-12 sm:col-span-6">
					<x-input wire:model.defer="anagrafica.first_name" type="text" name="first_name" id="first_name"
					         label="Nome" required></x-input>
				</div>
				<div class="col-span-12 sm:col-span-6">
					<x-input wire:model.defer="anagrafica.last_name" type="text" name="last_name" id="last_name"
					         label="Cognome" required></x-input>
				</div>
				<div class="col-span-7 sm:col-span-10">
					<x-input wire:model.defer="anagrafica.address" type="text" name="address" id="address"
					         label="Indirizzo"></x-input>
				</div>
				<div class="col-span-5 sm:col-span-2">
					<x-input x-mask="99999" wire:model.defer="anagrafica.zip" type="text" name="zip" id="zip"
					         label="CAP"></x-input>
				</div>
				<div class="col-span-7 sm:col-span-10">
					<x-input wire:model.defer="anagrafica.city" type="text" name="city" id="city"
					         label="Citt??" required></x-input>
				</div>
				<div class="col-span-5 sm:col-span-2">
					<x-input x-mask="aa" wire:model.defer="anagrafica.province" type="text" name="province"
					         id="province"
					         class="uppercase"
					         label="Provincia"></x-input>
				</div>
				<div class="col-span-12">
					<x-input x-mask="aa 99 a 99999 99999 999999999999" wire:model.defer="anagrafica.iban" type="text"
					         name="iban"
					         id="iban" class="uppercase"
					         label="IBAN"></x-input>
				</div>
				<div class="col-span-12 sm:col-span-6">
					<x-input wire:model.defer="anagrafica.vat" type="text" name="vat" id="vat"
					         label="Partita IVA"></x-input>
				</div>
				<div class="col-span-12 sm:col-span-6">
					<x-input x-mask="aaaaaa99a99a999a" wire:model.defer="anagrafica.fiscal_code" type="text"
					         name="fiscal_code"
					         id="fiscal_code" class="uppercase"
					         label="Codice Fiscale"></x-input>
				</div>
				<div class="col-span-12 sm:col-span-6">
					<x-input x-mask="999 9999999" wire:model.defer="anagrafica.phone" type="text" name="phone"
					         id="phone"
					         label="Telefono"></x-input>
				</div>
				<div class="col-span-12 sm:col-span-6">
					<x-input wire:model.defer="anagrafica.fax" type="text" name="fax" id="fax"
					         label="Fax"></x-input>
				</div>
				<div class="col-span-12 sm:col-span-6">
					<x-input wire:model.defer="anagrafica.email" type="email" name="email" id="email"
					         label="Email"></x-input>
				</div>
				<div class="col-span-12 sm:col-span-6">
					<x-input wire:model.defer="anagrafica.email_pec" type="email" name="email_pec" id="email_pec"
					         label="Email PEC"></x-input>
				</div>
				<div class="col-span-12">
					<x-input wire:model.defer="anagrafica.ticket_code" type="text" name="ticket_code" id="ticket_code"
					         label="Codice Ticket"></x-input>
				</div>
				<div class="col-span-12 sm:col-span-5">
					<x-input wire:model.defer="anagrafica.date_of_birth" type="date" name="date_of_birth"
					         id="date_of_birth"
					         label="Data di nascita"></x-input>
				</div>
				<div class="col-span-7 sm:col-span-5">
					<x-input wire:model.defer="anagrafica.common_of_birth" type="text" name="common_of_birth"
					         id="common_of_birth"
					         label="Comune di nascita"></x-input>
				</div>
				<div class="col-span-5 sm:col-span-2">
					<x-input x-mask="aa" wire:model.defer="anagrafica.province_of_birth" type="text"
					         name="province_of_birth"
					         id="province_of_birth"
					         class="uppercase"
					         label="Provincia"></x-input>
				</div>
				<x-label class="col-span-12">Estremi iscrizione albo professionisti</x-label>
				<div class="col-span-12 sm:col-span-6">
					<x-input wire:model.defer="anagrafica.order_or_college" type="text" name="order_or_college"
					         id="order_or_college"
					         label="Ordine o Collegio"></x-input>
				</div>
				<div class="col-span-6 sm:col-span-2">
					<x-input x-mask="aa" wire:model.defer="anagrafica.order_or_college_province" type="text"
					         name="order_or_college_province"
					         id="order_or_college_province"
					         class="uppercase"
					         label="Provincia"></x-input>
				</div>
				<div class="col-span-6 sm:col-span-4">
					<x-input wire:model.defer="anagrafica.order_or_college_number" type="text"
					         name="order_or_college_number"
					         id="order_or_college_number"
					         label="N. di Iscrizione"></x-input>
				</div>
			</div>
			<div class="col-span-6 lg:col-span-2">
				<x-card class="border">
					<div class="space-y-1 p-4">
						@foreach($subject_roles as $sr)
							<div class="flex items-center">
								<input wire:model="roles" name="roles[]" id="role_{{$sr->id}}"
								       {{ in_array($sr->id, $roles) ? "checked" : "" }}
								       type="checkbox"
								       value="{{ $sr->id }}"
								       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
								<label for="role_{{$sr->id}}"
								       class="ml-3 block text-sm font-medium text-gray-700 truncate">{{ $sr->name }}</label>
							</div>
						@endforeach
					</div>
				</x-card>
			</div>
		</div>
		@can('update', $anagrafica)
			<x-button>Aggiorna</x-button>
		@endcan
	</form>
</x-card>