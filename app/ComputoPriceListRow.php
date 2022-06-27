<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

	class ComputoPriceListRow extends Model
	{
		use HasRecursiveRelationships;

		protected $guarded = [];

		public function price_list() {
			return $this->belongsTo(ComputoPriceList::class, 'folder_id', 'id');
		}
	}
