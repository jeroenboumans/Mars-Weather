<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class WeatherTransformer extends Transformer
{

    public function transformSingle(Model $model): array
    {
        return [
            'sol' => $model->sol,
            'season' => $model->season,
            'measurement' => [
                'first' => $model->measurement_first,
                'last' => $model->measurement_last
            ],
            'air' => [
                'temperature' =>[
                    'average' => $model->temperature_average,
                    'minimum' => $model->temperature_min,
                    'maximum' => $model->temperature_max
                ],
                'pressure' =>[
                    'average' => $model->pressure_average,
                    'minimum' => $model->pressure_min,
                    'maximum' => $model->pressure_max
                ]
            ],
            'wind' => [
                'speed' => [
                    'average' => $model->wind_speed_average,
                    'minimum' => $model->wind_speed_min,
                    'maximum' => $model->wind_speed_max
                ],
                'directions' => DirectionTransformer::use()->transform($model->directions)
            ]
        ];
    }

    public function only(): array
    {
        return [
            'sol',
            'season',
            'air_temp_average',
            'pressure_average',
            'wind_speed_average',
            'measurement_first',
            'measurement_last'
        ];
    }
}
