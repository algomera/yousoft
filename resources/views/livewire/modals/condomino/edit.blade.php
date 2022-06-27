<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-12 gap-4">
			<div class="col-span-4">
				<x-input wire:model.defer="condomino.millesimi_inv" type="number" name="millesimi_inv" id="millesimi_inv"
				         label="Millesimi" required></x-input>
			</div>
			<div class="col-span-4">
				<x-input wire:model.defer="condomino.foglio" type="number" step="1" name="foglio" id="foglio"
				         label="Foglio" required></x-input>
			</div>
			<div class="col-span-4">
				<x-input wire:model.defer="condomino.part" type="number" step="1" name="part" id="part"
				         label="Part." required></x-input>
			</div>
			<div class="col-span-4">
				<x-input wire:model.defer="condomino.sub" type="text" name="sub" id="sub"
				         label="Sub." required></x-input>
			</div>
			<div class="col-span-4">
				<x-select wire:model.defer="condomino.categ_catastale" name="categ_catastale" label="Cat. Catastale"
				          required>
					<option value="A/2">A/2</option>
					<option value="A/3">A/3</option>
					<option value="A/4">A/4</option>
					<option value="A/5">A/5</option>
					<option value="A/6">A/6</option>
					<option value="A/7">A/7</option>
					<option value="A/11">A/11</option>
					<option value="C/4">C/4 solo spogliatoi</option>
					<option value="D/6">D/6 solo spogliatoi</option>
				</x-select>
			</div>
			<div class="col-span-4">
				<x-input wire:model.defer="condomino.sup_catastale" type="number" name="sup_catastale" id="sup_catastale"
				         label="Sup. Catastale" append="m²" required></x-input>
			</div>
			<div class="col-span-12">
				<div class="flex items-center">
					<input wire:model="condomino.comproprietari" name="comproprietari" id="comproprietari"
					       type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="comproprietari"
					       class="ml-3 block text-sm font-medium text-gray-700 truncate">Comproprietari</label>
				</div>
			</div>
			{{-- Dati del beneficiario --}}
			<div class="col-span-12 relative">
				<div class="absolute inset-0 flex items-center" aria-hidden="true">
					<div class="w-full border-t border-gray-300"></div>
				</div>
				<div class="relative flex justify-start">
					<span class="pr-2 bg-white text-sm text-gray-500">Dati del beneficiario</span>
				</div>
			</div>
			<div class="col-span-6">
				<x-select wire:model.defer="condomino.type_beneficiary" name="type_beneficiary" label="Tipo di beneficiario">
					<option value="null" disabled selected>---</option>
					<option value="Persona fisica">Persona fisica</option>
					<option value="IACP">IACP</option>
					<option value="Coop. Abit a prop. Indivisa">Coop. Abit a prop. Indivisa</option>
					<option value="ONLUS">ONLUS</option>
					<option value="Ass. we società sportive">Ass. we società sportive</option>
					<option value="Altri soggetti">Altri soggetti</option>
				</x-select>
			</div>
			<div class="col-span-6">
				<x-select wire:model.defer="condomino.possession_title" name="possession_title" label="Titolo di possesso">
					<option value="null" disabled selected>---</option>
					<option value="Proprietario o comproprietario">Proprietario o comproprietario</option>
					<option value="Detentore o co-detentore">Detentore o co-detentore</option>
					<option value="Familiare convivente con il possessore o con il detentore">Familiare convivente con il possessore o con il detentore</option>
				</x-select>
			</div>
			<div class="col-span-6">
				<x-input wire:model.defer="condomino.name" type="text" name="name" id="name"
				         label="Nome/Ragione Sociale" required></x-input>
			</div>
			<div class="col-span-6">
				<x-input wire:model.defer="condomino.surname" type="text" name="surname" id="surname"
				         label="Cognome" required></x-input>
			</div>
			<div class="col-span-6">
				<x-select wire:model.defer="condomino.sex" name="sex" label="Sesso">
					<option value="null" disabled selected>---</option>
					<option value="Maschio">Maschio</option>
					<option value="Femmina">Femmina</option>
					<option value="Neutro">Neutro</option>
				</x-select>
			</div>
			<div class="col-span-6">
				<x-input wire:model.defer="condomino.date_of_birth" type="date" name="date_of_birth" id="date_of_birth"
				         label="Data di nascita"></x-input>
			</div>
			<div class="col-span-6">
				<x-select wire:model.defer="condomino.nation_of_birth" name="nation_of_birth"
				          label="Nazione di nascita">
					<option value="null" disabled selected>---</option>
					@foreach ($countries as $country)
						<option value="{{$country->name}}">{{$country->name}}</option>
					@endforeach
				</x-select>
			</div>
			<div class="col-span-6">
				<x-input wire:model.defer="condomino.common_of_birth" type="text" name="common_of_birth"
				         id="common_of_birth"
				         label="Comune di nascita"></x-input>
			</div>
			<div class="col-span-12">
				<x-input x-mask="aaaaaa99a99a999a" wire:model.defer="condomino.cf" type="text" name="cf" id="cf"
				         label="Codice Fiscale" required></x-input>
			</div>
			{{-- Dati del beneficiario --}}
			<div class="col-span-12 relative">
				<div class="absolute inset-0 flex items-center" aria-hidden="true">
					<div class="w-full border-t border-gray-300"></div>
				</div>
				<div class="relative flex justify-start">
					<span class="pr-2 bg-white text-sm text-gray-500">Dati di contatto</span>
				</div>
			</div>
			<div class="col-span-6">
				<x-input x-mask="999 9999999" wire:model.defer="condomino.phone" type="text" name="phone" id="phone"
				         label="Telefono" required></x-input>
			</div>
			<div class="col-span-6">
				<x-input wire:model.defer="condomino.email" type="email" name="email" id="email"
				         label="Email" required></x-input>
			</div>
			<div class="col-span-12 relative">
				<div class="absolute inset-0 flex items-center" aria-hidden="true">
					<div class="w-full border-t border-gray-300"></div>
				</div>
				<div class="relative flex justify-start">
					<span class="pr-2 bg-white text-sm text-gray-500">Residenza</span>
				</div>
			</div>
			<div class="col-span-12">
				<x-select wire:model.defer="condomino.country" name="country"
				          label="Nazione">
					<option value="null" disabled selected>---</option>
					@foreach ($countries as $country)
						<option value="{{$country->name}}">{{$country->name}}</option>
					@endforeach
				</x-select>
			</div>
			<div class="col-span-8">
				<x-input wire:model.defer="condomino.common" type="text" name="common"
				         id="common"
				         label="Comune"></x-input>
			</div>
			<div class="col-span-4">
				<x-input x-mask="aa" wire:model.defer="condomino.prov" type="text" name="prov"
				         id="prov"
				         class="uppercase"
				         label="Provincia"></x-input>
			</div>
			<div class="col-span-8">
				<x-input wire:model.defer="condomino.address" type="text" name="address"
				         id="address"
				         label="Indirizzo"></x-input>
			</div>
			<div class="col-span-4">
				<x-input x-mask="99999" wire:model.defer="condomino.cap" type="text" name="cap"
				         id="cap"
				         label="CAP"></x-input>
			</div>
		</div>
		<x-button>Salva</x-button>
	</form>
</x-card>
