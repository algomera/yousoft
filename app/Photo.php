<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Photo extends Model
	{
		protected $fillable = [
			'practice_id',
			'name',
			'image',
			'description',
			'reference',
			'position'
		];

		public function getNameAttribute($value) {
			$v = explode('_#_', $value);
			return $v[0];
		}

		public function practice() {
			return $this->belongsTo(Practice::class);
		}
	}
