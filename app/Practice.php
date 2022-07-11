<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Practice extends Model
	{
		protected $guarded = [];
		protected $casts = [
			'import'        => 'float',
			'import_sal'    => 'float',
			'c_m'           => 'float',
			'assev_tecnica' => 'float',
			'policy'        => 'boolean',
			'superbonus'    => 'boolean',
			'practice_ok'   => 'boolean',
		];

		public function scopeWithParents($query) {
			return $query->whereIn('user_id', auth()->user()->parents->pluck('id'))->orWhere('user_id', auth()->id());
		}

		public function applicant() {
			return $this->belongsTo(Applicant::class);
		}

		public function subject() {
			return $this->hasOne(Subject::class);
		}

		public function building() {
			return $this->hasOne(Building::class);
		}

		public function data_project() {
			return $this->hasOne(Data_project::class);
		}

		public function driving_intervention() {
			return $this->hasOne(DrivingIntervention::class);
		}

		public function towed_intervention() {
			return $this->hasMany(TowedIntervention::class);
		}

		public function final_state() {
			return $this->hasOne(FinalState::class);
		}

		public function variant() {
			return $this->hasOne(Variant::class);
		}

		public function fees_declarations() {
			return $this->hasOne(FeesDeclaration::class);
		}

		public function condomini() {
			return $this->hasMany(Condomini::class);
		}

		public function fixtures() {
			return $this->hasMany(Fixture::class);
		}

		public function condensing_hot_air_generators() {
			return $this->hasMany(CondensingHotAirGenerator::class);
		}

		public function condensing_boilers() {
			return $this->hasMany(CondensingBoiler::class);
		}

		public function heat_pumps() {
			return $this->hasMany(HeatPump::class);
		}

		public function absorption_heat_pumps() {
			return $this->hasMany(AbsorptionHeatPump::class);
		}

		public function hybrid_systems() {
			return $this->hasMany(HybridSystem::class);
		}

		public function microgeneration_systems() {
			return $this->hasMany(MicrogenerationSystem::class);
		}

		public function water_heatpumps_installations() {
			return $this->hasMany(WaterHeatpumpsInstallation::class);
		}

		public function biome_generators() {
			return $this->hasMany(BiomeGenerator::class);
		}

		public function solar_panels() {
			return $this->hasMany(SolarPanel::class);
		}

		public function sunscreens() {
			return $this->hasMany(Sunscreen::class);
		}

		public function building_automations() {
			return $this->hasMany(BuildingAutomation::class);
		}

		public function photovoltaics() {
			return $this->hasMany(Photovoltaic::class);
		}

		public function folder_documents() {
			return $this->hasMany(FolderDocument::class);
		}

		public function sub_folder() {
			return $this->hasMany(Sub_folder::class);
		}

		public function surfaces() {
			return $this->hasMany(Surface::class);
		}

		public function photos() {
			return $this->hasMany(Photo::class);
		}

		public function videos() {
			return $this->hasMany(Video::class);
		}

		public function contracts() {
			return $this->hasMany(Contract::class);
		}

		public function policies() {
			return $this->hasMany(Policy::class);
		}

		public function generators() {
			return $this->hasMany(Generator::class);
		}

		public function fees_amount() {
			return $this->hasMany(ComputoFeesAmount::class);
		}
	}
