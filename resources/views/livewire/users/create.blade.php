<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-12 gap-6">
			<div class="col-span-12">
				<x-select wire:model="role" name="role" id="role" label="Tipologia Profilo" required>
					<option value="null" selected disabled>Seleziona..</option>
					@foreach(config('gestione_accessi.' . auth()->user()->role->name) as $k => $role)
						<option value="{{ $k }}" wire:key="{{$loop->index}}">{{ ucfirst($role) }}</option>
					@endforeach
				</x-select>
			</div>

			<div class="col-span-12" x-data="{ show: @entangle('showParents') }" x-show="show">
				<div>
					<x-label>A chi vuoi associare questo utente?</x-label>
					<div class="grid grid-cols-2 gap-4 mt-2">
						@foreach($parents as $name => $parent)
							@if(count($parent) > 0)
								<div wire:key="{{ $name }}" class="border p-2 rounded-md">
									<x-label class="font-bold">{{ $name }}</x-label>
									<div class="sm:flex sm:items-center sm:flex-wrap">
										@foreach($parent as $item)
											<div wire:key="{{ $loop->index }}" class="flex items-center sm:mr-5 mb-2">
												<input wire:model="selectedParents"
												       name="selectedParents[]" id="parent_{{ $item['id'] }}"
												       type="checkbox"
												       value="{{ $item['id'] }}"
												       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
												<label for="parent_{{ $item['id'] }}"
												       class="ml-3 block text-sm font-medium text-gray-700">{{ ucfirst($item['user_data']['name']) }}</label>
											</div>
										@endforeach
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<x-input-error for="selectedParents"></x-input-error>
				</div>
			</div>

			<div class="col-span-12">
				<x-input wire:model.defer="name" type="text" name="name" id="name" label="Nome" required></x-input>
			</div>
			<div class="col-span-12">
				<x-input wire:model.defer="email" type="email" name="email" id="email" label="Email" required></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="password" type="password" name="password" id="password" label="Password"
				         required></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="password_confirmation" type="password" name="password_confirmation"
				         id="password_confirmation" label="Conferma Password" required></x-input>
			</div>
		</div>

		<x-button>Crea e invia credenziali</x-button>
	</form>
</x-card>