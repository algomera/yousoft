<x-card class="p-4">
    <form wire:submit.prevent="save" class="space-y-5">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                <x-select wire:model.defer="generator_type" name="generator_type" label="Tipo">
                    <option value="Caldaia standard">Caldaia standard</option>
                    <option value="Caldaia a bassa temperatura">Caldaia a bassa temperatura</option>
                    <option value="Caldaia a condensazione a gas">Caldaia a condensazione a gas</option>
                    <option value="Caldaia a condesazione a gasolio">Caldaia a condesazione a gasolio</option>
                    <option value="Pompa di calore anche con sonda geotermica">Pompa di calore anche con sonda geotermica</option>
                    <option value="Generatori di aria calda">Generatori di aria calda</option>
                    <option value="Teleriscaldamento (solo in caso di distacco obbligato)">Teleriscaldamento (solo in caso di distacco obbligato)</option>
                    <option value="Impianto a biomassa">Impianto a biomassa</option>
                    <option value="Altro">Altro</option>
                </x-select>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="generator_number" type="number" step="1" name="generator_number" id="generator_number" label="N° di generatori"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="performance_percentage" type="number" name="performance_percentage" id="performance_percentage" label="Rendimento al 100% della potenza" append="%"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="useful_power" type="number" name="useful_power" id="useful_power" label="Potenza utile complessiva" append="kW"></x-input>
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
            <x-button type="submit">Salva</x-button>
        </div>
    </form>
</x-card>