<?php

	namespace App\Http\Controllers\Auth;

	use App\Http\Controllers\Controller;
	use App\User;
	use Illuminate\Foundation\Auth\AuthenticatesUsers;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;

	class LoginController extends Controller
	{
		/*
		|--------------------------------------------------------------------------
		| Login Controller
		|--------------------------------------------------------------------------
		|
		| This controller handles authenticating users for the application and
		| redirecting them to your home screen. The controller uses a trait
		| to conveniently provide its functionality to your applications.
		|
		*/
		use AuthenticatesUsers;

		/**
		 * Where to redirect users after login.
		 *
		 * @var string
		 */
		//    protected $redirectTo = RouteServiceProvider::HOME;
		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct() {
			$this->middleware('guest')->except('logout');
		}

		public function login(Request $request) {
			$credentials = $request->validate(['email' => 'required|email', 'password' => 'required',]);
			if (Auth::attempt($credentials, $request->has('remember'))) {
				$request->session()->regenerate();
				if (auth()->user()->role->name === 'business') {
					$user = User::where('email', auth()->user()->email)->first();
					$business_data = $user->user_data;
					if (!$business_data->type || !$business_data->p_iva || !$business_data->c_f || !$business_data->legal_form || !$business_data->rea || !$business_data->c_ateco || !$business_data->reg_date) {
						return redirect()->route('profile');
					}
				}
				return redirect()->route('dashboard');
			}
			return back()->withErrors(['email' => 'The provided credentials do not match our records.',]);
		}
	}
