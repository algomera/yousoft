<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-6 gap-6">
			<div class="col-span-12">
				<p class="text-sm text-gray-900">Aggiungi documento a:</p>
				<p class="text-sm text-gray-500 italic">{{ $sub_folder->name }}</p>
			</div>
			<div class="col-span-12">
				<x-label for="allega" required>Documento</x-label>
				<div class="flex items-center space-x-5 mt-1">
					<label class="block">
						<span class="sr-only">Scegli..</span>
						<input wire:model="allega" type="file" name="allega" id="allega" class="block w-full text-sm text-slate-500
				      file:mr-4 file:py-2 file:px-4
				      file:rounded-full file:border-0
				      file:text-sm file:font-semibold
				      file:bg-indigo-50 file:text-indigo-700
				      hover:file:bg-indigo-100
				    "/>
					</label>
					<div wire:loading wire:target="allega" class="ml-2">
						<span class="text-sm text-gray-400">Caricamento..</span>
					</div>
				</div>
				<x-input-error for="allega"></x-input-error>
			</div>
			<div class="col-span-12">
				<x-textarea wire:model.defer="note" name="note" id="note" label="Note"></x-textarea>
			</div>
		</div>
		<div class="mt-5">
			<label class="block font-medium text-sm mb-1 text-gray-700">
				<span>Tipologia di Documento:</span>
			</label>
			<div class="text-gray-700/50 text-xs font-medium leading-relaxed">
				<div class="-mx-1 mt-1">
					<span wire:click="toggleDocumentType('Documento interno')" class="{{ in_array('Documento interno', $type) ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium m-1 cursor-pointer hover:bg-indigo-100 hover:text-indigo-800">Documento interno</span>
					<span wire:click="toggleDocumentType('Documento che necessita di approvazione speciale')" class="{{ in_array('Documento che necessita di approvazione speciale', $type) ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium m-1 cursor-pointer hover:bg-indigo-100 hover:text-indigo-800">Documento che necessita di approvazione speciale</span>
					<span wire:click="toggleDocumentType('Indispensabile')" class="{{ in_array('Indispensabile', $type) ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium m-1 cursor-pointer hover:bg-indigo-100 hover:text-indigo-800">Indispensabile</span>
					<span wire:click="toggleDocumentType('SAL 1')" class="{{ in_array('SAL 1', $type) ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium m-1 cursor-pointer hover:bg-indigo-100 hover:text-indigo-800">SAL 1</span>
					<span wire:click="toggleDocumentType('SAL 2')" class="{{ in_array('SAL 2', $type) ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium m-1 cursor-pointer hover:bg-indigo-100 hover:text-indigo-800">SAL 2</span>
					<span wire:click="toggleDocumentType('SAL Finale')" class="{{ in_array('SAL Finale', $type) ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium m-1 cursor-pointer hover:bg-indigo-100 hover:text-indigo-800">SAL Finale</span>
					<span wire:click="toggleDocumentType('Documentazione ricorrente')" class="{{ in_array('Documentazione ricorrente', $type) ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium m-1 cursor-pointer hover:bg-indigo-100 hover:text-indigo-800">Documentazione ricorrente</span>
					<span wire:click="toggleDocumentType('Non necessario')" class="{{ in_array('Non necessario', $type) ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium m-1 cursor-pointer hover:bg-indigo-100 hover:text-indigo-800">Non necessario</span>
					<span wire:click="toggleDocumentType('Non inserire nei fascicoli')" class="{{ in_array('Non inserire nei fascicoli', $type) ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium m-1 cursor-pointer hover:bg-indigo-100 hover:text-indigo-800">Non inserire nei fascicoli</span>
					<span wire:click="toggleDocumentType('Con scadenza')" class="{{ in_array('Con scadenza', $type) ? 'bg-indigo-100 text-indigo-800' : 'bg-gray-100 text-gray-800' }} inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium m-1 cursor-pointer hover:bg-indigo-100 hover:text-indigo-800">Con scadenza</span>
				</div>
			</div>
		</div>
		<div class="sm:flex sm:items-center sm:justify-between space-y-2 sm:space-y-0">
			<x-button class="w-full justify-center sm:w-auto">Carica</x-button>
			<x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
		</div>
	</form>
</x-card>