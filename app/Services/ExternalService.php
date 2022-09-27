<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ExternalService
{
    protected $http;

    public function initApiHeader()
    {
        $this->http = Http::asForm()->withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->baseUrl(env('external_url', 'https://whatsy.me'));
        return $this->http;
    }


    public function createGroup($request)
    {
        $response = $this->initApiHeader()->post("/api/create/group", $request);
        return $response;
    }

    public function createContact($request)
    {
        $response = $this->initApiHeader()->post("/api/create/contact", $request);
        return response($response->json(), $response->status());
    }

    public function getContacts($request)
    {
        $response = $this->initApiHeader()->get("/api/get/contacts", $request);
        return $response;
    }
    public function getOrders()
    {
        $response = $this->initApiHeader()->get("/api/get/orders");
        return $response;
    }
    public function getOrder($id)
    {
        $response = $this->initApiHeader()->get("/api/get/order/$id");
        return $response;
    }
}
