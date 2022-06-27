<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-12 gap-4">
			<div class="col-span-12">
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
				<x-input wire:model.defer="p_nom_sostituito" type="number" name="p_nom_sostituito" id="p_nom_sostituito"
				         label="P. nom. sostituito" append="kW"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="classe_generatore" name="classe_generatore" label="Classe generatore">
					<option value="4 stelle">4 stelle</option>
					<option value="5 stelle">5 stelle</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="tipo_generatore" name="tipo_generatore" label="Tipo generatore">
					<option value="Caldaia a biomassa">Caldaia a biomassa</option>
					<option value="Termocamini e stufe">Termocamini e stufe</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="use_destination" name="use_destination" label="Impianto destinato a">
					<option value="Riscaldamento ambiente">Riscaldamento ambiente</option>
					<option value="Risc. amb. + prod. ACS">Risc. amb. + prod. ACS</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="tipo_di_alimentazione" name="tipo_di_alimentazione" label="Tipo di alimentazione">
					<option value="Legna">Legna</option>
					<option value="Pellet">Pellet</option>
					<option value="Cippato">Cippato</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="p_utile_nom" type="number" name="p_utile_nom"
				         id="p_utile_nom" label="Pot. utile nom." append="kW"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="p_al_focolare" type="number" name="p_al_focolare"
				         id="p_al_focolare" label="Pot. al focolare" append="kW"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="rend_utile_alla_pot_nom" type="number" name="rend_utile_alla_pot_nom"
				         id="rend_utile_alla_pot_nom" label="Rend. utile alla pot. nom." append="%"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="sup_riscaldata" type="number" name="sup_riscaldata"
				         id="sup_riscaldata" label="Sup. riscaldata" append="m²"></x-input>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
			<x-button type="submit">Salva</x-button>
		</div>
	</form>
</x-card>