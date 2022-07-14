<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css"/>

	<!-- Scripts -->
	<script src="{{ mix('js/app.js') }}" defer></script>

	@livewireStyles
</head>
<body class="h-full overflow-hidden font-sans antialiased @impersonating($guard = null) pb-8 @endImpersonating">
@impersonating($guard = null)
<div class="relative bg-indigo-600">
	<div class="max-w-7xl mx-auto py-1 px-3 sm:px-6 lg:px-8">
		<div class="pr-16 sm:text-center sm:px-16">
			<p class="text-white">
				<span class="tracking-wide text-xs md:text-sm">Stai impersonando l'utente <span class="font-bold">"{{ auth()->user()->name }}"</span></span>
			</p>
		</div>
		<div class="absolute inset-y-0 right-0 pr-3 flex items-center sm:pr-2">
			<a href="{{ route('impersonate.leave') }}" class="text-sm text-white font-semibold">
				Esci
			</a>
		</div>
	</div>
</div>
@endImpersonating
<x-banner/>
<div x-data="{isOpen: false}" id="app" class="flex h-full">
	{{-- Mobile Menu --}}
	<div
			x-cloak
			x-show="isOpen"
			class="fixed inset-0 z-40 flex lg:hidden"
			role="dialog"
			aria-modal="true"
	>
		<div
				x-cloak
				x-show="isOpen"
				x-transition:enter="transition-opacity ease-linear duration-300"
				x-transition:enter-start="opacity-0"
				x-transition:enter-end="opacity-100"
				x-transition:leave="transition-opacity ease-linear duration-300"
				x-transition:leave-start="opacity-100"
				x-transition:leave-end="opacity-0"
				class="fixed inset-0 bg-gray-600 bg-opacity-75"
				aria-hidden="true"
		></div>
		<div
				x-show="isOpen"
				x-transition:enter="transition ease-in-out duration-300 transform"
				x-transition:enter-start="-translate-x-full"
				x-transition:enter-end="translate-x-0"
				x-transition:leave="transition ease-in-out duration-300 transform"
				x-transition:leave-start="translate-x-0"
				x-transition:leave-end="-translate-x-full"
				class="relative flex flex-col flex-1 w-full max-w-xs bg-white focus:outline-none"
		>
			<div
					x-show="isOpen"
					x-transition:enter="ease-in-out duration-300"
					x-transition:enter-start="opacity-0"
					x-transition:enter-end="opacity-100"
					x-transition:leave="ease-in-out duration-300"
					x-transition:leave-start="opacity-100"
					x-transition:leave-end="opacity-0"
					class="absolute top-0 right-0 pt-2 -mr-12"
			>
				<button
						x-on:click="isOpen = false"
						type="button"
						class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
				>
					<span class="sr-only">Close sidebar</span>
					<!-- Heroicon name: outline/x -->
					<svg
							class="w-6 h-6 text-white"
							xmlns="http://www.w3.org/2000/svg"
							fill="none"
							viewBox="0 0 24 24"
							stroke="currentColor"
							aria-hidden="true"
					>
						<path
								stroke-linecap="round"
								stroke-linejoin="round"
								stroke-width="2"
								d="M6 18L18 6M6 6l12 12"
						/>
					</svg>
				</button>
			</div>

			<div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
				<div class="flex items-center flex-shrink-0 px-4">
					@if (auth()->user()->user_data->name == 'Impresa Example')
						<img src="{{asset('img/Logo_.png')}}" alt="Prime-Hub" class="w-auto h-12">
					@endif
					@if (auth()->user()->user_data->name == 'Edrasis Group')
						<img src="{{asset('img/edrasis_logo.png')}}" alt="Edrasis Logo" class="w-auto h-12">
					@endif
				</div>
				<livewire:navigation/>
			</div>
		</div>

		<div
				class="flex-shrink-0 w-14"
				aria-hidden="true"
		>
			<!-- Force sidebar to shrink to fit close icon -->
		</div>
	</div>

	{{-- Desktop Menu (Sidebar) --}}
	<div class="hidden lg:flex lg:flex-shrink-0">
		<div class="flex flex-col w-[280px]">
			<!-- Sidebar component, swap this element with another sidebar if you like -->
			<div class="flex flex-col flex-1 min-h-0 bg-white border-r border-gray-200">
				<div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
					<div class="flex items-center justify-center flex-shrink-0 px-4">
						<a href="{{ route('dashboard') }}">
							@if (auth()->user()->user_data->name == 'Impresa Example')
								<img src="{{asset('img/Logo_.png')}}" alt="Prime-Hub" class="w-auto h-12">
							@endif
							@if (auth()->user()->user_data->name == 'Edrasis Group')
								<img src="{{asset('img/edrasis_logo.png')}}" alt="Edrasis Logo"
								     class="w-auto h-12">
							@endif
						</a>
					</div>
					<livewire:navigation/>
				</div>
			</div>
		</div>
	</div>

	{{-- Topbar + Content --}}
	<div class="flex flex-col flex-1 min-w-0 overflow-hidden">
		<div>
			<div class="flex items-center justify-between lg:justify-end bg-white border-b border-gray-200 px-4 py-1.5">
				<div class="flex items-center space-x-2">
					<div class="lg:hidden">
						<button
								x-on:click="isOpen = true"
								type="button"
								class="inline-flex items-center justify-center p-2 text-gray-500 rounded-md hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
						>
							<span class="sr-only">Open sidebar</span>
							<x-icon
									name="menu"
									class="w-6 h-6"
							></x-icon>
						</button>
					</div>

				</div>
				<div class="flex items-center">
					<div class="py-2 md:min-w-0 md:flex md:items-center md:justify-end">
						<div class="flex items-center flex-shrink-0 ml-10 space-x-10">
							<div class="flex items-center space-x-4">
								{{-- Notification --}}
								<div class="relative cursor-pointer">
									<x-dropdown
											align="right"
											width="96"
									>
										<x-slot name="trigger">
											<div class="relative">
												{{-- new notification badge--}}
												{{--<div class="absolute -top-0.5 right-0 w-2.5 h-2.5 bg-red-500 rounded-full"></div>--}}
												<x-icon
														name="bell"
														class="w-5 h-5 text-gray-400"
												></x-icon>
											</div>
										</x-slot>

										<x-slot name="content">
											{{-- Notifications list --}}
											<div class="block px-4 py-2 text-xs text-gray-400">
												{{ __('Notifiche') }}
											</div>
											<ul
													role="list"
													class="divide-y divide-gray-200"
											>
												{{--<x-dropdown-link>--}}
												{{--	<li class="flex items-center py-2">--}}
												{{--		<div--}}
												{{--				class="w-3 h-3 mr-2 bg-gray-200 rounded-full ring-offset-1 hover:ring-2 hover:ring-gray-200">--}}
												{{--		</div>--}}
												{{--		<img--}}
												{{--				class="w-10 h-10 rounded-full"--}}
												{{--				src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"--}}
												{{--				alt=""--}}
												{{--		>--}}
												{{--		<div class="ml-3">--}}
												{{--			<p class="text-sm font-medium text-gray-900">Calvin--}}
												{{--				Hawkins--}}
												{{--			</p>--}}
												{{--			<p class="text-sm text-gray-500">--}}
												{{--				calvin.hawkins@example.com--}}
												{{--			</p>--}}
												{{--		</div>--}}
												{{--	</li>--}}
												{{--</x-dropdown-link>--}}
											</ul>

											<div class="my-5 text-center">
												<x-icon
														name="bell"
														class="w-12 h-12 mx-auto text-gray-300 transform rotate-12"
												></x-icon>
												<h3 class="mt-2 text-sm font-medium text-gray-900">{{ __('Nessuna notifica') }}</h3>
												<p class="mt-1 text-sm text-gray-500">
													{{ __('Al momento non ci sono notifiche.') }}
												</p>
											</div>
										</x-slot>
									</x-dropdown>
								</div>

								<!-- Settings Dropdown -->
								<div class="relative cursor-pointer">
									<x-dropdown
											align="right"
											width="48"
									>
										<x-slot name="trigger">

												<span class="inline-flex rounded-md">
														<button
																type="button"
																class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none"
														>
															{{ Auth::user()->name }}

															<svg
																	class="ml-2 -mr-0.5 h-4 w-4"
																	xmlns="http://www.w3.org/2000/svg"
																	viewBox="0 0 20 20"
																	fill="currentColor"
															>
																<path
																		fill-rule="evenodd"
																		d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
																		clip-rule="evenodd"
																/>
															</svg>
														</button>
													</span>
										</x-slot>

										<x-slot name="content">
											<div class="divide-y">
												@role('business')
												<!-- Account Management -->
												<div class="block px-4 py-2 text-xs text-gray-400">
													{{ __('Impostazioni Account') }}
												</div>

												<x-dropdown-link href="{{ route('profile') }}" class="!border-t-0">
													{{ __('Profilo') }}
												</x-dropdown-link>
												@endrole

												<!-- Authentication -->
												<form
														method="POST"
														action="{{ route('logout') }}"
												>
													@csrf

													<x-dropdown-link
															href="{{ route('logout') }}"
															onclick="event.preventDefault();
																																																																																																																				this.closest('form').submit();"
													>
														{{ __('Esci') }}
													</x-dropdown-link>
												</form>
											</div>
										</x-slot>
									</x-dropdown>
								</div>
							</div>
						</div>
					</div>
					{{-- <div class="lg:hidden">
						<button
							x-on:click="isOpen = true"
							type="button"
							class="inline-flex items-center justify-center w-12 h-12 -mr-3 text-gray-500 rounded-md hover:text-gray-900"
						>
							<span class="sr-only">Open sidebar</span>
							<x-icon
								name="menu"
								class="w-6 h-6"
							></x-icon>
						</button>
					</div> --}}
				</div>
			</div>
		</div>
		{{-- Content --}}
		<div
				x-data="{ openSidebar: false }"
				x-on:open-sidebar.window="openSidebar = !openSidebar"
				class="relative z-0 flex flex-1 overflow-hidden"
		>
			@if (isset($lside))
				<aside
						x-cloak
						class="flex-shrink-0 overflow-y-auto transform border-r border-gray-200 xl:order-first xl:flex xl:flex-col w-96"
						x-bind:class="openSidebar ? 'absolute xl:relative inset-0 z-10 max-w-xs lg:max-w-full' : 'relative hidden'"
				>
					<!-- Start secondary column (hidden on smaller screens) -->
					<div>
						{{ $lside }}
					</div>
					<!-- End secondary column -->
				</aside>
			@endif
			<main
					class="relative z-0 flex-1 focus:outline-none xl:order-last"
					x-bind:class="openSidebar ? 'overflow-hidden' : 'overflow-y-auto'"
			>
				{{-- Mobile overlay --}}
				<div
						x-cloak
						x-show="openSidebar"
						x-on:click.stop="openSidebar = false"
						x-on:resize.window="openSidebar = window.outerWidth > 1280 ? false : openSidebar"
						class="absolute inset-0 z-10 h-screen bg-gray-500/75 xl:hidden"
				></div>
				<!-- Start main area-->
				@isset($header)
					{{ $header }}
				@endisset
				<div class="container mx-auto p-4">
					{{ $slot }}
				</div>
				<!-- End main area -->
			</main>
			@if (isset($rside))
				<aside
						class="relative flex-shrink-0 hidden overflow-y-auto border-l border-gray-200 xl:order-last xl:flex xl:flex-col w-96"
				>
					<!-- Start secondary column (hidden on smaller screens) -->
					<div>
						{{ $rside }}
					</div>
					<!-- End secondary column -->
				</aside>
			@endif
		</div>
	</div>
</div>
@stack('modals')
@stack('notifications')
@stack('scripts')
@livewireScripts
@livewireCalendarScripts
@livewire('livewire-ui-modal')
</body>
</html>
