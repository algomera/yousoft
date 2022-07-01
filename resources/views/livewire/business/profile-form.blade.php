<form wire:submit.prevent="save" class="space-y-5">
	<div class="grid grid-cols-1 gap-4">
		<x-input wire:model.defer="type" id="type" type="text" name="type" required label="Ragione Sociale"></x-input>
		<x-input wire:model.defer="p_iva" id="p_iva" type="text" name="p_iva" required label="Partita IVA"></x-input>
		<x-input x-mask="aaaaaa99a99a999a" wire:model.defer="c_f" id="c_f" class="uppercase" type="text" name="c_f" required label="Codice Fiscale"></x-input>
		<x-input wire:model.defer="legal_form" id="legal_form" type="text" name="legal_form" required label="Forma legale"></x-input>
		<x-input wire:model.defer="rea" id="rea" type="text" name="rea" required label="CCIAA + REA"></x-input>
		<x-input wire:model.defer="c_ateco" id="c_ateco" type="text" name="c_ateco" required label="Codice Ateco"></x-input>
		<x-input wire:model.defer="reg_date" id="reg_date" type="date" name="reg_date" required label="Data registrazione"></x-input>
	</div>

	<x-button>Salva</x-button>
</form>

@push('notifications')
	<x-notification />
@endpush