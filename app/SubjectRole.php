<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectRole extends Model
{
    protected $guarded = [];

    public function anagrafiche() {
        return $this->belongsToMany(Anagrafica::class, 'anagrafiche_roles');
    }
}
