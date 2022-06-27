<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HybridSystem extends Model
{
    protected $guarded = [];

    public function practice() {
        return $this->belongsTo(Practice::class);
    }
}
