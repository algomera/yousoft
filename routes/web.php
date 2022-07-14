<?php

	use App\{Http\Controllers\PageController,
		Http\Livewire\Practice\Index as PracticeIndex,
		Http\Livewire\Practice\Show as PracticeShow,
		Http\Livewire\Anagrafica\Index as AnagraficaIndex,
		Http\Livewire\Users\Index as UserIndex,
		Http\Livewire\ContractualDocument\Index as ContractualDocumentIndex,
		Http\Livewire\PriceList\Index as PriceListIndex,
		Http\Livewire\FolderFileManagement\Index as FolderFileManagementIndex};
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Auth;

	// Auth routes
	Auth::routes();
	// Guest routes
	Route::middleware('guest')->get('/', function () {
		return view('auth.login');
	});
	// Authenticated routes
	Route::middleware('auth')->group(function () {
		// Different Dashboard based on user role (es. [PageController::class, 'business'] => 'dashboards.business')
		Route::get('/dashboard', [
			PageController::class,
			'dashboard'
		])->name('dashboard');
		// Profilo
		Route::get('/profile', 'PageController@profile')->name('profile');
		// Common routes protected by permissions (es. [Practice::class, 'index'] => 'access_practices')
		// Pratiche
		Route::name('practice.')->middleware(['permission:access_practices'])->group(function () {
			Route::get('/practice', [
				PracticeIndex::class,
				'__invoke'
			])->name('index');
			Route::get('/practice/{practice}', [
				PracticeShow::class,
				'__invoke'
			])->name('edit');
			// Building
			Route::get('/condomini_export/{practice}', 'CondominiController@export')->name('condomini.export');
		});
		// Calendario
		Route::name('calendar.')->middleware(['permission:access_calendar'])->group(function() {
			Route::get('/calendar', function () {
				return view('calendar.index');
			})->name('index');
		});
		// Anagrafiche
		Route::name('anagrafiche.')->middleware(['permission:access_anagrafiche'])->group(function () {
			Route::get('/anagrafiche', [
				AnagraficaIndex::class,
				'__invoke'
			])->name('index');
		});
		// Gestione Accessi
		Route::name('users.')->middleware(['permission:access_users'])->group(function () {
			Route::get('/users', [
				UserIndex::class,
				'__invoke'
			])->name('index');
		});
		// Gestione Cartelle/File
		Route::name('folder-file-management.')->middleware(['permission:access_folders'])->group(function () {
			Route::get('/folder', [
				FolderFileManagementIndex::class,
				'__invoke'
			])->name('index');
		});
		// Documenti Contrattuali
		Route::name('contractual_documents.')->middleware(['permission:access_contractual_documents'])->group(function () {
			Route::get('/contractual_documents', [
				ContractualDocumentIndex::class,
				'__invoke'
			])->name('index');
		});
		// Prezzari DEI
		Route::name('price_list.')->middleware(['permission:access_price_lists'])->group(function () {
			Route::get('/price_list', [
				PriceListIndex::class,
				'__invoke'
			])->name('index');
		});
	});