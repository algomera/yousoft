<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class ComputoFeesAmount extends Model
	{
		protected $guarded = [];

		public function practice() {
			return $this->belongsTo(Practice::class);
		}

		public function folder() {
			return $this->belongsTo(ComputoInterventionFolder::class, 'intervention_folder_id', 'id');
		}
	}
