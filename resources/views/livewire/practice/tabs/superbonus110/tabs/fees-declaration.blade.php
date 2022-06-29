<x-card class="space-y-5 border p-4 rounded-md">
	<form wire:submit.prevent="save" class="space-y-5">
		<x-section-heading class="!py-0 !border-t-0">Spese complessive e dichiarazioni</x-section-heading>
		<h3 class="text-lg font-semibold text-indigo-700">Ecobonus:</h3>

		<div class="divide-y space-y-5">
			<div class="sm:grid sm:grid-cols-3 sm:gap-4">
				<div>
					<x-label for="" class="sm:col-span-1 text-sm font-medium text-gray-500">Costo complessivo
						degli
						interventi <strong class="underline">trainanti</strong> di progetto ammonta a:
					</x-label>
				</div>
				<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
						              name="" readonly disabled></x-input-euro>
					</div>
				</div>
				<div>
					<x-label for="" class="sm:col-span-1 text-sm font-medium text-gray-500">Costo complessivo degli
						interventi <strong class="underline">trainanti</strong> realizzati ammonta a:
					</x-label>
				</div>
				<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
						              name="" label="SAL 1" readonly disabled></x-input-euro>
					</div>
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
						              name="" label="SAL 2" readonly disabled></x-input-euro>
					</div>
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
						              name="" label="SAL F" readonly disabled></x-input-euro>
					</div>
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
						              name="" label="SAL 1+2" readonly disabled></x-input-euro>
					</div>
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
						              name="" label="SAL 1+2+F" readonly disabled></x-input-euro>
					</div>
				</div>
			</div>
			<div class="py-5">
				<div class="sm:grid sm:grid-cols-3 sm:gap-4">
					<div>
						<x-label for="" class="sm:col-span-1 text-sm font-medium text-gray-500">Costo complessivo
							degli
							interventi <strong class="underline">trainati</strong> di progetto ammonta a:
						</x-label>
					</div>
					<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
							              name="" readonly disabled></x-input-euro>
						</div>
					</div>
					<div>
						<x-label for="" class="sm:col-span-1 text-sm font-medium text-gray-500">Costo complessivo degli
							interventi <strong class="underline">trainati</strong> realizzati ammonta a:
						</x-label>
					</div>
					<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
							              name="" label="SAL 1" readonly disabled></x-input-euro>
						</div>
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
							              name="" label="SAL 2" readonly disabled></x-input-euro>
						</div>
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
							              name="" label="SAL F" readonly disabled></x-input-euro>
						</div>
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
							              name="" label="SAL 1+2" readonly disabled></x-input-euro>
						</div>
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
							              name="" label="SAL 1+2+F" readonly disabled></x-input-euro>
						</div>
					</div>
				</div>
			</div>
			<div class="py-5">
				<div class="sm:grid sm:grid-cols-3 sm:gap-4">
					<div>
						<x-label for="" class="sm:col-span-1 text-sm font-bold text-gray-500">L'importo degli
							interventi di progetto ammonta a:
						</x-label>
					</div>
					<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="" type="number" class="font-bold disabled:bg-gray-50"
							              name="" readonly disabled></x-input-euro>
						</div>
					</div>
					<div>
						<x-label for="" class="sm:col-span-1 text-sm font-bold text-gray-500">L'importo degli interventi
							realizzati corrisponde a:
						</x-label>
					</div>
					<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
						<div class="[&>div>div>label]:!font-bold w-full mb-1">
							<x-input-euro wire:model.defer="" type="number" class="font-bold disabled:bg-gray-50"
							              name="" label="SAL 1" readonly disabled></x-input-euro>
						</div>
						<div class="[&>div>div>label]:!font-bold w-full mb-1">
							<x-input-euro wire:model.defer="" type="number" class="font-bold disabled:bg-gray-50"
							              name="" label="SAL 2" readonly disabled></x-input-euro>
						</div>
						<div class="[&>div>div>label]:!font-bold w-full mb-1">
							<x-input-euro wire:model.defer="" type="number" class="font-bold disabled:bg-gray-50"
							              name="" label="SAL F" readonly disabled></x-input-euro>
						</div>
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
							              name="" label="SAL 1+2" readonly disabled></x-input-euro>
						</div>
						<div class="w-full mb-1">
							<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
							              name="" label="SAL 1+2+F" readonly disabled></x-input-euro>
						</div>
					</div>
				</div>
			</div>
			<div class="py-5">
				<h3 class="text-lg font-semibold text-indigo-700">Sismabonus:</h3>
				<div class="py-5">
					<div class="sm:grid sm:grid-cols-3 sm:gap-4">
						<div>
							<x-label for="" class="sm:col-span-1 text-sm font-bold text-gray-500">L'importo degli
								interventi di progetto ammonta a:
							</x-label>
						</div>
						<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
							<div class="w-full mb-1">
								<x-input-euro wire:model.defer="" type="number"
								              class="font-bold disabled:bg-gray-50"
								              name="" readonly disabled></x-input-euro>
							</div>
						</div>
						<div>
							<x-label for="" class="sm:col-span-1 text-sm font-bold text-gray-500">L'importo degli
								interventi realizzati corrisponde a:
							</x-label>
						</div>
						<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
							<div class="[&>div>div>label]:!font-bold w-full mb-1">
								<x-input-euro wire:model.defer="" type="number" class="font-bold disabled:bg-gray-50"
								              name="" label="SAL 1" readonly disabled></x-input-euro>
							</div>
							<div class="[&>div>div>label]:!font-bold w-full mb-1">
								<x-input-euro wire:model.defer="" type="number" class="font-bold disabled:bg-gray-50"
								              name="" label="SAL 2" readonly disabled></x-input-euro>
							</div>
							<div class="[&>div>div>label]:!font-bold w-full mb-1">
								<x-input-euro wire:model.defer="" type="number" class="font-bold disabled:bg-gray-50"
								              name="" label="SAL F" readonly disabled></x-input-euro>
							</div>
							<div class="w-full mb-1">
								<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
								              name="" label="SAL 1+2" readonly disabled></x-input-euro>
							</div>
							<div class="w-full mb-1">
								<x-input-euro wire:model.defer="" type="number" class="disabled:bg-gray-50"
								              name="" label="SAL 1+2+F" readonly disabled></x-input-euro>
							</div>
						</div>
					</div>
				</div>
				<x-section-heading>Contratto nazionale</x-section-heading>
				<div>
					<div class="pb-4 sm:grid sm:grid-cols-3 sm:gap-4">
						<div>
							<x-label for="" class="sm:col-span-1 text-sm font-medium text-gray-500">Ai fini prescritti
								dall'art. 1, c. 43 bis L. 234/2021 si attesta che il CCNL applicato nell'esecuzione dei
								lavori è il
							</x-label>
						</div>
						<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							<div class="w-96 mb-1">
								<x-input wire:model.defer="" type="text"
								         name=""></x-input>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
			<x-button>Salva</x-button>
		</div>
	</form>
</x-card>