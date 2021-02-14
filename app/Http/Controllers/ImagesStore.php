<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Services\ImageStoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImagesStore extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ImageRequest $request, ImageStoreService $image_storage)
    {
        $response = $image_storage->store($request->image->path());

        if($response->successful() && $response->json()['status'] == 'success'){
            return Image::create(['url' => $response['url']]);
        }
    }
}
