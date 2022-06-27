<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class ComputoPriceList extends Model
	{
		protected $guarded = [];

		public function price_row() {
			return $this->hasMany(ComputoPriceListRow::class, 'folder_id', 'id');
		}
	}
