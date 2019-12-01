<?php

namespace App\Classes;

use Illuminate\Database\Eloquent\Model;

class DirectionTransformer extends Transformer
{
    public function only(): array
    {
        return [
            'point',
            'degrees',
            'up',
            'right'
        ];
    }
}
