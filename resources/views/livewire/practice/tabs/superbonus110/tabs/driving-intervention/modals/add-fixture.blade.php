<x-card class="p-4">
    <form wire:submit.prevent="save" class="space-y-5">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="description" type="text" name="description" id="description" label="Descrizione"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="superficie" type="number" name="superficie" id="superficie" label="Superficie" append="m²"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="trasm_ante" type="number" name="trasm_ante" id="trasm_ante" label="Trasm. Ante" append="W/m²k"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="trasm_post" type="number" name="trasm_post" id="trasm_post" label="Trasm. Post" append="W/m²k"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-select wire:model.defer="telaio_prima" name="telaio_prima" label="Telaio Prima">
                    <option value="Legno">Legno</option>
                    <option value="PVC">PVC</option>
                    <option value="Metallo, taglio termico">Metallo, taglio termico</option>
                    <option value="Metallo, no taglio termico">Metallo, no taglio termico</option>
                    <option value="Misto">Misto</option>
                </x-select>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-select wire:model.defer="vetro_prima" name="vetro_prima" label="Vetro Prima">
                    <option value="Singolo">Singolo</option>
                    <option value="Doppio">Doppio</option>
                    <option value="Triplo">Triplo</option>
                    <option value="A bassa emissione">A bassa emissione</option>
                    <option value="Nessuno">Nessuno</option>
                    <option value="Policarbonato">Policarbonato</option>
                    <option value="Pannello opaco">Pannello opaco</option>
                </x-select>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-select wire:model.defer="telaio_dopo" name="telaio_dopo" label="Telaio Dopo">
                    <option value="Legno">Legno</option>
                    <option value="PVC">PVC</option>
                    <option value="Metallo, taglio termico">Metallo, taglio termico</option>
                    <option value="Metallo, no taglio termico">Metallo, no taglio termico</option>
                    <option value="Misto">Misto</option>
                </x-select>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-select wire:model.defer="vetro_dopo" name="vetro_dopo" label="Vetro Dopo">
                    <option value="Singolo">Singolo</option>
                    <option value="Doppio">Doppio</option>
                    <option value="Triplo">Triplo</option>
                    <option value="A bassa emissione">A bassa emissione</option>
                    <option value="Nessuno">Nessuno</option>
                    <option value="Policarbonato">Policarbonato</option>
                    <option value="Pannello opaco">Pannello opaco</option>
                </x-select>
            </div>
            <div class="col-span-12">
                <x-select wire:model.defer="oscurante" name="oscurante" label="Oscurante">
                    <option value="No">No</option>
                    <option value="Si">Si</option>
                </x-select>
            </div>
        </div>
        <div class="flex justify-end space-x-3">
            <x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
            <x-button type="submit">Salva</x-button>
        </div>
    </form>
</x-card>