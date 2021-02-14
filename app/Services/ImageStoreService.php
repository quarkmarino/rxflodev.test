<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

/**
 * Remote Image Storage Service
 */

class ImageStoreService
{
    protected $http_client;

    function __construct()
    {
        $this->http_client = Http::asForm();
    }

    public function store($image_path)
    {
        return $this->http_client->post(
            env('IMAGE_STORAGE_API_ENDPOINT'),
            ['imageData' => base64_encode(file_get_contents($image_path))]
        );
    }
}