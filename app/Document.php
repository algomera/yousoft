<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [];
    public function sub_folder() {
        return $this->belongsTo(Sub_folder::class);
    }
}
