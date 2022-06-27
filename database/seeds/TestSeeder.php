<?php

use App\Anagrafica;
use App\Building;
use App\Data_project;
use App\FinalState;
use App\FolderDocument;
use App\Practice;
use App\Subject;
use App\SubjectRole;
use App\TowedIntervention;
use App\Variant;
use App\DrivingIntervention;
use Faker\Generator as faker;
use App\Business;
use App\User;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $this->call(CountrySeeder::class);
        $this->call(SubjectRoleSeeder::class);

        // Utente Impresa
        $business = User::create([
            'created_by' => 'financial',
            'name' => "Impresa Example",
            'referent' => $faker->name(),
            'email' => 'impresa@example.test',
            'password' => bcrypt('password'),
            'role' => 'business',
        ]);
        Business::create([
            'created_by' => 'financial',
            'user_id' => $business->id,
            'name' => "Impresa Example",
            'email' => 'impresa@example.test',
            'password' => bcrypt('password'),
        ]);

        // Applicant
        $applicant = $business->applicant()->create();

        // Pratica
        $practice = Practice::create([
            'applicant_id'=> $applicant->id
        ]);

        // Subject
        $subject = Subject::create([
            'practice_id' => $practice->id
        ]);

        // Building
        $building = Building::create([
            'practice_id' => $practice->id
        ]);

        // Superbonus
        Data_project::create([
            'practice_id' => $practice->id
        ]);
        DrivingIntervention::create([
            'practice_id' => $practice->id
        ]);
        TowedIntervention::create([
            'practice_id' => $practice->id
        ]);
        FinalState::create([
            'practice_id' => $practice->id
        ]);
        Variant::create([
            'practice_id' => $practice->id
        ]);

        // Documents
        $list_folder = [
            [
                'practice_id'=> $practice->id,
                'name' => 'Documenti necessari PRIMA dell\'inizio dei lavori'
            ],
            [
                'practice_id'=> $practice->id,
                'name' => 'Documenti necessari DURANTE i lavori'
            ],
            [
                'practice_id'=> $practice->id,
                'name' => 'Documenti necessari AL TERMINE dei lavori'
            ]

        ];
        for ($i = 0; $i < count($list_folder); $i++) {
            FolderDocument::create($list_folder[$i]);
        }

        // Anagrafica
        $azienda = Anagrafica::create([
            'user_id' => $business->id,
            'subject_type' => config('anagrafiche.subject_types.AZIENDA'),
            'company_name' => $faker->company(),
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'consultant_type' => config('anagrafiche.consultant_types.PROFESSIONISTA'),
            'address' => $faker->address(),
            'zip' => '36012',
            'city' => $faker->city(),
            'province' => 'VI',
            'iban' => $faker->iban('IT'),
        ]);

        $area_manager = Anagrafica::create([
            'user_id' => $business->id,
            'subject_type' => config('anagrafiche.subject_types.AREA_MANAGER'),
            'company_name' => $faker->company(),
            'first_name' => $faker->firstName(),
            'last_name' => $faker->lastName(),
            'consultant_type' => config('anagrafiche.consultant_types.FINANZIARIO'),
            'address' => $faker->address(),
            'zip' => '36010',
            'city' => $faker->city(),
            'province' => 'VI',
            'iban' => $faker->iban('IT'),
        ]);

        // Anagrafica - Role
        $azienda->roles()->attach([1,4,10]);
        $area_manager->roles()->attach([1, 17]);
    }
}
