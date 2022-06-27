<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class ComputoInterventionRowDetail extends Model
	{
		protected $guarded = [];

		public function intervention() {
			return $this->belongsTo(ComputoInterventionRow::class, 'parent_id', 'id');
		}
	}
