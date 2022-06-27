<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

	class ComputoInterventionFolder extends Model
	{
		use HasRecursiveRelationships;

		protected $guarded = [];

		public function interventions() {
			return $this->hasMany(ComputoInterventionRow::class);
		}
	}
