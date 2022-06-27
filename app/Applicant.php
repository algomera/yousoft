<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Applicant extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $primaryKey = 'id';

	public function setCFAttribute($value) {
		$this->attributes['c_f'] = strtoupper($value);
	}

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function practice()
    {
        return $this->hasOne(Practice::class);
    }
}
