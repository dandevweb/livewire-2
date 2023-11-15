<div class="text-gray-400 max-w-6xl mx-auto mt-10">
    <h1 class="mb-4 font-semibold text-2xl">Tweets</h1>

    <form method="POST" wire:submit.prevent="create">
        @csrf
        <textarea name="content" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="What's up doc?" wire:model="content"></textarea>
        @error('content')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
        <hr class="my-4">
        <footer class="flex justify-end">
            <img src="https://i.pravatar.cc/50?u={{ auth()->user()->email }}" alt="" class="rounded-full mr-2">
            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Criar Tweet</button>
        </footer>
    </form>

   @foreach($tweets as $tweet)
         <div class="flex p-4 border-b border-gray-400">
              <div class="mr-2 flex-shrink-0">
                <img src="https://i.pravatar.cc/50?u={{ $tweet->user->email }}" alt="" class="rounded-full mr-2">
              </div>
              <div>
                <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5>
                <p class="text-sm">
                     {{ $tweet->content }}
                </p>
              </div>
         </div>
   @endforeach

    <div class="my-4 bg-gray-800 rounded-lg p-5">
        {{ $tweets->links() }}
    </div>
</div>
