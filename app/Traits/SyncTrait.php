<?php


namespace App\Traits;

use App\Models\Weather;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

trait SyncTrait
{
    function syncWithRemote(){
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

            Log::info("Synchronizing done");
        }

        else {
            Log::alert("No records could be readed from the external source.");
        }
    }
}
