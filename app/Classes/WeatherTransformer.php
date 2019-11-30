<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class WeatherTransformer extends Transformer
{
    public function only(): array
    {
        return [
            'sol',
            'insight_id',
            'terrestrial_date',
            'ls',
            'min_temp',
            'max_temp',
            'min_gts_temp',
            'max_gts_temp',
            'pressure',
            'pressure_string',
            'season',
            'sunrise',
            'sunset'
        ];
    }
}
