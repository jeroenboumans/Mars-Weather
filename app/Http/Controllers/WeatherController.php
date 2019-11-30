<?php

namespace App\Http\Controllers;

use App\Models\Weather;
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
            $weather = new Weather();

            foreach($weather->getFillables() as $attribute){
                $weather->{$attribute} = $request->get($attribute);
            }

            $weather->save();

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

    public function sync(){

    }
}
