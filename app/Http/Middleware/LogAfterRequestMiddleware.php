<?php

namespace App\Http\Middleware;

use App\Models\LogRequestsResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogAfterRequestMiddleware
{
    public function handle($request, \Closure $next)
    {
        $url = $request->fullUrl();
        Log::channel('daily')->info('Logging Start');
        Log::channel('daily')->info($url);
        Log::channel('daily')->info($request->all());

        return $next($request);
    }

    public function terminate($request, $response)
    {
        $url = $request->fullUrl();
        $ip = $request->ip();

        $json['body'] = $request->all();
        $json['headers'] = $request->header();

        $reqResTime = getReqResponseTime();

        $log_input = [
            'ip' => $ip,
            'url' => $url,
            'request' => json_encode($json),
            'method' => $request->method(),
            'status_code' => $response->status(),
            'response_time' => $reqResTime,
            'response' => json_encode($response),
        ];
        // if ($response->status() != 200 || $response->status() != '200') {
        $logger = LogRequestsResponse::create($log_input);
        // Log::channel('daily')->info('Response Log added successfully, with log_id = ' . $logger->id);
        // }

        // Log::channel('daily')->info('response => ' . json_encode($response));
        Log::channel('daily')->info('Logging End');
    }
}
