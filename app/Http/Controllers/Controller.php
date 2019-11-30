<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    function respond($body, $code = 200){
        response()->json($body)->send();
        die();
    }

    function respondNotFound(){
        $this->respond([
            "error" => "Result could not be found",
            "code" => 404
        ], 404);
    }

    function respondException(\Exception $e){
        $this->respond([
            "error" => $e->getMessage(),
            "code" => $e->getCode()
        ], $e->getCode());
    }
}
