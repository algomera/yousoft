<x-card class="space-y-5 border p-4 rounded-md">
	<form wire:submit.prevent="save" class="space-y-5">
		<x-section-heading class="!py-0 !border-t-0">Spese complessive e dichiarazioni</x-section-heading>
		<dt class="text-lg font-semibold text-indigo-700">Ecobonus:</dt>
		<div>
			<div class="pb-4 sm:grid sm:grid-cols-3 sm:gap-4">
				<div>
					<x-label for="" class="sm:col-span-1 text-sm font-medium text-gray-500">Costo complessivo degli
						interventi trainanti di progetto ammontano a:
					</x-label>
					<x-label class="text-gray-400 text-xs">(compreso importo trainati parti comuni)</x-label>
				</div>
				<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
					<div class="w-96 mb-1">
						<x-input-euro wire:model.defer="" type="number"
						         name=""></x-input-euro>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div class="pb-4 sm:grid sm:grid-cols-3 sm:gap-4">
				<div>
					<x-label for="" class="sm:col-span-1 text-sm font-medium text-gray-500">Costo complessivo degli
						interventi trainanti realizzati ammontano a:
					</x-label>
					<x-label class="text-gray-400 text-xs">(compreso importo trainati parti comuni)</x-label>
				</div>
				<div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:grid sm:grid-cols-3 sm:gap-4">
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="" type="number"
						         name="" label="SAL 1"></x-input-euro>
					</div>
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="" type="number"
						         name="" label="SAL 2"></x-input-euro>
					</div>
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="" type="number"
						         name="" label="SAL F"></x-input-euro>
					</div>
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="" type="number"
						              name="" label="SAL 1+2"></x-input-euro>
					</div>
					<div class="w-full mb-1">
						<x-input-euro wire:model.defer="" type="number"
						              name="" label="SAL F"></x-input-euro>
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