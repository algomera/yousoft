<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_folder extends Model
{
    protected $guarded = [];

    public function practice() {
        return $this->belongsTo(Practice::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function folder_document()
    {
        return $this->belongsTo(FolderDocument::class);
    }

}
