<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable =[
        'practice_id',
        'name',
        'tipology',
        'path'
    ];

    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }

    public function signeds(){
        return $this->hasMany(Signed::class);
    }
}
