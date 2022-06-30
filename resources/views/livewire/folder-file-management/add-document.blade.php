<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-6 gap-6">
			<div class="col-span-12">
				<p class="text-sm text-gray-900">Aggiungi documento a:</p>
				<p class="text-sm text-gray-500 italic">{{ $folder->name }}</p>
			</div>
			<div class="col-span-12 space-y-4">
				<div>
					<x-input wire:model.defer="title" type="text" name="title" id="title" label="Titolo"></x-input>
				</div>
				<div>
					<x-label for="file" required>File</x-label>
					<div class="flex items-center space-x-5 mt-1">
						<label class="block">
							<span class="sr-only">Scegli..</span>
							<input wire:model="file" type="file" name="file" id="file" class="block w-full text-sm text-slate-500
				      file:mr-4 file:py-2 file:px-4
				      file:rounded-full file:border-0
				      file:text-sm file:font-semibold
				      file:bg-indigo-50 file:text-indigo-700
				      hover:file:bg-indigo-100
				    "/>
						</label>
						<div wire:loading wire:target="file" class="ml-2">
							<span class="text-sm text-gray-400">Caricamento..</span>
						</div>
					</div>
					<x-input-error for="file"></x-input-error>
				</div>
			</div>
		</div>
		<div class="sm:flex sm:items-center sm:justify-between space-y-2 sm:space-y-0">
			<x-button wire:loading.attr="disabled" wire:target="file" class="w-full justify-center sm:w-auto">Carica
			</x-button>
			<x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
		</div>
	</form>
</x-card>