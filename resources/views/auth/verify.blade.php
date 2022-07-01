@extends('layouts.base')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('Verifica il tuo indirizzo Email') }}</div>

					<div class="card-body">
						@if (session('resent'))
							<div class="alert alert-success" role="alert">
								{{ __('Un nuovo link di verifica è stato inviato al vostro indirizzo email.') }}
							</div>
						@endif

						{{ __('Prima di procedere, controlla la tua email per ottenere il link di verifica.') }}
						{{ __('Se non hai ricevuto l\'e-mail') }},
						<form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
							@csrf
							<button type="submit"
							        class="btn btn-link p-0 m-0 align-baseline">{{ __('clicca qui per inviarla di nuovo') }}</button>
							.
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
