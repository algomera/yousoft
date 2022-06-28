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
			@case('data_project')
				<livewire:practice.tabs.superbonus110.tabs.data-project :practice="$practice" />
				@break
			@case('driving_intervention')
				<livewire:practice.tabs.superbonus110.tabs.driving-intervention :practice="$practice" />
				@break
			@case('towed_intervention')
				<livewire:practice.tabs.superbonus110.tabs.towed-intervention :practice="$practice" />
				@break
			@case('final_state')
				<livewire:practice.tabs.superbonus110.tabs.final-state :practice="$practice" />
				@break
			@case('fees_declaration')
				<livewire:practice.tabs.superbonus110.tabs.fees-declaration :practice="$practice" />
				@break
			@case('variants')
				<livewire:practice.tabs.superbonus110.tabs.variants :practice="$practice" />
				@break
		@endswitch
	</x-card>
</x-card>

@push('notifications')
	<x-notification/>
@endpush