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
                <x-input wire:model.defer="p_nom_sostituito" type="number" name="p_nom_sostituito" id="p_nom_sostituito" label="P. nom. sostituito" append="kW"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="potenza_nominale" type="number" name="potenza_nominale" id="potenza_nominale" label="Potenza nominale" append="kW"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="rend_utile_nom" type="number" name="rend_utile_nom" id="rend_utile_nom" label="Rend. utile nom." append="%"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-select wire:model.defer="use_destination" name="use_destination" label="Destinazione d'uso">
                    <option value="Riscaldameto ambiente">Riscaldameto ambiente</option>
                    <option value="Risc. ambiente + prod.ACS">Risc. ambiente + prod.ACS</option>
                </x-select>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="efficienza_ns" type="number" name="efficienza_ns" id="efficienza_ns" label="Efficienza ns" append="%"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="efficienza_acs_nwh" type="number" name="efficienza_acs_nwh" id="efficienza_acs_nwh" label="Efficienza ACS nwh" append="%"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-select wire:model.defer="tipo_di_alimentazione" name="tipo_di_alimentazione" label="Tipo di alimentazione">
                    <option value="Metano">Gas Naturale (metano)</option>
                    <option value="Gpl">Gpl</option>
                    <option value="Gasolio">Gasolio</option>
                </x-select>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-select wire:model.defer="classe_termo_evoluto" name="classe_termo_evoluto" label="Classe disp. termoregolazione evoluto">
                    <option value="V">V</option>
                    <option value="VI">VI</option>
                    <option value="VIII">VIII</option>
                    <option value="Nessun dispositivo">Nessun dispositivo</option>
                </x-select>
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
            <x-button type="submit">Salva</x-button>
        </div>
    </form>
</x-card>