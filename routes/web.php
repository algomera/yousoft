<?php

	use App\{Http\Controllers\PageController,
		Http\Livewire\Practice\Index as PracticeIndex,
		Http\Livewire\Practice\Show as PracticeShow,
		Http\Livewire\Anagrafica\Index as AnagraficaIndex,
		Http\Livewire\Users\Index as UserIndex,
		Http\Livewire\ContractualDocument\Index as ContractualDocumentIndex,
		Http\Livewire\PriceList\Index as PriceListIndex,
		Http\Livewire\FolderFileManagement\Index as FolderFileManagementIndex,
		Practice,
		Condomini,
		Photo,
		Video};
	use App\Helpers\Interventi;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Auth;
	use App\Http\Resources\{PhotoResource, VideoResource};

	// Auth routes
	Auth::routes();
	// Guest routes
	Route::middleware('guest')->get('/', function () {
		return view('auth.login');
	});
	// Authenticated routes
	Route::middleware('auth')->group(function () {
		// Different Dashboard based on user role (es. [PageController::class, 'business'] => 'dashboards.business')
		Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
		// Common routes protected by permissions (es. [Practice::class, 'index'] => 'access_practices')
		Route::middleware(['permission:access_practices'])->group(function () {
			// Profilo
			Route::get('/profile', 'PageController@profile')->name('profile');
			// Pratiche
			Route::name('practice.')->group(function() {
				Route::get('/practice', [PracticeIndex::class, '__invoke'])->name('index');
				Route::get('/practice/{practice}', [PracticeShow::class, '__invoke'])->name('edit');
				// Building
				Route::get('/condomini_export/{practice}', 'CondominiController@export')->name('condomini.export');
			});
			// Anagrafiche
			Route::name('anagrafiche.')->group(function() {
				Route::get('/anagrafiche', [AnagraficaIndex::class, '__invoke'])->name('index');
			});

			// Gestione Accessi
			Route::name('users.')->group(function() {
				Route::get('/users', [UserIndex::class, '__invoke'])->name('index');
			});

			// Gestione Cartelle/File
			Route::name('folder-file-management.')->group(function() {
				Route::get('/folder', [FolderFileManagementIndex::class, '__invoke'])->name('index');
			});
//			Route::resource('/folder', 'FolderController');
//			Route::resource('/file', 'FileController');

			// Documenti contrattuali
			Route::name('contractual_documents.')->group(function() {
				Route::get('/contractual_documents', [ContractualDocumentIndex::class, '__invoke'])->name('index');
			});

			Route::name('price_list.')->group(function() {
				Route::get('/price_list', [PriceListIndex::class, '__invoke'])->name('index');
			});

			//Superbonus
			Route::get('/superbonus/final_state/{practice}', 'SuperBonusController@final_state')->where('practice', '[0-9]+')->name('final_state');
			Route::put('/superbonus/final_state/{practice}/update', 'SuperBonusController@update_final_state')->where('practice', '[0-9]+')->name('update_final_state');
			Route::get('/superbonus/fees_declaration/{practice}', 'SuperBonusController@fees_declaration')->where('practice', '[0-9]+')->name('fees_declaration');
			Route::get('/superbonus/var_computation/{practice}', 'SuperBonusController@var_computation')->where('practice', '[0-9]+')->name('var_computation');
			Route::put('/superbonus/var_computation/{practice}/update', 'SuperBonusController@update_var_computation')->where('practice', '[0-9]+')->name('update_var_computation');
			// Superfici 'Interventi Trainanti/Trainati'
			Route::post('/save_type_data/{type}', function ($type, Request $request) {
				$pid = $request->get('practice');
				$practice = Practice::find($pid);
				$items = $request->get('surfaces');
				foreach ($items as $i => $item) {
					if (is_numeric($i)) {
						$practice->surfaces()->create($item);
					} else if (is_string($i)) {
						$pn = explode('-', $i)[0];
						$sn = explode('-', $i)[1];
						$practice->surfaces()->updateOrCreate(['id' => $sn, 'practice_id' => $pn], ["is_common" => $item['is_common'] ?? false, "condomino_id" => $item['condomino_id'], "type" => $item['type'], "intervention" => $item['intervention'], "description_surface" => $item['description_surface'], "surface" => $item['surface'], "trasm_ante" => $item['trasm_ante'], "trasm_post" => $item['trasm_post'], "trasm_term" => $item['trasm_term'], "confine" => $item['confine'], "insulation" => $item['insulation'],]);
					}
				}
			});
			// Intervention delete
			Route::delete('/condensing_boilers/{id}/delete', 'InterventionController@deleteCondensingBoilers');
			Route::delete('/heat_pumps/{id}/delete', 'InterventionController@deleteHeatPumps');
			Route::delete('/absorption_heat_pumps/{id}/delete', 'InterventionController@deleteAbsorptionHeatPumps');
			Route::delete('/hybrid_systems/{id}/delete', 'InterventionController@deleteHybridSystems');
			Route::delete('/microgeneration_systems/{id}/delete', 'InterventionController@deleteMicrogenerationSystems');
			Route::delete('/water_heatpumps_installations/{id}/delete', 'InterventionController@deleteWaterHeatpumpsInstallations');
			Route::delete('/biome_generators/{id}/delete', 'InterventionController@deleteBiomeGenerators');
			Route::delete('/solar_panels/{id}/delete', 'InterventionController@deleteSolarPanels');
		});
	});