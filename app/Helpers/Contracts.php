<?php

	namespace App\Helpers;

	use App\Contract;

	class Contracts
	{
		//create practice default contract
		public static function createInitialContracts($id) {
			$data = [
				[
					'practice_id' => $id,
					'name'        => 'Contratto 1.pdf',
					'path'        => 'default/fac-simile.pdf'
				],
				[
					'practice_id' => $id,
					'name'        => 'Contratto 2.pdf',
					'path'        => 'default/fac-simile.pdf'
				],
				[
					'practice_id' => $id,
					'name'        => 'Contratto 3.pdf',
					'path'        => 'default/fac-simile.pdf'
				]
			];
			foreach ($data as $d) {
				Contract::create($d);
			}
		}
	}

	?>