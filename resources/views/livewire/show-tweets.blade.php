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
            @if(auth()->user()->photo)
                <img src="{{ url("storage/".auth()->user()->photo) }}" alt="" class="rounded-full mr-2" width="50" height="50">
            @else
                <img src="https://i.pravatar.cc/50?u={{ auth()->user()->email }}" alt="{{ auth()->user()->name }}" class="rounded-full mr-2" width="50" height="50">
            @endif
            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Criar Tweet</button>
        </footer>
    </form>

   @foreach($tweets as $tweet)
         <div class="flex p-4 border-b border-gray-400">
              <div class="mr-2 flex-shrink-0">
                @if(@$tweet->user->photo)
                    <img src="{{ url("storage/{$tweet->user->photo}") }}" alt="{{ $tweet->user->name }}" class="rounded-full mr-2" width="50" height="50">
                @else
                    <img src="https://i.pravatar.cc/50?u={{ $tweet->user->email }}" alt="{{ $tweet->user->name }}" class="rounded-full mr-2" width="50" height="50">
                @endif
              </div>
              <div>
                <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5>
                  <p class="text-sm">
                      {{ $tweet->content }}
                  </p>
                <div class="flex gap-3 mt-2">
                    <p>
                        {{ $tweet->created_at->diffForHumans() }}
                    </p>
                    <p> Likes
                        <span class="text-red-500">({{ $tweet->likes->count() }})</span>
                    </p>
                    @if($tweet->likes->count())
                        <button type="button"
                                wire:click.prevent="unlike({{$tweet->id}})">
                            Unlike
                        </button>
                    @else
                        <button type="button"
                                wire:click.prevent="like({{$tweet->id}})">
                            Like
                        </button>
                    @endif
                </div>


              </div>
         </div>
   @endforeach

    <div class="my-4 bg-gray-800 rounded-lg p-5">
        {{ $tweets->links() }}
    </div>
</div>
