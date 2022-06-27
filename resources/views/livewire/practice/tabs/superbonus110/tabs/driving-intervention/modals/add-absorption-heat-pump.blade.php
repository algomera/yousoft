<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-12 gap-4">
			<div class="col-span-12">
				<x-select wire:model.defer="tipo_sostituito" name="tipo_sostituito" label="Tipo sostituito">
					<option value="Caldaia standard">Caldaia standard</option>
					<option value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
					<option value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
					<option value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
					<option value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda
						geotermica
					</option>
					<option value="Generatori di aria calda">Generatori di aria calda</option>
					<option value="Teleriscaldamento">Teleriscaldamento</option>
					<option value="Impianto a biomassa">Impianto a biomassa</option>
					<option value="Altro">Altro</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="p_nom_sostituito" type="number" name="p_nom_sostituito" id="p_nom_sostituito"
				         label="P. nom. sostituito" append="kW"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="tipo_di_pdc" name="tipo_di_pdc" label="Tipo di PDC">
					<option value="Aria/Aria">Aria/Aria</option>
					<option value="Aria/Acqua">Aria/Acqua</option>
					<option value="Salamoia/Aria">Salamoia/Aria</option>
					<option value="Salamoia/Acqua">Salamoia/Acqua</option>
					<option value="Acqua/Aria">Acqua/Aria</option>
					<option value="Acqua/Acqua">Acqua/Acqua</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="potenza_nominale" type="number" name="potenza_nominale" id="potenza_nominale"
				         label="Potenza nominale" append="kW"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="gueh" type="number" name="gueh"
				         id="gueh" label="GUEh"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="guec" type="number" name="guec"
				         id="guec" label="GUEc"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="sup_riscaldata_dalla_pdc" type="number" name="sup_riscaldata_dalla_pdc"
				         id="sup_riscaldata_dalla_pdc" label="Sup. riscaldata dalla PDC" append="m²"></x-input>
			</div>
			<div class="col-span-12 sm:col-start-1 sm:col-span-6">
				<div class="flex items-center mt-3">
					<input wire:model.defer="tipo_roof_top"
					       id="tipo_roof_top"
					       name="tipo_roof_top" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="tipo_roof_top"
					       class="ml-3 block text-sm font-medium text-gray-700">Tipo Roof Top</label>
				</div>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<div class="flex items-center mt-3">
					<input wire:model.defer="reversibile"
					       id="reversibile"
					       name="reversibile" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="reversibile"
					       class="ml-3 block text-sm font-medium text-gray-700">Reversibile</label>
				</div>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
			<x-button type="submit">Salva</x-button>
		</div>
	</form>
</x-card>