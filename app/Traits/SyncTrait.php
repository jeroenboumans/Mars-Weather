<?php


namespace App\Traits;

use App\Models\Direction;
use App\Models\Weather;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

trait SyncTrait
{
    function syncWithRemote(){
        $request    = (new Client())->get(env('LEGACY_FETCH_URL'));
        $response   = json_decode($request->getBody()->getContents());

        Log::info("Synchronizing...");

        if (isset($response) && is_array($response->sol_keys))
        {
            foreach ($response->sol_keys as $sol)
            {
                $weatherResult = $response->{$sol};

                    $weather = $this->readWeather($weatherResult, $sol);

                    $weather->directions()->delete();
                    $weather->directions()->saveMany($this->readDirections($weatherResult->WD));
                    $weather->update();
            }
            Log::info("Synchronizing done");
        }

        else {
            Log::alert("No records could be readed from the external source.");
        }
    }

    function readDirections($directions) : array {
        $relations = [];

        foreach ($directions as $direction)
        {
            $relations[] = Direction::create([
                'point' => $direction->compass_point,
                'right' => $direction->compass_right,
                'up' => $direction->compass_up,
                'degrees' => $direction->compass_degrees
            ]);
        }

        return $relations;
    }

    function readWeather($r, $sol)
    {
        $weather = Weather::firstOrCreate(['sol' => $sol]);

        $weather->fill([
            'season' => $r->Season,
            'temperature_average' => $r->AT->av,
            'temperature_min' => $r->AT->mn,
            'temperature_max' => $r->AT->mx,
            'pressure_average' => $r->PRE->av,
            'pressure_min' => $r->PRE->mn,
            'pressure_max' => $r->PRE->mx,
            'wind_speed_average' => $r->HWS->av,
            'wind_speed_min' => $r->HWS->mn,
            'wind_speed_max' => $r->HWS->mx,
            'measurement_first' => $this->convertDate($r->First_UTC),
            'measurement_last' => $this->convertDate($r->Last_UTC)
        ]);
        $weather->update();
        return $weather;
    }

    private function convertDate($str)
    {
        $date = date_create_from_format('Y-m-d\TH:i:s\Z', $str);
        return $date->format('Y-m-d');
    }
}
