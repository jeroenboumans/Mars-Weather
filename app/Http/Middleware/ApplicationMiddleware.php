<?php

namespace App\Http\Middleware;

use Closure;

class ApplicationMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        $accessKeyProvided = $request->route('accessKey');

        if(env('APP_KEY') == $accessKeyProvided && isset($accessKeyProvided))
            return $next($request);

        else
            response()->json([
                "error" => true,
                "message" => 'Unauthorized.',
                "code" => 401
            ])->setStatusCode(401)->send();

        die;
    }
}
