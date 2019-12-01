<?php

namespace App\Http\Controllers;

use App\Classes\StatsFilter;
use App\Classes\WeatherTransformer;
use App\Models\Weather;
use App\SyncTrait;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
    use SyncTrait;

    public function index(Request $request)
    {
        try {
            $this->filter($request);
        }
        catch (\Exception $e) {
            $this->respondException($e);
        }
    }

    public function filter(Request $request)
    {
        $filter     = new StatsFilter($request);
        $results    = Weather::whereBetween('terrestrial_date', $filter->getDateRange())->get();
        $this->respond(WeatherTransformer::use()->transform($results));
    }

    public function create(Request $request)
    {
        try {
            $result = Weather::create($request);
            $this->respond(WeatherTransformer::use()->transformSingle($result));
        }
        catch (\Exception $e) {
             $this->respondException($e);
        }
    }

    public function read(Request $request, $id)
    {
        try {
            $result = Weather::find($id);

            if($result)
                $this->respond(WeatherTransformer::use()->transformSingle($result));

            $this->respondNotFound();
        }
        catch (\Exception $e) {
            $this->respondException($e);
        }
    }

    public function first()
    {
        try {
            $result = Weather::orderBy('terrestrial_date', 'asc')->first();
            $this->respond(WeatherTransformer::use()->transformSingle($result));
        }
        catch (\Exception $e) {
            $this->respondException($e);
        }
    }

    public function latest()
    {
        try {
            $result = Weather::orderBy('terrestrial_date', 'desc')->first();
            $this->respond(WeatherTransformer::use()->transformSingle($result));
        }
        catch (\Exception $e) {
            $this->respondException($e);
        }
    }

    public function sol($id)
    {
        try {
            $result = Weather::where('sol', $id)->first();
            $this->respond(WeatherTransformer::use()->transformSingle($result));
        }
        catch (\Exception $e) {
            $this->respondException($e);
        }
    }
}
