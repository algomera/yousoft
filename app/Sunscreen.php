<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Sunscreen extends Model
	{
		protected $guarded = [];

		public function practice() {
			return $this->belongsTo(Practice::class);
		}

		public function condomino() {
			return $this->belongsTo(Condomini::class);
		}
	}
