<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Subject extends Model
	{
		//fillable items
		protected $fillable = [
			'practice_id',
			'general_contractor',
			'construction_company',
			'hydrothermal_sanitary_company',
			'photovoltaic_company',
			'technician_APE_Ante',
			'technician_energy_efficient',
			'technician_APE_Post',
			'structural_engineer',
			'metric_calc_technician',
			'work_director',
			'technical_assev',
			'fiscal_assev',
			'phiscal_transferee',
			'lending_bank',
			'insurer',
			'consultant',
			'signaler',
			'area_manager',
			'project_manager',
			'responsible_technician'
		];

		// relations
		public function practice() {
			return $this->belongsTo(Practice::class);
		}
	}
