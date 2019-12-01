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
        "id",
        "season",
        "sol",

        "temperature_average",
        "temperature_min",
        "temperature_max",

        "pressure_average",
        "pressure_min",
        "pressure_max",

        "wind_speed_average",
        "wind_speed_min",
        "wind_speed_max",

        "measurement_first",
        "measurement_last",
    ];

    public function getFillables()
    {
        return $this->fillable;
    }

    public function directions()
    {
        return $this->hasMany(Direction::class);
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
