<x-card class="border p-4 rounded-md">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="space-y-5">
			<x-subject_select label="General Contractor" name="general_contractor" :subject="$subject"
			                  :items="$general_contractor_list"></x-subject_select>
			<x-subject_select label="Azienda edile" name="construction_company" :subject="$subject"
			                  :items="$construction_company_list"></x-subject_select>
			<x-subject_select label="Azienda imp. idrotermosanitari" name="hydrothermal_sanitary_company"
			                  :subject="$subject" :items="$hydrothermal_sanitary_company_list"></x-subject_select>
			<x-subject_select label="Azienda imp. elettrici/fotovoltaici" name="photovoltaic_company"
			                  :subject="$subject"
			                  :items="$photovoltaic_company_list"></x-subject_select>
			<x-subject_select label="Termotecnico APE Ante" name="technician_APE_Ante" :subject="$subject"
			                  :items="$technician_APE_Ante_list"></x-subject_select>
			<x-subject_select label="Termotecnico efficient. energetico" name="technician_energy_efficient"
			                  :subject="$subject" :items="$technician_energy_efficient_list"></x-subject_select>
			<x-subject_select label="Termotecnico APE Post" name="technician_APE_Post" :subject="$subject"
			                  :items="$technician_APE_Post_list"></x-subject_select>
			<x-subject_select label="Strutturista" name="structural_engineer" :subject="$subject"
			                  :items="$structural_engineer_list"></x-subject_select>
			<x-subject_select label="Tecnico Computo Metrico" name="metric_calc_technician" :subject="$subject"
			                  :items="$metric_calc_technician_list"></x-subject_select>
			<x-subject_select label="Direttore lavori" name="work_director" :subject="$subject"
			                  :items="$work_director_list"></x-subject_select>
			<x-subject_select label="Asseveratore tecnico" name="technical_assev" :subject="$subject"
			                  :items="$technical_assev_list"></x-subject_select>
			<x-subject_select label="Asseveratore fiscale" name="fiscal_assev" :subject="$subject"
			                  :items="$fiscal_assev_list"></x-subject_select>
			<x-subject_select label="Cessionario credito fiscale" name="phiscal_transferee" :subject="$subject"
			                  :items="$phiscal_transferee_list"></x-subject_select>
			<x-subject_select label="Banca finanziatrice" name="lending_bank" :subject="$subject"
			                  :items="$lending_bank_list"></x-subject_select>
			<x-subject_select label="Assicuratore" name="insurer" :subject="$subject"
			                  :items="$insurer_list"></x-subject_select>

			<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
				<div class="sm:col-span-1">
					<x-subject_select label="Consulente" name="consultant" :subject="$subject"
					                  :items="$consultant_list"></x-subject_select>
				</div>
				<div class="sm:col-span-1">
					<x-input type="text" readonly disabled name="project_manager" id="project_manager"
					         class="bg-gray-100 text-gray-600"
					         label="Tipo di consulente"
					         value="{{ $subject->consultant ? \App\Anagrafica::find($subject->consultant)->consultant_type : null }}"></x-input>
				</div>
				<div class="sm:col-span-1">
					<x-subject_select label="Area Manager" name="area_manager" :subject="$subject"
					                  :items="$area_manager_list"></x-subject_select>
				</div>
			</div>
		</div>
		<hr>
		<div class="space-y-5">
			<x-label>Contatti dei responsabili</x-label>
			<x-input wire:model.defer="project_manager" type="text" name="project_manager" id="project_manager"
			         label="Project Manager"></x-input>
			<x-input wire:model.defer="responsible_technician" type="text" name="responsible_technician"
			         id="responsible_technician"
			         label="Responsabile Tecnico"></x-input>
		</div>
		@can('update', $practice)
			<div class="flex justify-end space-x-3">
				<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
				<x-button>Salva</x-button>
			</div>
		@endcan
	</form>
</x-card>