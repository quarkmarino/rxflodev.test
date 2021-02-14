<div>
    <!-- upload image -->
    <form wire:submit.prevent="save">
        <div class="flex w-full py-6 items-center justify-center bg-grey-lighter">
            <label class="bg-white text-gray-800 font-bold rounded border-b-2 border-blue-500 hover:border-blue-600 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                <span class="mr-2">Select a file</span>
                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                <input type='file' class="hidden" wire:model="uploaded_images" multiple/>
            </label>
            
            <button type="submit" class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                <span class="mr-2">Upload</span>
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                </svg>
            </button>
        </div>
    </form>

    @error('uploaded_images.*') 
        <span class="error bg-red-100 text-red-600 rounded mx-7 py-2 px-6 justify-center">{{ $message }}</span>
    @enderror

    <div class="flex flex-wrap m-3">
        @foreach ($images as $image)
            <div class="my-1 px-1 md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">
                <article class="overflow-hidden rounded-lg shadow-lg">
                    <a href="#">
                        <img alt="Placeholder" class="block h-auto w-full" src="{{ $image->url }}">
                    </a>

                    <header class="flex items-center justify-end leading-tight p-2 md:p-4">
                        <p class="text-grey-darker text-sm text-right">
                            Uploaded At: {{ $image->created_at->toFormattedDateString() }}
                        </p>
                    </header>
                </article>
            </div>
        @endforeach
    </div>
</div>
