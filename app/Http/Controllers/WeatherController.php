<?php

namespace App\Http\Controllers;

use App\Classes\StatsFilter;
use App\Classes\WeatherTransformer;
use App\Models\Weather;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
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

    public function sync($accessKey)
    {
        try {
            $request    = (new Client())->get(env('WEATHER_FETCH_URL'));
            $response   = json_decode($request->getBody()->getContents());

            Log::info("Synchronizing...");

            if (isset($response) && is_array($response->soles))
            {
                foreach ($response->soles as $sol)
                {

                    if (!Weather::where('sol', '=',  $sol->sol)->exists())
                    {
                        $weather = Weather::firstOrCreate(['sol' => $sol->sol]);
                        $weather->insight_id = $sol->id;

                        foreach ($weather->getFillables() as $attributeKey)
                            if (isset($sol->{$attributeKey}))
                                $weather->{$attributeKey} = $sol->{$attributeKey} != "--" ? $sol->{$attributeKey} : null;

                        $weather->update();
                    }
                }
            }

            else {
                $this->respondNotFound("No records could be readed from the external source: " . json_encode($response));
            }

            Log::info("Synchronizing done!");

            return $this->respond(Weather::all());
        }
        catch (\Exception $e){
            $this->respondException($e);
        }
    }
}
