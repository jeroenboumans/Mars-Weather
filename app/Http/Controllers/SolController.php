<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolController extends Controller
{
    public function read(Request $request, $id)
    {
        try {

            $sol = $this->respond(Weather::where('sol', $id)->first());

            if($sol)
                $this->respond($sol);

            $this->respondNotFound();
        }
        catch (\Exception $e) {
            $this->respondException($e);
        }
    }
}