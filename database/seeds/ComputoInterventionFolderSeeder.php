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
					'code'     => '01',
					'name'     => 'Interventi Trainanti',
					'children' => [
						[
							'code' => '01.01',
							'name' => 'Isolamento Termico',
						],
						[
							'code' => '01.02',
							'name' => 'Sostituzione degli Impianti',
						],
						[
							'code' => '01.03',
							'name' => 'Interventi di miglioramento Sismico',
						],
					],
				],
				[
					'code'     => '02',
					'name'     => 'Interventi Trainati',
					'children' => [
						[
							'code' => '02.01',
							'name' => 'Isolamento Termico',
						],
						[
							'code' => '02.02',
							'name' => 'Sostituzione degli infissi',
						],
						[
							'code' => '02.03',
							'name' => 'Schermature solari e chiusure oscuranti',
						],
						[
							'code' => '02.04',
							'name' => 'Sostituzione degli Impianti',
						],
						[
							'code' => '02.05',
							'name' => 'Sistemi di microgenerazione',
						],
						[
							'code' => '02.06',
							'name' => 'Generatori a biomassa',
						],
						[
							'code' => '02.07',
							'name' => 'Building Automation',
						],
						[
							'code' => '02.08',
							'name' => 'Collettori Solari',
						],
						[
							'code' => '02.09',
							'name' => 'Fotovoltaio',
						],
						[
							'code' => '02.10',
							'name' => 'Sistema di Accumulo',
						],
						[
							'code' => '02.11',
							'name' => 'Infrastrutture di ricarica',
						],
						[
							'code' => '02.12',
							'name' => 'Eliminazione barriere architettoniche',
						],
					]
				],
			];
			foreach ($folders as $folder) {
				$f = ComputoInterventionFolder::create([
					'code' => $folder['code'],
					'name' => $folder['name']
				]);
				foreach ($folder['children'] as $child) {
					ComputoInterventionFolder::create([
						'parent_id' => $f->id,
						'code'      => $child['code'],
						'name'      => $child['name']
					]);
				}
			}
		}
	}
