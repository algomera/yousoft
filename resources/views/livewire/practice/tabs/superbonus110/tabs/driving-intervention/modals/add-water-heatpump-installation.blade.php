<x-card class="p-4">
    <form wire:submit.prevent="save" class="space-y-5">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                <x-select wire:model.defer="tipo_scaldacqua_sostituito" name="tipo_scaldacqua_sostituito" label="Tipo scaldacqua sostituito">
                    <option value="Boiler elettrico">Boiler elettrico</option>
                    <option value="Gas/Gasolio">Gas/Gasolio</option>
                    <option value="Altro">Altro</option>
                </x-select>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="pu_scaldacqua_sostituito" type="number" name="pu_scaldacqua_sostituito" id="pu_scaldacqua_sostituito"
                         label="Pu scaldacqua sostituito" append="kW"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="pu_scaldacqua_a_pdc" type="number" name="pu_scaldacqua_a_pdc" id="pu_scaldacqua_a_pdc"
                         label="Pu scaldacqua a PDC" append="kW"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="cop_nuovo_scaldacqua" type="number" name="cop_nuovo_scaldacqua" id="cop_nuovo_scaldacqua"
                         label="COP nuovo scaldacqua"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="capacita_accumulo" type="number" name="capacita_accumulo"
                         id="capacita_accumulo" label="Capacità accumulo" append="L"></x-input>
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
            <x-button type="submit">Salva</x-button>
        </div>
    </form>
</x-card>