<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-12 gap-4">
			<div class="col-span-12">
				<x-input wire:model.defer="description_surface" type="text" name="description_surface"
				         id="description_surface" label="Descrizione"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="surface" type="number" name="surface" id="surface" label="Superficie"
				         append="m²"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="trasm_ante" type="number" name="trasm_ante" id="trasm_ante" class="!pr-14"
				         label="Trasm. ante" append="W/m²k"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="trasm_post" type="number" name="trasm_post" id="trasm_post" class="!pr-14"
				         label="Trasm. post" append="W/m²k"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="trasm_term" type="number" name="trasm_term" id="trasm_term" class="!pr-14"
				         label="Trasm. Term. Period. YIE" append="W/m²k"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="confine" type="text" name="confine" id="confine" label="Confine"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="insulation" type="text" name="insulation" id="insulation"
				         label="Coibentazione"></x-input>
			</div>
		</div>
		<div class="flex justify-end space-x-3">
			<x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
			<x-button type="submit">Salva</x-button>
		</div>
	</form>
</x-card>