@extends('layouts.base')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('Registrati') }}</div>

					<div class="card-body">
						<form method="POST" action="{{ route('register') }}">
							@csrf

							<div class="form-group row">
								<label for="parent"
								       class="col-md-4 col-form-label text-md-right">{{ __('Creato da') }}</label>

								<div class="col-md-6">
									<select name="parent" id="parent">
										@foreach ($users as $user)
											<option value="{{$user->id}}">{{$user->name}}</option>
										@endforeach
									</select>

									@error('parent')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

								<div class="col-md-6">
									<input id="name" type="text"
									       class="form-control @error('name') is-invalid @enderror" name="name"
									       value="{{ old('name') }}" required autocomplete="name" autofocus>

									@error('name')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="email"
								       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

								<div class="col-md-6">
									<input id="email" type="email"
									       class="form-control @error('email') is-invalid @enderror" name="email"
									       value="{{ old('email') }}" required autocomplete="email">

									@error('email')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password"
								       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

								<div class="col-md-6">
									<input id="password" type="password"
									       class="form-control @error('password') is-invalid @enderror" name="password"
									       required autocomplete="new-password">

									@error('password')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password-confirm"
								       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control"
									       name="password_confirmation" required autocomplete="new-password">
								</div>
							</div>

							<div class="form-group row">
								<label for="role" class="col-md-4 col-form-label text-md-right">Scegli il ruolo!</label>
								<select class="form-control col-md-6" name="role" id="role">
									<optgroup label="Ruoli">
										<option value="admin">Admin</option>
										<option value="financial">Finanziaria</option>
										<option value="bank">Banca</option>
										<option value="business">Impresa</option>
										<option value="collaborator">Collaboratore</option>
										<option value="consultant">Consulente</option>
										<option value="technical_asseverator">Asseveratore Tecnico</option>
										<option value="fiscal_asseverator">Asseveratore Fiscale</option>
										<option value="manager">Manager</option>
										<option value="provider">Fornitore</option>
										<option value="condominium">Condominio</option>
									</optgroup>
									<optgroup label="Agenti immobiliari">
										<option value="lv1_agent">Agente lv.1</option>
										<option value="lv2_agent">Agente lv.2</option>
									</optgroup>
								</select>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary">
										{{ __('Register') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
