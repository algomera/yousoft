<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrivingIntervention extends Model
{
    protected $fillable = [
        'practice_id',
        'thermical_isolation_intervention',
        'total_vertical_walls',
        'vw_realized_1',
        'vw_realized_2',
        'vw_sal_f',
        'total_intervention_surface',
        'total_expected_cost',
        'max_possible_cost',
        'total_isolation_cost_1',
        'total_isolation_cost_2',
        'final_isolation_cost',
        'dispersing_covers',
        'isolation_energetic_savings',
        'winter_acs_replacing',
        'total_power',
        'generators',
        'condensing_boiler',
        'heat_pumps',
        'absorption_heat_pumps',
        'hybrid_system',
        'microgeneration_system',
        'water_heatpumps_installation',
        'biome_generators',
        'solar_panel',
        'solar_panel_use_winter',
        'solar_panel_use_summer',
        'solar_panel_use_water',
        'total_acs_project_cost',
        'total_cost_installations',
        'total_replacing_cost_1',
        'total_replacing_cost_2',
        'final_replacing_cost',
        'replacing_energetic_savings',
    ];

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }
}
