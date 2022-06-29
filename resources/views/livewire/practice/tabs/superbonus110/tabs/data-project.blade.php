<x-card class="space-y-5 border p-4 rounded-md">
	<form wire:submit.prevent="save" class="space-y-5">
		<div>
			<x-section-heading class="pt-0 !border-t-0">Dati di Progetto</x-section-heading>
			<div class="flex flex-col py-4">
				<x-label class="text-wrap">È stata depositata la relazione tecnica prevista dall'art. 28 della legge
					10/91 e
					dall'art. 8 comma 1 del D.lgs 192/05 e successive modificazioni:
				</x-label>
				<div class="flex items-center space-x-4">
					<div class="flex items-center space-x-1">
						<input wire:model="data_project.technical_report" type="radio" value="notDefine"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<x-label class="mb-0">N.D</x-label>
					</div>
					<div class="flex items-center space-x-1">
						<input wire:model="data_project.technical_report" type="radio" value="no"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<x-label class="mb-0">No</x-label>
					</div>
					<div class="flex items-center space-x-1">
						<input wire:model="data_project.technical_report" type="radio" value="yes"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<x-label class="mb-0">Si</x-label>
					</div>
				</div>
			</div>
		</div>
		<div>
			<x-label class="col-span-12">È stata depositata nell'ufficio competente:</x-label>
			<div class="grid grid-cols-12 gap-4">
				<div class="col-span-7 sm:col-span-4">
					<x-input wire:model.defer="data_project.filed_common" type="text" name="filed_common"
					         id="filed_common" label="Comune"></x-input>
				</div>
				<div class="col-span-5 sm:col-span-2">
					<x-input x-mask="aa" wire:model.defer="data_project.filed_province" type="text"
					         name="filed_province"
					         id="filed_province" class="uppercase" label="Prov."></x-input>
				</div>
				<div class="col-span-7 sm:col-span-3">
					<x-input wire:model.defer="data_project.filed_date" type="date" name="filed_date"
					         id="filed_date"
					         label="In data"></x-input>
				</div>
				<div class="col-span-5 sm:col-span-3">
					<x-input wire:model.defer="data_project.filed_protocol" type="text" name="filed_protocol"
					         id="filed_protocol" label="Protocollo n."></x-input>
				</div>
				<div class="col-span-12">
					<div class="flex items-center mt-3">
						<input wire:model="data_project.technical_report_exclusion"
						       id="technical_report_exclusion"
						       name="technical_report_exclusion" type="checkbox"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
						<label for="technical_report_exclusion"
						       class="ml-3 block text-sm font-medium text-gray-700">Non
							è stata depositata la relazione tecnica in quanto si ricade nei casi di esclusione previsti
							dal comma 1 dell'art. 8 del D.lgs 192/05 e dal punto 2, paragrafo 2.2 dell'allegato 1 del
							decreto</label>
					</div>
				</div>
				<div class="col-span-6 sm:col-span-3">
					<x-input wire:model.defer="data_project.work_start" type="date" name="work_start"
					         id="work_start" label="Lavori iniziati in data"></x-input>
				</div>
				<div class="col-span-6 sm:col-span-3">
					<x-input wire:model.defer="data_project.end_of_works" type="date" name="end_of_works"
					         id="end_of_works" label="Lavori conclusi in data"></x-input>
				</div>
			</div>
		</div>
		<div>
			<x-label>I lavori sono eseguiti su:</x-label>
			<fieldset class="mt-2">
				<div class="sm:flex sm:items-center sm:flex-wrap">
					<div class="flex items-center sm:mr-5 mb-2">
						<input wire:model="data_project.type_building" id="condominium" name="type_building"
						       type="radio" value="condominium"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<label for="condominium" class="ml-3 block text-sm font-medium text-gray-700">Edificio
							condominiale</label>
					</div>
					<div class="flex items-center sm:mr-5 mb-2">
						<input wire:model="data_project.type_building" id="single_property" name="type_building"
						       type="radio" value="single_property"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<label for="single_property" class="ml-3 block text-sm font-medium text-gray-700">Unità
							immobiliare unifamiliare</label>
					</div>
					<div class="flex items-center sm:mr-5 mb-2">
						<input wire:model="data_project.type_building" id="multi_property" name="type_building"
						       type="radio" value="multi_property"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<label for="multi_property" class="ml-3 block text-sm font-medium text-gray-700">Unità
							immobiliare situate in edifici plurifamiliari</label>
					</div>
				</div>
			</fieldset>
			@if($data_project->type_building === 'condominium')
				<div class="grid grid-cols-12 gap-4">
					<div class="col-span-6 sm:col-span-3">
						<x-input wire:model.defer="data_project.building_unit" type="number" step="1"
						         name="building_unit"
						         id="building_unit" label="N. unità"></x-input>
					</div>
					<div class="col-span-6 sm:col-span-3">
						<x-input wire:model.defer="data_project.relevance" type="number" step="1" name="relevance"
						         id="relevance" label="N. Pertinenze"></x-input>
					</div>
					<div class="col-span-12 sm:col-span-6">
						<div class="flex items-center mt-3">
							<input wire:model.defer="data_project.centralized_system" id="centralized_system"
							       name="centralized_system" type="checkbox"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
							<label for="centralized_system" class="ml-3 block text-sm font-medium text-gray-700">Con
								impianto termico centralizzato</label>
						</div>
					</div>
				</div>
			@endif
		</div>
		<div>
			<x-label for="gross_surface_area">La superficie lorta ante lavori complessiva disperdente è pari a:
			</x-label>
			<div class="w-36">
				<x-input wire:model.defer="data_project.gross_surface_area" type="number" name="gross_surface_area"
				         id="gross_surface_area"
				         append="m²"></x-input>
			</div>
		</div>
		<div>
			<x-section-heading>Informazioni relative ai nuovi prezzi utilizzati nel computo metrico</x-section-heading>
			<div class="grid grid-cols-12 gap-4">
				<div class="col-span-12 sm:col-span-4">
					<x-input wire:model.defer="data_project.np" type="number" step="1" name="np"
					         id="np" label="N. voci NP utilizzate"></x-input>
				</div>
				<div class="col-span-12 sm:col-span-4">
					<x-label for="np_validated" class="text-green-500">Di cui da validare</x-label>
					<x-input wire:model.defer="data_project.np_validated" type="number" step="1" name="np_validated"
					         id="np_validated"></x-input>
				</div>
				<div class="col-span-12 sm:col-span-4">
					<x-label for="np_validated" class="text-red-500">Di cui ancora da validare</x-label>
					<x-input wire:model.defer="data_project.np_not_validated" type="number" step="1" name="np_not_validated"
					         id="np_not_validated"></x-input>
				</div>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
			<x-button>Salva</x-button>
		</div>
	</form>
</x-card>