<?php


namespace App\Classes;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Transformer
{
    private static $instances;
    protected $classes = [];

    public static function use(): Transformer{

        $class = get_called_class();

        if(!isset(Transformer::$instances[$class]) || empty(Transformer::$instances[$class]) ){
            Transformer::$instances[$class] = new $class;
        }

        return Transformer::$instances[$class];
    }

    public abstract function only() : array;

    public function transformSingle(Model $model): array
    {
        return $model->only($this->only());
    }

    public function transform(Collection $collection): array
    {
        $transformedArray = [];
        foreach ($collection as $item){
            array_push($transformedArray, $this->transformSingle($item));
        }

        return $transformedArray;
    }
}
