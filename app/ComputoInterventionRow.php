<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class ComputoInterventionRow extends Model
	{
		protected $guarded = [];

		public function practice() {
			return $this->belongsTo(Practice::class);
		}

		public function condomino() {
			return $this->belongsTo(Condomini::class);
		}

		public function folder() {
			return $this->belongsTo(ComputoInterventionFolder::class, 'intervention_folder_id', 'id');
		}

		public function details() {
			return $this->hasMany(ComputoInterventionRowDetail::class, 'parent_id' ,'id');
		}

		public function price_row() {
			return $this->belongsTo(ComputoPriceListRow::class, 'price_row_id' ,'id');
		}
	}
