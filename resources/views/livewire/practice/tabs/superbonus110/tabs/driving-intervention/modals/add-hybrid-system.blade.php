<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-12 gap-4">
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="tipo_sostituito" name="tipo_sostituito" label="Tipo sostituito">
					<option value="Caldaia standard">Caldaia standard</option>
					<option value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
					<option value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
					<option value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
					<option value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
					<option value="Generatori di aria calda">Generatori di aria calda</option>
					<option value="Teleriscaldamento">Teleriscaldamento</option>
					<option value="Impianto a biomassa">Impianto a biomassa</option>
					<option value="Altro">Altro</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="p_nom_sostituito" type="text" name="p_nom_sostituito" id="p_nom_sostituito" label="P. nom. sostituito" append="kW"></x-input>
			</div>
			<div class="col-span-12 relative">
				<div class="absolute inset-0 flex items-center" aria-hidden="true">
					<div class="w-full border-t border-gray-300"></div>
				</div>
				<div class="relative flex justify-start">
					<span class="pr-2 bg-white text-sm text-gray-500">Caldaia a condensazione (CC)</span>
				</div>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="condensing_potenza_nominale" type="text" name="condensing_potenza_nominale" id="condensing_potenza_nominale" label="Potenza nominale" append="kW"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="condensing_rend_utile_nom" type="text" name="condensing_rend_utile_nom" id="condensing_rend_utile_nom" label="Rend. utile nom." append="%"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="condensing_efficienza_ns" type="text" name="condensing_efficienza_ns" id="condensing_efficienza_ns" label="Efficienza ns" append="%"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="tipo_di_alimentazione" name="tipo_di_alimentazione" label="Tipo di alimentazione">
					<option value="Metano">Gas Naturale (metano)</option>
					<option value="Gpl">Gpl</option>
					<option value="Gasolio">Gasolio</option>
				</x-select>
			</div>
			<div class="col-span-12 relative">
				<div class="absolute inset-0 flex items-center" aria-hidden="true">
					<div class="w-full border-t border-gray-300"></div>
				</div>
				<div class="relative flex justify-start">
					<span class="pr-2 bg-white text-sm text-gray-500">Pompa di calore (PDC)</span>
				</div>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="heat_tipo_di_pdc" name="heat_tipo_di_pdc" label="Tipo di PDC">
					<option value="Aria/Aria">Aria/Aria</option>
					<option value="Aria/Acqua">Aria/Acqua</option>
					<option value="Salamoia/Aria">Salamoia/Aria</option>
					<option value="Salamoia/Acqua">Salamoia/Acqua</option>
					<option value="Acqua/Aria">Acqua/Aria</option>
					<option value="Acqua/Acqua">Acqua/Acqua</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="heat_potenza_nominale" type="text" name="heat_potenza_nominale" id="heat_potenza_nominale"
				         label="Potenza nominale" append="kW"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="heat_p_elettrica_assorbita" type="text" name="heat_p_elettrica_assorbita"
				         id="heat_p_elettrica_assorbita" label="Potenza elettrica assorbita" append="kW"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="heat_cop" type="text" name="heat_cop" id="heat_cop" label="COP"></x-input>
			</div>
			<div class="col-span-12 sm:col-start-1 sm:col-span-6">
				<div class="flex items-center mt-3">
					<input wire:model.defer="heat_tipo_roof_top"
					       id="heat_tipo_roof_top"
					       name="heat_tipo_roof_top" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="heat_tipo_roof_top"
					       class="ml-3 block text-sm font-medium text-gray-700">Tipo Roof Top</label>
				</div>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<div class="flex items-center mt-3">
					<input wire:model.defer="heat_sonde_geotermiche"
					       id="heat_sonde_geotermiche"
					       name="heat_sonde_geotermiche" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="heat_sonde_geotermiche"
					       class="ml-3 block text-sm font-medium text-gray-700">Sonde geotermiche</label>
				</div>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<div class="flex items-center mt-3">
					<input wire:model.defer="heat_inverter"
					       id="heat_inverter"
					       name="heat_inverter" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="heat_inverter"
					       class="ml-3 block text-sm font-medium text-gray-700">Inverter</label>
				</div>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
			<x-button type="submit">Salva</x-button>
		</div>
	</form>
</x-card>