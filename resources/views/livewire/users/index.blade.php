<x-slot name="header">
	<x-page-header>
		Elenco utenti
		<x-slot name="actions">
			<x-button prepend="plus" iconColor="text-white"
			          x-on:click="Livewire.emit('openModal', 'users.create')">
				Aggiungi
			</x-button>
		</x-slot>
	</x-page-header>
</x-slot>
<x-card>
	<div class="w-full md:w-1/2 lg:w-1/3">
		<x-input wire:model.debounce="search" type="text" name="search" append="search" iconColor="text-gray-400" label="Cerca" placeholder="Associato a.."></x-input>
	</div>
	<x-table.table>
		<x-table.thead>
			<tr>
				<x-table.th>#</x-table.th>
				<x-table.th>Nome</x-table.th>
				<x-table.th>Email</x-table.th>
				<x-table.th>Tipologia</x-table.th>
				@if(auth()->user()->isAdmin())
					<x-table.th>Associato a</x-table.th>
				@endif
				<x-table.th>Creato da</x-table.th>
				<x-table.th></x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@forelse ($users as $user)
				<tr>
					<x-table.td>{{$user->id}}</x-table.td>
					<x-table.td>{{$user->name}}</x-table.td>
					<x-table.td>{{$user->email}}</x-table.td>
					<x-table.td>
						<div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 uppercase">
							{{ $user->role->label }}
						</div>
					</x-table.td>
					@if(auth()->user()->isAdmin())
						<x-table.td>
							@if($user->parents->count())
								@foreach($user->parents as $parent)
									<div>
										{{ $parent->name }}
									</div>
								@endforeach
							@else
								-
							@endif
						</x-table.td>
					@endif
					<x-table.td>{{$user->created_by->name ?? '-'}}</x-table.td>
					<x-table.td>
						@if(auth()->user()->isAdmin() || $user->created_by->id === auth()->user()->id)
							<div class="flex items-center space-x-3">
								<x-icon wire:click="$emit('openModal', 'users.edit', {{ json_encode([$user->id]) }})"
								        name="pencil-alt"
								        class="w-5 h-5 cursor-pointer text-indigo-500 hover:text-indigo-800"></x-icon>

								@if($user->id !== auth()->user()->id)
									<x-modal>
										<x-slot name="trigger">
											<div class="text-red-600 hover:text-red-900">
												<x-icon name="trash" class="w-5 h-5"></x-icon>
											</div>
										</x-slot>
										<x-slot name="title">
											Conferma eliminazione
										</x-slot>
										Sei sicuro di voler eliminare l'utente <span
												class="font-bold">{{ $user->name }}</span>?
										<x-slot name="footer">
											<x-link-button x-on:click="open = false">Annulla</x-link-button>
											<x-danger-button class="ml-2" wire:click="deleteUser({{ $user->id }})"
											                 wire:loading.attr="disabled">
												Elimina
											</x-danger-button>
										</x-slot>
									</x-modal>
									@can('impersonate_users')
										@canImpersonate($guard = null)
										<a href="{{ route('impersonate', $user->id) }}">
											<x-icon name="sparkles"
											        class="w-5 h-5 cursor-pointer text-yellow-500 hover:text-yellow-800"></x-icon>
										</a>
										@endCanImpersonate
									@endcan
								@endif
							</div>
						@endif
					</x-table.td>
				</tr>
			@empty
				<tr>
					<x-table.td colspan="10" class="text-center text-gray-500 py-4">Nessun risultato</x-table.td>
				</tr>
			@endforelse
		</x-table.tbody>
	</x-table.table>
</x-card>

@push('notifications')
	<x-notification/>
@endpush