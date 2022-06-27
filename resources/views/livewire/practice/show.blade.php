<x-slot name="header">
	<x-page-header>
		Scheda Pratica
		<x-slot name="subtitle">
			<div class="flex items-center space-x-2 mt-1">
				<p class="text-sm text-gray-500">
					<span class="font-bold">N. pratica:</span>
					<span>{{ $practice->id }}</span>
				</p>
				<span class="text-gray-500">&middot;</span>
				<p class="text-sm text-gray-500">
					<span class="font-bold">Data:</span>
					<span>{{ $practice->created_at->format('d/m/Y') }}</span>
				</p>
			</div>
		</x-slot>
		<x-slot name="actions">
			@can('create_computo')
				<x-button type="button" x-on:click="Livewire.emit('openModal', 'practice.modals.computo.show', {{ json_encode(['practice_id' => $practice->id]) }})">
					Computo metrico
				</x-button>
			@endcan
		</x-slot>
	</x-page-header>
</x-slot>
<x-card>
	<div>
		<div class="sm:hidden">
			<label for="tabs" class="sr-only">Select a tab</label>
			<select wire:model="selectedTab" wire:ignore id="tabs" name="tabs"
			        class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
				@foreach($tabs as $k => $tab)
					<option @if($selectedTab === $k) selected @endif value="{{ $k }}">{{ $tab }}</option>
				@endforeach
			</select>
		</div>
		<div class="hidden sm:block">
			<div class="border-b border-gray-200">
				<nav class="-mb-px flex space-x-8" aria-label="Tabs">
					@foreach($tabs as $k => $tab)
						<div wire:click="$set('selectedTab', '{{$k}}')"
						     class="@if($selectedTab === $k) border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 @endif whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm cursor-pointer">
							{{ $tab }}
						</div>
					@endforeach
				</nav>
			</div>
		</div>
	</div>
	<x-card>
		@switch($selectedTab)
			@case('applicant')
				<livewire:practice.tabs.applicant :applicant="$practice->applicant"/>
				@break
			@case('practice')
				<livewire:practice.tabs.practice :practice="$practice"/>
				@break
			@case('subjects')
				<livewire:practice.tabs.subject :practice="$practice"/>
				@break
			@case('building')
				<livewire:practice.tabs.building :practice="$practice"/>
				@break
			@case('media')
				<livewire:practice.tabs.media :practice="$practice"/>
				@break
			@case('documents')
				<livewire:practice.tabs.document :practice="$practice"/>
				@break
			@case('superbonus')
				<livewire:practice.tabs.superbonus110.show :practice="$practice"/>
				@break
			@case('contracts')
				<livewire:practice.tabs.contract :practice="$practice"/>
				@break
			@case('policies')
				<livewire:practice.tabs.policies :practice="$practice"/>
				@break
		@endswitch
	</x-card>
</x-card>

@push('notifications')
	<x-notification/>
@endpush