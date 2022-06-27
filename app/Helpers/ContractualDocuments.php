<?php

	namespace App\Helpers;

	use App\ContractualDocument;

	class ContractualDocuments
	{
		public static function createInitialContractualDocuments($id) {
			$documents = [
				'Questionario Antiriciclaggio',
				'Atto Costitutivo',
				'Documento d\'identità',
				'Frontespizio IBAN',
				'Statuto Vigente',
				'Ultimo Bilancio Approvato',
				'Documento Titolare Effettivo 1',
				'Contratto Superbonus 110%',
				'Acc.ctr Superbonus 110%'
			];
			foreach ($documents as $document) {
				ContractualDocument::create([
					'user_id' => $id,
					'name' => $document
				]);
			}
		}
	}

	?>