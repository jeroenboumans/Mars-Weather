<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WeatherController extends Controller
{
    public function index(Request $request){
        return response()->json(Weather::all());
    }

    public function create(Request $request)
    {
        try {
            $weather = Weather::create($request);
            $this->respond($weather);
        }
        catch (\Exception $e) {
             $this->respondException($e);
        }
    }

    public function read(Request $request, $id)
    {
        try {
            $weather = Weather::find($id);
            if($weather)
                $this->respond($weather);

            $this->respondNotFound();
        }
        catch (\Exception $e) {
            $this->respondException($e);
        }
    }

    public function first()
    {
        try {
            $this->respond(Weather::orderBy('terrestrial_date', 'asc')->first());
        }
        catch (\Exception $e) {
            $this->respondException($e);
        }
    }

    public function latest()
    {
        try {
            $this->respond( Weather::orderBy('terrestrial_date', 'desc')->first());
        }
        catch (\Exception $e) {
            $this->respondException($e);
        }
    }

    public function sol($id)
    {
        try {
            $this->respond( Weather::where('sol', $id)->first());
        }
        catch (\Exception $e) {
            $this->respondException($e);
        }
    }

    public function sync()
    {
        $request    = (new Client())->get(env('WEATHER_FETCH_URL'));
        $response   = json_decode($request->getBody()->getContents());

        try {
            if (isset($response) && is_array($response->soles)) {
                foreach ($response->soles as $sol) {
                    $weather = Weather::firstOrCreate(['sol' => $sol->sol]);

                    $weather->insight_id = $sol->id;

                    foreach ($weather->getFillables() as $attributeKey) {
                        if (isset($sol->{$attributeKey}))
                            $weather->{$attributeKey} = $sol->{$attributeKey} != "--" ? $sol->{$attributeKey} : null;
                    }

                    $weather->save();
                }
            } else {
                $this->respondNotFound("No records could be readed from the external source: " . json_encode($response));
            }

            $this->respond(Weather::all());
        }
        catch (\Exception $e){
            $this->respondException($e);
        }
    }
}
