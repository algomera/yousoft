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
				<x-input wire:model.defer="p_elettrica" type="number" name="p_elettrica" id="p_elettrica"
				         label="Potenza elettrica" append="kW"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="p_immessa" type="number" name="p_immessa" id="p_immessa"
				         label="Potenza immessa" append="kW"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="p_term_recuperata" type="number" name="p_term_recuperata"
				         id="p_term_recuperata" label="Potenza term. recuperata" append="kW"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="pes" type="number" name="pes" id="pes" label="PES" append="%"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="tipo_di_alimentazione" name="tipo_di_alimentazione" label="Tipo di alimentazione">
					<option value="Metano">Gas Naturale (metano)</option>
					<option value="Gpl">Gpl</option>
					<option value="Gasolio">Gasolio</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="tipo_intervento" name="tipo_intervento" label="Tipo intervento">
					<option value="Nuovo">Nuova unità</option>
					<option value="Rifacimento">Rifacimento</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="potenza_risc_suppl" type="number" name="potenza_risc_suppl" id="potenza_risc_suppl" label="Potenza risc. suppl." append="kW"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="efficienza_ns" type="number" name="efficienza_ns" id="efficienza_ns" label="Efficienza ns" append="%"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="classe_energ" name="classe_energ" label="Classe energetica">
					<option value="B">B</option>
					<option value="A">A</option>
					<option value="A+">A+</option>
					<option value="A++">A++</option>
					<option value="A+++">A+++</option>
				</x-select>
			</div>

			<div class="col-span-12 sm:col-start-1 sm:col-span-6">
				<div class="flex items-center mt-3">
					<input wire:model.defer="a_celle_a_combustibile"
					       id="a_celle_a_combustibile"
					       name="a_celle_a_combustibile" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="a_celle_a_combustibile"
					       class="ml-3 block text-sm font-medium text-gray-700">A celle a combustibile</label>
				</div>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<div class="flex items-center mt-3">
					<input wire:model.defer="riscaldatore_suppl"
					       id="riscaldatore_suppl"
					       name="riscaldatore_suppl" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="riscaldatore_suppl"
					       class="ml-3 block text-sm font-medium text-gray-700">Riscaldatore suppl.</label>
				</div>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
			<x-button type="submit">Salva</x-button>
		</div>
	</form>
</x-card>