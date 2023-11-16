<div class="text-gray-400 max-w-6xl mx-auto mt-10">
    <form action="" method="post"  wire:submit.prevent="storagePhoto" >
        <div class="flex gap-8 flex-col">
           <div class="w-full">
               <label for="photo">Photo</label>
               <input type="file" class="w-full p-2 border border-gray-300 rounded-lg" wire:model="photo">
           </div>
            @error('photo')
            <p class="text-red-500 text-sm ">{{ $message }}</p>
            @enderror
            @if($photo)
                <img src="{{ $photo->temporaryUrl() }}" alt="" class="rounded-full mr-2" width="50" height="50">
            @endif
        </div>
        <div class="mt-4 flex justify-end">
            <button type="submit"  class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Upload</button>
        </div>
    </form>
</div>
