<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FolderDocument extends Model
{
    protected $guarded = [];

    public function practice() {
        return $this->belongsTo(Practice::class);
    }

    public function sub_folder()
    {
        return $this->hasMany(Sub_folder::class);
    }

}
