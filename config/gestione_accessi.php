<?php
	return [
		'admin' => [
			'admin' => 'Amministratore',
			'financial' => 'Società Finanziaria', // genitore
			'bank' => 'Banca', // genitore
			'business' => 'Impresa',
			'collaborator' => 'Collaboratore', // creato da admin, associato ad impresa/e
			'consultant' => 'Consulente', // creato da admin, associato ad impresa/e
			'technical_asseverator' => 'Asseveratore Tecnico', // creato da admin, associato ad impresa/e
			'fiscal_asseverator' => 'Asseveratore Fiscale' // creato da admin, associato ad impresa/e
		],
		'financial' => [
			'bank' => 'Banca', // se creata da financial, viene automaticamente associata SOLO ad essa
			'business' => 'Impresa', // se creata da financial, viene automaticamente associata SOLO ad essa
		],
		'bank' => [
			'business' => 'Impresa', // se creata da bank, viene automaticamente associata SOLO ad essa
		],
		'business' => [
			'collaborator' => 'Collaboratore', // se creato da business, viene automaticamente associato SOLO ad esso
		],
		'collaborator' => [
			//
		],
		'consultant' => [
			//
		],
		'technical_asseverator' => [
			//
		],
		'fiscal_asseverator' => [
			//
		],
		'manager' => [
			//
		],
	];
