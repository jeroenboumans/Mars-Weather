<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
//    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "insight_id",
        "terrestrial_date",
        "sol",
        "ls",
        "season",
        "min_temp",
        "max_temp",
        "pressure",
        "pressure_string",
        "abs_humidity",
        "wind_speed",
        "wind_direction",
        "atmo_opacity",
        "sunrise",
        "sunset",
        "local_uv_irradiance_index",
        "min_gts_temp",
        "max_gts_temp"
    ];

    public function getFillables()
    {
        return $this->fillable;
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
//        'password',
    ];
}
