<?php

	use App\Helpers\ContractualDocuments;
	use App\UserData;
	use Illuminate\Database\Seeder;
	use Faker\Generator as faker;
	use App\User;
	use Spatie\Permission\Models\Role;

	class UserSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run(Faker $faker) {
			// Utente Admin
			$admin = User::create([
				'email'    => 'admin@example.test',
				'password' => bcrypt('password'),
			]);
			// Utenti Impresa
			$primehub = User::create([
				'email'    => 'info@primehub.it',
				'password' => bcrypt('5Bcontent'),
			]);
			$edrasis = User::create([
				'email'    => 'info@edrasis.it',
				'password' => bcrypt('5Bcontent'),
			]);
			// Utenti Banca
			$novello = User::create([
				'email'    => 'p.novello@integrabusiness.net',
				'password' => bcrypt('5Bcontent'),
			]);
			$tasrl = User::create([
				'email'    => 'tasrl1202@gmail.com',
				'password' => bcrypt('5Bcontent'),
			]);
			$banca = User::create([
				'email'    => 'banca@example.test',
				'password' => bcrypt('password'),
			]);
			// Utenti Asseveratore Tecnico e Fiscale
			$asst = User::create([
				'email'    => 'asst@example.test',
				'password' => bcrypt('password'),
			]);
			$assf = User::create([
				'email'    => 'assf@example.test',
				'password' => bcrypt('password'),
			]);
			// Creo UserData per admin
			UserData::create([
				'user_id'    => $admin->id,
				'created_by' => null,
				'name'       => "Administrator",
			]);
			// Creo UserData per Imprese
			UserData::create([
				'user_id'    => $primehub->id,
				'created_by' => $admin->id,
				'name'       => "Impresa Example",
				'referent'   => $faker->name(),
			]);
			UserData::create([
				'user_id'    => $edrasis->id,
				'created_by' => $admin->id,
				'name'       => "Edrasis Group",
				'referent'   => $faker->name(),
			]);
			// Creo UserData per Banche
			UserData::create([
				'user_id'    => $novello->id,
				'created_by' => $admin->id,
				'name'       => "Integrabusiness",
			]);
			UserData::create([
				'user_id'    => $tasrl->id,
				'created_by' => $admin->id,
				'name'       => "Ta S.r.l",
			]);
			UserData::create([
				'user_id'    => $banca->id,
				'created_by' => $admin->id,
				'name'       => "Banca di Prova",
			]);
			// Creo UserData per Asseveratori Tecnico/Fiscale
			UserData::create([
				'user_id'    => $asst->id,
				'created_by' => $admin->id,
				'name'       => "Assev. Tecnico",
			]);
			UserData::create([
				'user_id'    => $assf->id,
				'created_by' => $admin->id,
				'name'       => "Assev. Fiscale",
			]);
			// Assegno ruolo "admin" all'utente "Administrator"
			$admin->assignRole(Role::findByName('admin'));
			// Assegno ruolo "business" all'utente "Primehub" e creo Documenti Contrattuali
			$primehub->assignRole(Role::findByName('business'));
			ContractualDocuments::createInitialContractualDocuments($primehub->id);
			// Assegno ruolo "business" all'utente "Edrasis" e creo Documenti Contrattuali
			$edrasis->assignRole(Role::findByName('business'));
			ContractualDocuments::createInitialContractualDocuments($edrasis->id);
			// Assegno ruolo "*_asseverator" agli utenti "Assev. Tecnico" e "Assev. Fiscale"
			$asst->assignRole(Role::findByName('technical_asseverator'));
			$assf->assignRole(Role::findByName('fiscal_asseverator'));
			// Assegno ruolo "bank" all'utente "Banca"
			$banca->assignRole(Role::findByName('bank'));
			// Assegno ruolo "bank" all'utente "Novello"
			$novello->assignRole(Role::findByName('bank'));
			// Assegno ruolo "bank" all'utente "Ta S.r.l"
			$tasrl->assignRole(Role::findByName('bank'));
			// Assegno ruolo "technical_asseverator" all'utente "Assev. Tecnico"
			$tasrl->assignRole(Role::findByName('technical_asseverator'));
			// Assegno ruolo "fiscal_asseverator" all'utente "Assev. Fiscale"
			$tasrl->assignRole(Role::findByName('fiscal_asseverator'));

			// Associo gli Asseveratori Tecnico e Fiscale all'impresa "Primehub"
			$primehub->childs()->attach($asst);
			$primehub->childs()->attach($assf);
		}
	}
