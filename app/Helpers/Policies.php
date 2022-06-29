<?php

	namespace App\Helpers;

	use App\Policy;

	class Policies
	{
		//create practice default contract
		public static function createInitialPolicies($id) {
			$data = [
				[
					'practice_id' => $id,
					'name'        => 'Polizza 1.pdf',
					'path'        => 'default/fac-simile.pdf'
				],
				[
					'practice_id' => $id,
					'name'        => 'Polizza 2.pdf',
					'path'        => 'default/fac-simile.pdf'
				],
				[
					'practice_id' => $id,
					'name'        => 'Polizza 3.pdf',
					'path'        => 'default/fac-simile.pdf'
				]
			];
			foreach ($data as $d) {
				Policy::create($d);
			}
		}
	}

	?>