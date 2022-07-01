<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
			<div class="sm:col-span-12">
				<x-input wire:model.defer="folder.name" type="text" name="name" id="name"
				         label="Nome" required></x-input>
			</div>
			<div class="sm:col-span-12">
				<x-select wire:model.defer="folder.type" name="type" id="type" label="Tipologia" required>
					<option value="null" selected disabled>Seleziona..</option>
					<option value="Documenti Vari">Documenti Vari</option>
					<option value="Documenti Fiscali">Documenti Fiscali</option>
				</x-select>
			</div>
		</div>

		<div class="flex justify-between space-x-3">
			<div>
				<x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
				<x-button type="submit">Salva</x-button>
			</div>
		</div>
	</form>
</x-card>