@props(['label', 'subject', 'items', 'name'])
<x-select wire:key="{{$name}}" wire:model="{{ $name }}" name="{{$name}}" label="{{$label}}">
	<option value="null" selected disabled>Seleziona..</option>
	@foreach($items as $item)
		<option wire:key="{{ $loop->index }}"
		        value="{{ $item->id }}">
			{{ $item->company_name }} @if($name === 'consultant' && $item->consultant_type)
				({{ $item->consultant_type }})
			@endif
		</option>
	@endforeach
	<x-slot name="action">
		<div class="flex divide-x divide-indigo-200">
			@can('view', \App\Anagrafica::find($subject[$name]))
				@isset($subject[$name])
					<span class="text-xs text-indigo-500 px-1 {{ !isset($subject[$name]) ? 'user-select-none cursor-not-allowed text-gray-300' : 'cursor-pointer hover:underline' }}"
					      wire:click="$emit('openModal', 'anagrafica.show', {{ json_encode([$subject[$name]]) }})">Vedi</span>
				@endisset
			@endcan
			@can('create', \App\Anagrafica::class)
				<span class="text-xs text-indigo-500 px-1 cursor-pointer hover:underline"
				      wire:click="$emit('openModal', 'anagrafica.create', {{ json_encode([\App\SubjectRole::where('slug', $name)->pluck('id')]) }})">Crea</span>
			@endcan
		</div>
	</x-slot>
</x-select>
