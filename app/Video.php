<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Video extends Model
	{
		protected $guarded = [];

		public function getPathAttribute() {
			return 'storage/' . $this->video;
		}

		public function getPosterPathAttribute() {
			return '/storage/' . $this->poster;
		}

		public function practice() {
			return $this->belongsTo(Practice::class);
		}
	}
