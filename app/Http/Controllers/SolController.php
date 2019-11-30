<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;

class SolController extends Controller
{
    public function read(Request $request, $id)
    {
        try {

            $sol = Weather::where('sol', $id)->first();

            if($sol)
                $this->respond($sol);
            else
                $this->respondNotFound();
        }
        catch (\Exception $e) {
            $this->respondException($e);
        }
    }
}
