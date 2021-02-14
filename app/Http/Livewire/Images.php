<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Services\ImageStoreService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Images extends Component
{
    use WithFileUploads;

    public $images;

    public $uploaded_images = [];

    protected $rules = [
        'uploaded_images.*' => 'image|max:1024|mimes:png',
    ];

    public function mount()
    {
        $this->images = Image::latest()->get();
    }

    public function render()
    {
        return view('livewire.images');
    }

    public function save(ImageStoreService $image_storage)
    {
        $this->validate();

        // dd($this->uploaded_images);
        collect($this->uploaded_images)->map(function($image) use ($image_storage){
            return $image_storage->store($image->path());
        })->filter(function($response){
            return $response->successful() && $response->json()['status'] == 'success';
        })->each(function($response){
            return Image::create(['url' => $response['url']]);
        });

        $this->images = Image::latest()->get();
    }
}
