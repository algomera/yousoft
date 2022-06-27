<?php

	use App\ComputoInterventionFolder;
	use Illuminate\Database\Seeder;

	class ComputoInterventionFolderSeeder extends Seeder
	{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run() {
			$folders = [
				[
					'name'     => 'Interventi Trainanti',
					'children' => [
						[
							'name' => 'Isolamento Termico',
						],
						[
							'name' => 'Sostituzione degli Impianti',
						],
						[
							'name' => 'Interventi di miglioramento Sismico',
						],
					],
				],
				[
					'name'     => 'Interventi Trainati',
					'children' => [
						[
							'name' => 'Isolamento Termico',
						],
						[
							'name' => 'Sostituzione degli infissi',
						],
						[
							'name' => 'Schermature solari e chiusure oscuranti',
						],
						[
							'name' => 'Sostituzione degli Impianti',
						],
						[
							'name' => 'Sistemi di microgenerazione',
						],
						[
							'name' => 'Generatori a biomassa',
						],
						[
							'name' => 'Building Automation',
						],
						[
							'name' => 'Collettori Solari',
						],
						[
							'name' => 'Fotovoltaio',
						],
						[
							'name' => 'Sistema di Accumulo',
						],
						[
							'name' => 'Infrastrutture di ricarica',
						],
						[
							'name' => 'Eliminazione barriere architettoniche',
						],
					]
				],
			];
			foreach ($folders as $folder) {
				$f = ComputoInterventionFolder::create([
					'name' => $folder['name']
				]);
				foreach ($folder['children'] as $child) {
					ComputoInterventionFolder::create([
						'parent_id' => $f->id,
						'name'      => $child['name']
					]);
				}
			}
		}
	}
