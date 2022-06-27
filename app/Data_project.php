<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_project extends Model
{
    protected $fillable = [
        'practice_id',
        'technical_report',
        'filed_common',
        'filed_province',
        'filed_date',
        'filed_protocol',
        'technical_report_exclusion',
        'work_start',
        'end_of_works',
        'type_building',
        'building_unit',
        'relevance',
        'centralized_system',
        'gross_surface_area',
        'np',
        'np_validated',
        'np_not_validated',
    ];

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }


}
