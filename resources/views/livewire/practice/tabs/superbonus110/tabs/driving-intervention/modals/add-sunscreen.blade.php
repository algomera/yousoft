<x-card class="p-4">
    <form wire:submit.prevent="save" class="space-y-5">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 sm:col-span-6">
                <x-select wire:model.defer="tipo_schermatura" name="tipo_schermatura" label="Tipo schermatura/chiusura oscurante">
                    <option value="Persiana">Persiana</option>
                    <option value="Persiana avvolgibile">Persiana avvolgibile</option>
                    <option value="Tenda o veneziana">Tenda o veneziana</option>
                    <option value="Altra schermatura solare">Altra schermatura solare</option>
                    <option value="Altra chiusura oscurante">Altra chiusura oscurante</option>
                </x-select>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-select wire:model.defer="installazione" name="installazione" label="Installazione">
                    <option value="Interna">Interna</option>
                    <option value="Esterna">Esterna</option>
                </x-select>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="sup_schermatura" type="number" name="sup_schermatura" id="sup_schermatura"
                         label="Sup. schermatura/chiusura oscurante" append="m²"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="sup_finestra_protetta" type="number" name="sup_finestra_protetta" id="sup_finestra_protetta"
                         label="Sup. finestra protetta" append="m²"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="resist_termica_suppl" type="number" name="resist_termica_suppl" id="resist_termica_suppl"
                         label="Resist. termica suppl." append="m²" hint="K/W"></x-input>
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
                <x-select wire:model.defer="tipo_di_calcolo" name="tipo_di_calcolo" label="Tipo di calcolo">
                    <option value="Dichiarato dal produttore">Dichiarato dal produttore</option>
                    <option value="Da tabella 'chiusure oscuranti'">Da tabella 'chiusure oscuranti'</option>
                    <option value="Calcolo secondo UNI EN 13125">Calcolo secondo UNI EN 13125</option>
                </x-select>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="gtot" type="number" step="0.01" min="0" max="0.35" name="gtot" id="gtot"
                         label="gTot" hint="Numero compreso tra 0 e 0.35"></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-input wire:model.defer="classe_scherm" type="text" name="classe_scherm" id="classe_scherm"
                         label="Classe Scherm."></x-input>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-select wire:model.defer="materiale_scherm" name="materiale_scherm" label="Materiale scherm.">
                    <option value="Tessuto">Tessuto</option>
                    <option value="Legno">Legno</option>
                    <option value="Plastica">Plastica</option>
                    <option value="PVC">PVC</option>
                    <option value="Metallo">Metallo</option>
                    <option value="Misto">Misto</option>
                    <option value="Altro">Altro</option>
                </x-select>
            </div>
            <div class="col-span-12 sm:col-span-6">
                <x-select wire:model.defer="meccanismo_reg" name="meccanismo_reg" label="Meccanismo reg.">
                    <option value="Manuale">Manuale</option>
                    <option value="Automatico">Automatico</option>
                    <option value="Servoassistito">Servoassistito</option>
                </x-select>
            </div>
        </div>
        <div class="flex justify-end space-x-3">
            <x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
            <x-button type="submit">Salva</x-button>
        </div>
    </form>
</x-card>