<?php

namespace Tests\Feature;

use App\Services\ImageStoreService;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use VCR\VCR;

class ImagesStoreTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @vcr remote_image_store_service
     * @return void
     */
    public function test_images_are_stored_in_remote_storage_service()
    {
        $image_file = UploadedFile::fake()->image('selfie.png');
        
        $image_storage = $this->app->make(ImageStoreService::class);

        $response = $image_storage->store($image_file);

        $this->assertArrayHasKey('status', $response->json());
        $this->assertEquals('success', $response->json()['status']);
        $this->assertArrayHasKey('message', $response->json());
        $this->assertEquals('Image saved successfully.', $response->json()['message']);
        $this->assertArrayHasKey('url', $response->json());
    }
}
