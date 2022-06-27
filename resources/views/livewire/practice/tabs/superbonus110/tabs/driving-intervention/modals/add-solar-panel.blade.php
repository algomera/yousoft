<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-12 gap-4">
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="sup_lorda_singolo_modulo" type="number" name="sup_lorda_singolo_modulo"
				         id="sup_lorda_singolo_modulo"
				         label="Sup. lorda singolo modulo" append="m²"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="num_moduli" type="number" step="1" name="num_moduli" id="num_moduli"
				         label="N° di moduli"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="sup_totale" type="number" name="sup_totale" id="sup_totale"
				         label="Sup. totale" append="m²"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="tipo_di_collettori" name="tipo_di_collettori" label="Tipo di collettori">
					<option value="Piani vetrati">Piani vetrati</option>
					<option value="Sotto vuoto o tubi evacuati">Sotto vuoto o tubi evacuati</option>
					<option value="A concentrazione">A concentrazione</option>
					<option value="Scoperti">Scoperti</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="tipo_di_installazione" name="tipo_di_installazione"
				          label="Tipo di installazione">
					<option value="Tetto piano">Tetto piano</option>
					<option value="Tetto a falda">Tetto a falda</option>
					<option value="Altro">Altro</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="inclinazione" type="number" name="inclinazione"
				         id="inclinazione" label="Inclinazione" append="%"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="orientamento" name="orientamento" label="Orientamento">
					<option value="Nord">Nord</option>
					<option value="Nord-Est">Nord-Est</option>
					<option value="Est">Est</option>
					<option value="Sud-Est">Sud-Est</option>
					<option value="Sud">Sud</option>
					<option value="Sud-Ovest">Sud-Ovest</option>
					<option value="Ovest">Ovest</option>
					<option value="Nord-Ovest">Nord-Ovest</option>
					<option value="P-orizzontale">P-orizzontale</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="q_col_q_sol" type="number" name="q_col_q_sol"
				         id="q_col_q_sol" label="Q col/Q sol" append="kWht"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="ql" type="number" name="ql"
				         id="ql" label="QL" append="MJ"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="accumulo_in_litri" type="number" step="0.1" name="accumulo_in_litri"
				         id="accumulo_in_litri" label="Accumulo" append="L"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="destinazione_calore" name="destinazione_calore" label="Destinazione del calore">
					<option value="Acqua sanitaria">Produzione di acqua calda sanitaria</option>
					<option value="Produzione di ACS e riscaldamento ambiente">Produzione di ACS e riscaldamento ambiente</option>
					<option value="Produzione di calore di processo">Produzione di calore di processo</option>
					<option value="Riscaldamento piscine">Riscaldamento piscine</option>
					<option value="Altro">Altro</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-select wire:model.defer="tipo_impianto_integrato_o_sostituito" name="tipo_impianto_integrato_o_sostituito" label="Tipo impianto integrato o sostituito">
					<option value="Boiler elettrico">Boiler elettrico</option>
					<option value="Gas/Gasolio">Gas/Gasolio</option>
					<option value="Altro">Altro</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-start-1 sm:col-span-6">
				<div class="flex items-center mt-3">
					<input wire:model.defer="certificazione_solar_keymark"
					       id="certificazione_solar_keymark"
					       name="certificazione_solar_keymark" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="certificazione_solar_keymark"
					       class="ml-3 block text-sm font-medium text-gray-700">Certificazione Solar Keymark</label>
				</div>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-label class="text-wrap">Impianto Factory Made</x-label>
				<div class="flex items-center space-x-4">
					<div class="flex items-center space-x-1">
						<input wire:model="impianto_factory_made" type="radio" value="notDefine"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<x-label class="mb-0">N.D</x-label>
					</div>
					<div class="flex items-center space-x-1">
						<input wire:model="impianto_factory_made" type="radio" value="no"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<x-label class="mb-0">No</x-label>
					</div>
					<div class="flex items-center space-x-1">
						<input wire:model="impianto_factory_made" type="radio" value="yes"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<x-label class="mb-0">Si</x-label>
					</div>
				</div>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
			<x-button type="submit">Salva</x-button>
		</div>
	</form>
</x-card>