<x-card class="space-y-5 border p-4 rounded-md">
	<form wire:submit.prevent="save" class="space-y-5">
		<x-section-heading class="!py-0 !border-t-0">Spese complessive e dichiarazioni</x-section-heading>
		<h3 class="text-lg font-semibold text-indigo-700">Ecobonus:</h3>

		<div class="divide-y space-y-5">
			<div class="sm:grid sm:grid-cols-3 sm:gap-4">
				<div>
					<x-label for="ecobonus_driving_cost" class="sm:col-span-1 text-sm font-medium text-gray-500">Costo complessivo
						degli
						interventi <strong class="underline">trainanti</strong> di progetto ammonta a:
					</x-label>
				</div>
				<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="fees_declarations.ecobonus_driving_cost" type="number" class="disabled:bg-gray-50"
						              name="ecobonus_driving_cost" id="ecobonus_driving_cost"></x-input-euro>
					</div>
				</div>
				<div>
					<x-label for="" class="sm:col-span-1 text-sm font-medium text-gray-500">Costo complessivo degli
						interventi <strong class="underline">trainanti</strong> realizzati ammonta a:
					</x-label>
				</div>
				<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="fees_declarations.ecobonus_driving_cost_sal_1" type="number" class="disabled:bg-gray-50"
						              name="ecobonus_driving_cost_sal_1" id="ecobonus_driving_cost_sal_1" label="SAL 1"></x-input-euro>
					</div>
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="fees_declarations.ecobonus_driving_cost_sal_2" type="number" class="disabled:bg-gray-50"
						              name="ecobonus_driving_cost_sal_2" id="ecobonus_driving_cost_sal_2" label="SAL 2"></x-input-euro>
					</div>
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="fees_declarations.ecobonus_driving_cost_sal_f" type="number" class="disabled:bg-gray-50"
						              name="ecobonus_driving_cost_sal_f" id="ecobonus_driving_cost_sal_f" label="SAL F"></x-input-euro>
					</div>
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="fees_declarations.ecobonus_driving_cost_sal_1_2" type="number" class="disabled:bg-gray-50"
						              name="ecobonus_driving_cost_sal_1_2" id="ecobonus_driving_cost_sal_1_2" label="SAL 1+2"></x-input-euro>
					</div>
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="fees_declarations.ecobonus_driving_cost_sal_1_2_f" type="number" class="disabled:bg-gray-50"
						              name="ecobonus_driving_cost_sal_1_2_f" id="ecobonus_driving_cost_sal_1_2_f" label="SAL 1+2+F"></x-input-euro>
					</div>
				</div>
			</div>
			<div class="py-5">
				<div class="sm:grid sm:grid-cols-3 sm:gap-4">
					<div>
						<x-label for="ecobonus_towed_cost" class="sm:col-span-1 text-sm font-medium text-gray-500">Costo complessivo
							degli
							interventi <strong class="underline">trainati</strong> di progetto ammonta a:
						</x-label>
					</div>
					<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="fees_declarations.ecobonus_towed_cost" type="number" class="disabled:bg-gray-50"
							              name="ecobonus_towed_cost" id="ecobonus_towed_cost"></x-input-euro>
						</div>
					</div>
					<div>
						<x-label for="" class="sm:col-span-1 text-sm font-medium text-gray-500">Costo complessivo degli
							interventi <strong class="underline">trainati</strong> realizzati ammonta a:
						</x-label>
					</div>
					<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="fees_declarations.ecobonus_towed_cost_sal_1" type="number" class="disabled:bg-gray-50"
							              name="ecobonus_towed_cost_sal_1" id="ecobonus_towed_cost_sal_1" label="SAL 1"></x-input-euro>
						</div>
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="fees_declarations.ecobonus_towed_cost_sal_2" type="number" class="disabled:bg-gray-50"
							              name="ecobonus_towed_cost_sal_2" id="ecobonus_towed_cost_sal_2" label="SAL 2"></x-input-euro>
						</div>
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="fees_declarations.ecobonus_towed_cost_sal_f" type="number" class="disabled:bg-gray-50"
							              name="ecobonus_towed_cost_sal_f" id="ecobonus_towed_cost_sal_f" label="SAL F"></x-input-euro>
						</div>
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="fees_declarations.ecobonus_towed_cost_sal_1_2" type="number" class="disabled:bg-gray-50"
							              name="ecobonus_towed_cost_sal_1_2" id="ecobonus_towed_cost_sal_1_2" label="SAL 1+2"></x-input-euro>
						</div>
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="fees_declarations.ecobonus_towed_cost_sal_1_2_f" type="number" class="disabled:bg-gray-50"
							              name="ecobonus_towed_cost_sal_1_2_f" id="ecobonus_towed_cost_sal_1_2_f" label="SAL 1+2+F"></x-input-euro>
						</div>
					</div>
				</div>
			</div>
			<div class="py-5">
				<div class="sm:grid sm:grid-cols-3 sm:gap-4">
					<div>
						<x-label for="ecobonus_project_cost" class="sm:col-span-1 text-sm font-bold text-gray-500">L'importo degli
							interventi di progetto ammonta a:
						</x-label>
					</div>
					<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="fees_declarations.ecobonus_project_cost" type="number" class="font-bold disabled:bg-gray-50"
							              name="ecobonus_project_cost" id="ecobonus_project_cost"></x-input-euro>
						</div>
					</div>
					<div>
						<x-label for="" class="sm:col-span-1 text-sm font-bold text-gray-500">L'importo degli interventi
							realizzati corrisponde a:
						</x-label>
					</div>
					<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
						<div class="[&>div>div>label]:!font-bold w-full mb-1">
							<x-input-euro wire:model.defer="fees_declarations.ecobonus_realized_sal_1" type="number" class="font-bold disabled:bg-gray-50"
							              name="ecobonus_realized_sal_1" id="ecobonus_realized_sal_1" label="SAL 1"></x-input-euro>
						</div>
						<div class="[&>div>div>label]:!font-bold w-full mb-1">
							<x-input-euro wire:model.defer="fees_declarations.ecobonus_realized_sal_2" type="number" class="font-bold disabled:bg-gray-50"
							              name="ecobonus_realized_sal_2" id="ecobonus_realized_sal_2" label="SAL 2"></x-input-euro>
						</div>
						<div class="[&>div>div>label]:!font-bold w-full mb-1">
							<x-input-euro wire:model.defer="fees_declarations.ecobonus_realized_sal_f" type="number" class="font-bold disabled:bg-gray-50"
							              name="ecobonus_realized_sal_f" id="ecobonus_realized_sal_f" label="SAL F"></x-input-euro>
						</div>
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="fees_declarations.ecobonus_realized_sal_1_2" type="number" class="disabled:bg-gray-50"
							              name="ecobonus_realized_sal_1_2" id="ecobonus_realized_sal_1_2" label="SAL 1+2"></x-input-euro>
						</div>
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="fees_declarations.ecobonus_realized_sal_1_2_f" type="number" class="disabled:bg-gray-50"
							              name="ecobonus_realized_sal_1_2_f" id="ecobonus_realized_sal_1_2_f" label="SAL 1+2+F"></x-input-euro>
						</div>
					</div>
				</div>
			</div>
			<div class="py-5">
				<h3 class="text-lg font-semibold text-indigo-700">Sismabonus:</h3>
				<div class="py-5">
					<div class="sm:grid sm:grid-cols-3 sm:gap-4">
						<div>
							<x-label for="sismabonus_project_cost" class="sm:col-span-1 text-sm font-bold text-gray-500">L'importo degli
								interventi di progetto ammonta a:
							</x-label>
						</div>
						<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
							<div class="w-full mb-1">
								<x-input-euro wire:model.defer="fees_declarations.sismabonus_project_cost" type="number"
								              class="font-bold disabled:bg-gray-50"
								              name="sismabonus_project_cost" id="sismabonus_project_cost"></x-input-euro>
							</div>
						</div>
						<div>
							<x-label for="" class="sm:col-span-1 text-sm font-bold text-gray-500">L'importo degli
								interventi realizzati corrisponde a:
							</x-label>
						</div>
						<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
							<div class="[&>div>div>label]:!font-bold w-full mb-1">
								<x-input-euro wire:model.defer="fees_declarations.sismabonus_realized_sal_1" type="number" class="font-bold disabled:bg-gray-50"
								              name="sismabonus_realized_sal_1" id="sismabonus_realized_sal_1" label="SAL 1"></x-input-euro>
							</div>
							<div class="[&>div>div>label]:!font-bold w-full mb-1">
								<x-input-euro wire:model.defer="fees_declarations.sismabonus_realized_sal_2" type="number" class="font-bold disabled:bg-gray-50"
								              name="sismabonus_realized_sal_2" id="sismabonus_realized_sal_2" label="SAL 2"></x-input-euro>
							</div>
							<div class="[&>div>div>label]:!font-bold w-full mb-1">
								<x-input-euro wire:model.defer="fees_declarations.sismabonus_realized_sal_f" type="number" class="font-bold disabled:bg-gray-50"
								              name="sismabonus_realized_sal_f" id="sismabonus_realized_sal_f" label="SAL F"></x-input-euro>
							</div>
							<div class="w-full mb-1">
								<x-input-euro wire:model.defer="fees_declarations.sismabonus_realized_sal_1_2" type="number" class="disabled:bg-gray-50"
								              name="sismabonus_realized_sal_1_2" id="sismabonus_realized_sal_1_2" label="SAL 1+2"></x-input-euro>
							</div>
							<div class="w-full mb-1">
								<x-input-euro wire:model.defer="fees_declarations.sismabonus_realized_sal_1_2_f" type="number" class="disabled:bg-gray-50"
								              name="sismabonus_realized_sal_1_2_f" id="sismabonus_realized_sal_1_2_f" label="SAL 1+2+F"></x-input-euro>
							</div>
						</div>
					</div>
				</div>
				<x-section-heading>Contratto nazionale</x-section-heading>
				<div>
					<div class="pb-4 sm:grid sm:grid-cols-3 sm:gap-4">
						<div>
							<x-label for="national_contract" class="sm:col-span-1 text-sm font-medium text-gray-500">Ai fini prescritti
								dall'art. 1, c. 43 bis L. 234/2021 si attesta che il CCNL applicato nell'esecuzione dei
								lavori è il
							</x-label>
						</div>
						<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							<div class="w-96 mb-1">
								<x-input wire:model.defer="fees_declarations.national_contract" type="text"
								         name="national_contract" id="national_contract"></x-input>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		@can('update', $practice)
			<div class="flex justify-end space-x-3">
				<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
				<x-button>Salva</x-button>
			</div>
		@endcan
	</form>
</x-card>