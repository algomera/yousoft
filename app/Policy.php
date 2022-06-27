<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
        'practice_id',
        'name',
        'path'
    ];


    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }
    public function modifieds()
    {
        return $this->hasMany(Modified::class);
    }
}
