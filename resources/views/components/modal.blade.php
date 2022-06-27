@props([
'size' => 'lg',
'sizeClasses' => [
'xs' => 'sm:max-w-xs',
'sm' => 'sm:max-w-sm',
'md' => 'sm:max-w-md',
'lg' => 'sm:max-w-lg',
'xl' => 'sm:max-w-xl',
'2xl' => 'sm:max-w-2xl',
'3xl' => 'sm:max-w-3xl'
],
'type' => 'default',
'iconClasses' => [
'default' => 'h-6 w-6 text-gray-600',
'success' => 'h-6 w-6 text-green-600',
'danger' => 'h-6 w-6 text-red-600',
'warning' => 'h-6 w-6 text-yellow-600',
'info' => 'h-6 w-6 text-blue-600',
],
'bgIconClasses' => [
'default' => 'bg-gray-100',
'success' => 'bg-green-100',
'danger' => 'bg-red-100',
'warning' => 'bg-yellow-100',
'info' => 'bg-blue-100',
]
])

<div x-data="{ open: false }"
     x-on:close-modal.window="open = false"
     x-init="$watch('open', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
>
	<div x-on:click="open = true" class="w-full cursor-pointer" aria-expanded="false">
		{{$trigger}}
	</div>
	<div x-show="open" class="fixed inset-0 z-10 overflow-y-auto">
		<div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
			<div
				x-cloak
				x-show="open"
				x-on:click="open = false; Livewire.emit('closed')"
				x-transition:enter="ease-out duration-300"
				x-transition:enter-start="opacity-0"
				x-transition:enter-end="opacity-100"
				x-transition:leave="ease-in duration-200"
				x-transition:leave-start="opacity-100"
				x-transition:leave-end="opacity-0"
				class="fixed inset-0 transition-opacity"
				aria-hidden="true">
				<div class="absolute inset-0 bg-gray-500 opacity-75"></div>
			</div>
			<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
			<div
				x-cloak
				x-show="open"
				x-transition:enter="ease-out duration-300"
				x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
				x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
				x-transition:leave="ease-in duration-200"
				x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
				x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
				class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle {{$sizeClasses[$size]}} w-full sm:p-6"
				role="dialog"
				aria-modal="true"
				aria-labelledby="modal-headline">
				<div x-on:click="open = false; Livewire.emit('closed')" class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
					<button type="button" class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						<span class="sr-only">Close</span>
						<!-- Heroicon name: outline/x -->
						<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
				</div>
				<div>
					@if(isset($icon) || $type !== 'default')
						<div class="mb-3 sm:mb-5 mx-auto flex items-center justify-center h-12 w-12 rounded-full {{ $bgIconClasses[$type] }}">
							@switch($type)
								@case('success')
								<svg class="{{ $iconClasses[$type] }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
								</svg>
								@break
								@case('danger')
								<svg class="{{ $iconClasses[$type] }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
								</svg>
								@break
								@case('warning')
								<svg class="{{ $iconClasses[$type] }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
								</svg>
								@break
								@case('info')
								<svg class="{{ $iconClasses[$type] }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
								@break
								@case('default')
								<svg class="{{ $iconClasses[$type] }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
									{{ isset($icon) ? $icon : '' }}
								</svg>
								@break
							@endswitch
						</div>
					@endif
					<div class="text-center">
						@if(isset($title))
							<h3 class="text-lg font-medium text-gray-900 leading-6" id="modal-headline">
								{{ $title }}
							</h3>
						@endif
						<div class="mt-4">
							<div class="text-sm text-gray-500 whitespace-normal">
								{{ $slot }}
							</div>
						</div>
					</div>
				</div>
				@isset($footer)
					<div class="flex flex-col-reverse mt-5 space-y-2 space-x-0 space-y-reverse justify-center sm:space-y-0 sm:mt-6 sm:flex-row sm:space-x-3">
						{{$footer}}
					</div>
				@endisset
			</div>
		</div>
	</div>
</div>
