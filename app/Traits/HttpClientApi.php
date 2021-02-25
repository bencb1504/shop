<?php

namespace App\Traits;

use Http;
use Illuminate\Http\Request;

trait HttpClientApi
{
    public function getApiWithToken()
    {
        return true;
    }

    public function getApi($url, $params = [])
    {
        $options = [
            'base_uri' => config('common.api_url'),
            'http_errors' => false,
            'debug' => false,
        ];
        try {
            if (empty($params)) {
                $result = Http::withOptions($options)->get($url);
            } else {
                $result = Http::withOptions($options)->get($url, $params);
            }
        } catch (\Throwable $th) {
            dd($th);
        }

        return json_decode($result->getBody()->getContents(), JSON_NUMERIC_CHECK);
    }
}