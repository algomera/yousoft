<?php

	namespace Database\Seeders;

	use Illuminate\Database\Seeder;
	use Faker\Generator as faker;
	use App\Folder;

	class FolderSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run(Faker $faker) {
			$name = [
				[
					'name' => 'cartella inizio lavori'
				],
				[
					'name' => 'cartella lavori edili'
				],
				[
					'name' => 'cartella fine lavori'
				],
				[
					'name' => 'cartella approvazione lavori'
				],
				[
					'name' => 'cartella consulente lavori'
				],
			];
			for ($i = 0; $i < 5; $i++) {
				$d = new Folder;
				$d->user_id = $faker->numberBetween(1, 5);
				$d->created_by = 'Mps';
				$d->name = $name[$i]['name'];
				$d->type = 'documenti vari';
				$d->save();
			}
		}
	}
