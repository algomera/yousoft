<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Photo extends Model
	{
		protected $guarded = [];

		public function getPathAttribute() {
			return 'storage/' . $this->image;
		}

		public function practice() {
			return $this->belongsTo(Practice::class);
		}
	}
