<?php

	namespace App\Http\Controllers;

	use App\Practice;
	use App\User;
	use Illuminate\Http\Request;

	class PageController extends Controller
	{
		/**
		 * Return login page
		 */
		public function index() {
			return view('auth.login');
		}

		/**
		 * Return user's profile page
		 */
		public function profile() {
			return view('pages.profile');
		}

		/**
		 * Return user's role dashboard page
		 */
		public function dashboard() {
			$months = [
				'01' => 'Gennaio',
				'02' => 'Febbraio',
				'03' => 'Marzo',
				'04' => 'Aprile',
				'05' => 'Maggio',
				'06' => 'Giugno',
				'07' => 'Luglio',
				'08' => 'Agosto',
				'09' => 'Settembre',
				'10' => 'Ottobre',
				'11' => 'Novembre',
				'12' => 'Dicembre'
			];
			$regions = [
				"Abruzzo",
				"Basilicata",
				"Calabria",
				"Campania",
				"Emilia-Romagna",
				"Friuli Venezia Giulia",
				"Lazio",
				"Liguria",
				"Lombardia",
				"Marche",
				"Molise",
				"Piemonte",
				"Puglia",
				"Sardegna",
				"Sicilia",
				"Toscana",
				"Trentino-Alto Adige",
				"Umbria",
				"Valle d'Aosta",
				"Veneto",
			];
			switch (auth()->user()->role->name) {
				case 'admin':
					$data = [
						'total_practices'    => Practice::count(),
						'total_business'     => User::role('business')->count(),
						'total_import'       => Practice::sum('import'),
						'total_sal_1_import' => Practice::sum('sal_1_import'),
						'total_sal_2_import' => Practice::sum('sal_2_import'),
						'total_sal_f_import' => Practice::sum('sal_f_import'),
						'months'             => $months,
						'regions'            => $regions,
					];
					break;
				case 'technical_asseverator':
				case 'fiscal_asseverator':
				case 'bank':
					$data = [
						'total_practices'    => Practice::withParents()->count(),
						'total_business'     => auth()->user()->parents()->role('business')->count(),
						'total_import'       => Practice::withParents()->sum('import'),
						'total_sal_1_import' => Practice::withParents()->sum('sal_1_import'),
						'total_sal_2_import' => Practice::withParents()->sum('sal_2_import'),
						'total_sal_f_import' => Practice::withParents()->sum('sal_f_import'),
						'months'             => $months,
						'regions'            => $regions,
					];
					break;
				default:
					$data = [];
			}
			return view('dashboards.' . auth()->user()->role->name)->with('data', $data);
		}
	}