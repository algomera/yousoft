<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modified extends Model
{
    protected $fillable = [
        'policy_id',
        'name',
        'path'
    ];
    public function policy(){
        return $this->belongsTo(Policy::class);
    }
}
