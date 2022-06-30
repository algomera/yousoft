<x-app-layout>
	<x-slot name="header">
		<x-page-header>
			Dashboard
		</x-page-header>
	</x-slot>
	<x-card>
		<div class="space-y-5">
			<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
				<a class="flex items-center justify-center bg-white text-center border p-3" href="{{route('practice.index')}}">
					<div class="dash-box d-flex flex-column align-items-center justify-content-center mx-2">
						<div class="mb-2">
							<img src="{{asset('img/icon/ICONA LISTA PRATICHE.svg')}}" alt="" class="img-fluid">
						</div>
						<p><b>Lista Pratiche</b></p>
					</div>
				</a>

				<a class="flex items-center justify-center bg-white text-center border p-3" href="{{route('users.index')}}">
					<div class="dash-box d-flex flex-column align-items-center justify-content-center mx-2">
						<div class="mb-2">
							<img src="{{asset('img/icon/ICONA GESTIONE ACCESSI.svg')}}" alt="" class="img-fluid">
						</div>
						<p><b>Gestione Accessi</b></p>
					</div>
				</a>
{{--				<a class="flex items-center justify-center bg-white text-center border p-3" href="{{route('folder.index')}}">--}}
{{--					<div class="dash-box d-flex flex-column align-items-center justify-content-center mx-2">--}}
{{--						<div class="mb-2">--}}
{{--							<img src="{{asset('img/icon/ICONA GESTIONE FILE.svg')}}" alt="" class="img-fluid">--}}
{{--						</div>--}}
{{--						<p><b>Gestione File</b></p>--}}
{{--					</div>--}}
{{--				</a>--}}
			</div>
			<div class="space-y-2">
				<h4 class="font-semibold">Scarica l'app</h4>
				<div class="flex">
					<a href="#">
						<img src="{{asset('img/icon/BUTTON_APP_STORE.svg')}}" alt="" class="w-auto h-20">
					</a>
					<a href="#">
						<img src="{{asset('img/icon/BUTTON_GOOGLE_PLAY.svg')}}" alt="" class="w-auto h-20">
					</a>
				</div>
			</div>
		</div>
	</x-card>
</x-app-layout>