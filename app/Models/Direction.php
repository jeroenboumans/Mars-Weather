<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Direction extends Model
{
//    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'weather_id',
        "point",
        "degrees",
        "right",
        "up"
    ];

    public function getFillables()
    {
        return $this->fillable;
    }

    public function weather()
    {
        return $this->belongsTo(Weather::class);
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
