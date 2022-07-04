<x-card class="space-y-5 border p-4 rounded-md">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="space-y-3">
			<div class="flex items-center">
				<input wire:model="variant.sal_2_request_variant"
				       id="sal_2_request_variant"
				       name="sal_2_request_variant" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="sal_2_request_variant"
				       class="ml-3 block text-sm font-bold text-gray-700">Richiesi variante a SAL 2</label>
			</div>
			<div class="ml-3 space-y-3">
				<div class="flex items-center">
					<input wire:model="variant.sal_2_technical_relation"
					       id="sal_2_technical_relation"
					       name="sal_2_technical_relation" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="sal_2_technical_relation"
					       class="ml-3 block text-sm font-medium text-gray-700">Relazione tecnica prevista dall'art. 28
						della legge 10/91 e dall'art. 8 comma 1 del D.lgs 192/05 e s.m.a.</label>
				</div>
				<div>
					<x-label>è stata depositata nell'ufficio competente:</x-label>
					<div class="grid grid-cols-4 gap-4">
						<div class="w-full mb-1">
							<x-input wire:model.defer="variant.sal_2_common" type="text"
							         name="sal_2_common"
							         id="sal_2_common" label="Comune"></x-input>
						</div>
						<div class="w-full mb-1">
							<x-input wire:model.defer="variant.sal_2_province" type="text"
							         name="sal_2_province"
							         id="sal_2_province" label="Prov."></x-input>
						</div>
						<div class="w-full mb-1">
							<x-input wire:model.defer="variant.sal_2_date" type="date"
							         name="sal_2_date"
							         id="sal_2_date" label="In data"></x-input>
						</div>
						<div class="w-full mb-1">
							<x-input wire:model.defer="variant.sal_2_protocol_number" type="text"
							         name="sal_2_protocol_number"
							         id="sal_2_protocol_number" label="N. protocollo"></x-input>
						</div>
					</div>
				</div>
				<div class="flex items-center">
					<input wire:model="variant.sal_2_APE_post_conventional"
					       id="sal_2_APE_post_conventional"
					       name="sal_2_APE_post_conventional" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="sal_2_APE_post_conventional"
					       class="ml-3 block text-sm font-medium text-gray-700">APE post convenzionale</label>
				</div>
				<div class="flex items-center">
					<input wire:model="variant.sal_2_superbonus_variations"
					       id="sal_2_superbonus_variations"
					       name="sal_2_superbonus_variations" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="sal_2_superbonus_variations"
					       class="ml-3 block text-sm font-medium text-gray-700">Variazioni dati Superbonus 110% (Interventi trainanti, trainati e computo metrico)</label>
				</div>
				<x-label class="font-bold underline">Descrizione DETTAGLIATA delle variazioni</x-label>
				<x-textarea wire:model.defer="variant.sal_2_driving_interventions" name="sal_2_driving_interventions" id="sal_2_driving_interventions" label="Interventi trainanti" rows="7"></x-textarea>
				<x-textarea wire:model.defer="variant.sal_2_towed_interventions" name="sal_2_towed_interventions" id="sal_2_towed_interventions" label="Interventi trainati" rows="7"></x-textarea>
				<x-textarea wire:model.defer="variant.sal_2_computo_metrico" name="sal_2_computo_metrico" id="sal_2_computo_metrico" label="Computo metrico" rows="7"></x-textarea>
				<div class="flex items-center">
					<input wire:model="variant.sal_2_approved_variant"
					       id="sal_2_approved_variant"
					       name="sal_2_approved_variant" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="sal_2_approved_variant"
					       class="ml-3 block text-sm font-medium text-gray-700">Variante approvata</label>
				</div>
			</div>
		</div>
		<hr>
		<div class="space-y-3">
			<div class="flex items-center">
				<input wire:model="variant.sal_f_request_variant"
				       id="sal_f_request_variant"
				       name="sal_f_request_variant" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="sal_f_request_variant"
				       class="ml-3 block text-sm font-bold text-gray-700">Richiesi variante a SAL Finale</label>
			</div>
			<div class="ml-3 space-y-3">
				<div class="flex items-center">
					<input wire:model="variant.sal_f_technical_relation"
					       id="sal_f_technical_relation"
					       name="sal_f_technical_relation" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="sal_f_technical_relation"
					       class="ml-3 block text-sm font-medium text-gray-700">Relazione tecnica prevista dall'art. 28
						della legge 10/91 e dall'art. 8 comma 1 del D.lgs 192/05 e s.m.a.</label>
				</div>
				<div>
					<x-label>è stata depositata nell'ufficio competente:</x-label>
					<div class="grid grid-cols-4 gap-4">
						<div class="w-full mb-1">
							<x-input wire:model.defer="variant.sal_f_common" type="text"
							         name="sal_f_common"
							         id="sal_f_common" label="Comune"></x-input>
						</div>
						<div class="w-full mb-1">
							<x-input wire:model.defer="variant.sal_f_province" type="text"
							         name="sal_f_province"
							         id="sal_f_province" label="Prov."></x-input>
						</div>
						<div class="w-full mb-1">
							<x-input wire:model.defer="variant.sal_f_date" type="date"
							         name="sal_f_date"
							         id="sal_f_date" label="In data"></x-input>
						</div>
						<div class="w-full mb-1">
							<x-input wire:model.defer="variant.sal_f_protocol_number" type="text"
							         name="sal_f_protocol_number"
							         id="sal_f_protocol_number" label="N. protocollo"></x-input>
						</div>
					</div>
				</div>
				<div class="flex items-center">
					<input wire:model="variant.sal_f_APE_post_conventional"
					       id="sal_f_APE_post_conventional"
					       name="sal_f_APE_post_conventional" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="sal_f_APE_post_conventional"
					       class="ml-3 block text-sm font-medium text-gray-700">APE post convenzionale</label>
				</div>
				<div class="flex items-center">
					<input wire:model="variant.sal_f_superbonus_variations"
					       id="sal_f_superbonus_variations"
					       name="sal_f_superbonus_variations" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="sal_f_superbonus_variations"
					       class="ml-3 block text-sm font-medium text-gray-700">Variazioni dati Superbonus 110% (Interventi trainanti, trainati e computo metrico)</label>
				</div>
				<x-label class="font-bold underline">Descrizione DETTAGLIATA delle variazioni</x-label>
				<x-textarea wire:model.defer="variant.sal_f_driving_interventions" name="sal_f_driving_interventions" id="sal_f_driving_interventions" label="Interventi trainanti" rows="7"></x-textarea>
				<x-textarea wire:model.defer="variant.sal_f_towed_interventions" name="sal_f_towed_interventions" id="sal_f_towed_interventions" label="Interventi trainati" rows="7"></x-textarea>
				<x-textarea wire:model.defer="variant.sal_f_computo_metrico" name="sal_f_computo_metrico" id="sal_f_computo_metrico" label="Computo metrico" rows="7"></x-textarea>
				<div class="flex items-center">
					<input wire:model="variant.sal_f_approved_variant"
					       id="sal_f_approved_variant"
					       name="sal_f_approved_variant" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="sal_f_approved_variant"
					       class="ml-3 block text-sm font-medium text-gray-700">Variante approvata</label>
				</div>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
			<x-button>Salva</x-button>
		</div>
	</form>
</x-card>