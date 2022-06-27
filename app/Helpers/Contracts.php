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
					'name'        => 'Contratto.pdf',
					'path'        => 'default/polizza.pdf'
				],
				[
					'practice_id' => $id,
					'name'        => 'Contratto.pdf',
					'path'        => 'default/polizza.pdf'
				],
				[
					'practice_id' => $id,
					'name'        => 'Contratto.pdf',
					'path'        => 'default/polizza.pdf'
				]
			];
			foreach ($data as $d) {
				Contract::create($d);
			}
		}
	}

	?>