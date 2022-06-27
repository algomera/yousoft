<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Building extends Model
	{
		protected $guarded = [];

		public function setFiscalCodeAttribute($value) {
			$this->attributes['fiscal_code'] = strtoupper($value);
		}

		public function setAdministratorFiscalCodeAttribute($value) {
			$this->attributes['administrator_fiscalcode'] = strtoupper($value);
		}

		public function practice() {
			return $this->belongsTo(Practice::class);
		}
	}
