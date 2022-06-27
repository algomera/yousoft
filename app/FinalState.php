<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalState extends Model
{
    protected $guarded = [];

    protected $table = 'finalstatedata';

    public function practice() {
        return $this->belongsTo(Practice::class);
    }
}
