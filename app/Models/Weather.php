<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

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

    public static function create($attributes)
    {
        try {
            $weather = new Weather();

            foreach ($weather->getFillables() as $attributeKey) {
                $weather->{$attributeKey} = $attributes->{$attributeKey};
            }

            $weather->save();

            return $weather;
        }

        catch(\Exception $e){
            Log::info($e->getMessage());
            return false;
        }
    }
}
