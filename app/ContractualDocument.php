<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\Storage;

	class ContractualDocument extends Model
	{
		protected $guarded = [];

		public function user() {
			return $this->belongsTo(User::class);
		}
	}
