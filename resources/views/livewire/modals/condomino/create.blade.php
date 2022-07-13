<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
			<div class="sm:col-span-6">
				<x-input wire:model.defer="name" type="text" name="name" id="name"
				         label="Nome/Ragione Sociale" required required></x-input>
			</div>
			<div class="sm:col-span-6">
				<x-input wire:model.defer="surname" type="text" name="surname" id="surname"
				         label="Cognome" required required></x-input>
			</div>
			<div class="sm:col-span-6">
				<x-input x-mask="9999999999" wire:model.defer="phone" type="text" name="phone" id="phone"
				         label="Telefono" required></x-input>
			</div>
			<div class="sm:col-span-6">
				<x-input wire:model.defer="email" type="email" name="email" id="email"
				         label="Email" required></x-input>
			</div>
			<div class="sm:col-span-12">
				<x-input x-mask="aaaaaa99a99a999a" wire:model.defer="cf" type="text" name="cf" id="cf"
				         label="Codice Fiscale" required required></x-input>
			</div>
			<div class="sm:col-span-4">
				<x-input wire:model.defer="millesimi_inv" type="number" name="millesimi_inv" id="millesimi_inv"
				         label="Millesimi" required></x-input>
			</div>
			<div class="sm:col-span-4">
				<x-input wire:model.defer="foglio" type="number" step="1" name="foglio" id="foglio"
				         label="Foglio" required></x-input>
			</div>
			<div class="sm:col-span-4">
				<x-input wire:model.defer="part" type="number" step="1" name="part" id="part"
				         label="Part." required></x-input>
			</div>
			<div class="sm:col-span-4">
				<x-input wire:model.defer="sub" type="text" name="sub" id="sub"
				         label="Sub." required></x-input>
			</div>
			<div class="sm:col-span-4">
				<x-select wire:model.defer="categ_catastale" name="categ_catastale" label="Cat. Catastale"
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
			<div class="sm:col-span-4">
				<x-input wire:model.defer="sup_catastale" type="number" name="sup_catastale" id="sup_catastale"
				         label="Sup. Catastale" append="m²" required></x-input>
			</div>
			<div class="sm:col-span-12">
				<div class="flex items-center">
					<input wire:model="comproprietari" name="comproprietari" id="comproprietari"
					       type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="comproprietari"
					       class="ml-3 block text-sm font-medium text-gray-700 truncate">Comproprietari</label>
				</div>
			</div>
		</div>
		@can('create-condomini', $practice)
			<x-button>Salva</x-button>
		@endcan
	</form>
</x-card>
