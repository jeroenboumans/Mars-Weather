<?php


namespace App\Traits;

use App\Models\Direction;
use App\Models\Weather;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

trait SyncTrait
{
    function syncWithRemote(){
        $request    = (new Client())->get(env('JSON_FETCH_URL'));
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

        try {
            $weather->fill([
                'season' => $r->Season,
                'temperature_average' => $this->read($r->AT->av),
                'temperature_min' => $this->read($r->AT->mn),
                'temperature_max' => $this->read($r->AT->mx),
                'pressure_average' => $this->read($r->PRE->av),
                'pressure_min' => $this->read($r->PRE->mn),
                'pressure_max' => $this->read($r->PRE->mx),
                'wind_speed_average' => $this->read($r->HWS->av),
                'wind_speed_min' => $this->read($r->HWS->mn),
                'wind_speed_max' => $this->read($r->HWS->mx),
                'measurement_first' => $this->convertDate($this->read($r->First_UTC)),
                'measurement_last' => $this->convertDate($this->read($r->Last_UTC))
            ]);
        }
        catch (\Exception $e){
            Log::info("Mars weather sync failed: " . $e->getMessage());
        }

        $weather->update();
        return $weather;
    }

    private function read($propertyValue){
        return isset($propertyValue) ? $propertyValue : null;
    }

    private function convertDate($str)
    {
        $date = date_create_from_format('Y-m-d\TH:i:s\Z', $str);
        return $date->format('Y-m-d');
    }
}
