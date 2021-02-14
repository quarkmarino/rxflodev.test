<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ImagesUploadTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verifies that the information about a successfully 
     * uploaded image is stored in the database after
     * it is transfered to the remote image storage
     *
     * Given the "/api/images" API endpoint
     * When an image is provided via de POST method request
     * Then it should create a new images register in the DB
     *     corresponding to the remote stored image.
     *
     * @return void
     */
    public function test_png_image_can_be_stored()
    {
        Storage::fake('selfies');

        $image_file = UploadedFile::fake()->image('selfie.png');

        $response = $this->post('api/images', [
            'image' => $image_file,
        ]);

        $this->assertDatabaseCount('images', 1);
    }

    /**
     * Verifies that only png format file can be uploaded
     *
     * Given the "/api/images" API endpoint
     * When an image without the proper PNG type is provided
     *     via de POST method request
     * Then it should not create a new images register in the DB
     *     AND it should return a corresponding error message.
     * @return void
     */

    public function test_image_submitted_must_be_in_png_format()
    {
        Storage::fake('selfies');

        $image_file = UploadedFile::fake()->image('selfie.jpeg');

        $response = $this->post('api/images', [
            'image' => $image_file,
        ]);

        $response->assertSessionHasErrors([
            'image' => 'The image must be a file of type: png.',
        ]);

        $this->assertDatabaseCount('images', 0);
    }
}
