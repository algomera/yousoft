<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condomini extends Model
{
    protected $guarded = [];

	public function setCFAttribute($value) {
		$this->attributes['cf'] = strtoupper($value);
	}

	public function getFullNameAttribute() {
		return $this->name . ' ' . $this->surname;
	}

    public function practice() {
        return $this->belongsTo(Practice::class);
    }

    public function condensing_boilers() {
        return $this->hasMany(CondensingBoiler::class, 'condomino_id', 'id');
    }

    public function heat_pumps() {
        return $this->hasMany(HeatPump::class, 'condomino_id', 'id');
    }

    public function absorption_heat_pumps() {
        return $this->hasMany(AbsorptionHeatPump::class, 'condomino_id', 'id');
    }

    public function hybrid_systems() {
        return $this->hasMany(HybridSystem::class, 'condomino_id', 'id');
    }

    public function microgeneration_systems() {
        return $this->hasMany(MicrogenerationSystem::class, 'condomino_id', 'id');
    }

    public function water_heatpumps_installations() {
        return $this->hasMany(WaterHeatpumpsInstallation::class, 'condomino_id', 'id');
    }

    public function biome_generators() {
        return $this->hasMany(BiomeGenerator::class, 'condomino_id', 'id');
    }

    public function solar_panels() {
        return $this->hasMany(SolarPanel::class, 'condomino_id', 'id');
    }

	public function sunscreens() {
		return $this->hasMany(Sunscreen::class);
	}

	public function photovoltaics() {
		return $this->hasMany(Photovoltaic::class);
	}

	public function building_automations() {
		return $this->hasMany(BuildingAutomation::class);
	}

	public function towed_intervention() {
		return $this->hasOne(TowedIntervention::class, 'condomino_id');
	}
}
