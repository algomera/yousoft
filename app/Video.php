<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Video extends Model
	{
		protected $fillable = [
			'practice_id',
			'name',
			'video',
			'description',
			'reference',
			'inspection_date',
		];

		public function getNameAttribute($value) {
			$v = explode('_#_', $value);
			return $v[0];
		}

		public function getPathAttribute() {
			return 'storage/' . $this->video;
		}

		public function practice() {
			return $this->belongsTo(Practice::class);
		}
	}
