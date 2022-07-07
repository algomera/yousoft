@foreach($items as $k => $item)
	@if($loop->first)
		<div wire:key="{{ $k }}-{{ $item->id }}" x-data="{open: true}">
			@else
				<div wire:key="{{ $k }}-{{ $item->id }}" x-data="{open: false}">
					@endif
					<div @if($item->children->count()) x-on:click="open = !open"
					     @else wire:click="$emit('changeInterventionFolder', {{$item->id}});" @endif
					     class="@if($item->id == $selected) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif flex items-center px-3 py-1.5 text-xs font-medium rounded-md cursor-pointer">
						<x-icon name="folder" class="w-4 h-4 mr-2 flex-shrink-0"></x-icon>
						<span class="truncate" x-tooltip.raw="{{ $item->code }} - {{ $item->name }}">{{ $item->code }} - {{ $item->name }}</span>
						@if($item->children->count())
							<span class="text-gray-600 ml-auto py-0.5 text-xs rounded-full hidden lg:inline-block">
					<x-icon name="arrow-down" class="w-4 h-4 transition-transform shrink-0"
					        x-bind:class="open || '-rotate-90'"></x-icon>
				</span>
						@endif
					</div>
					@if(isset($item->children))
						<div x-show="open" x-collapse class="pl-2">
							<x-intervention-list-folder-loop :items="$item->children"
							                                 :selected="$selected"></x-intervention-list-folder-loop>
						</div>
					@endif
				</div>
		@endforeach