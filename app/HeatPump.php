<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeatPump extends Model
{
    protected $guarded = [];

    public function practice() {
        return $this->belongsTo(Practice::class);
    }
}
