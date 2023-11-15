<div class="text-gray-400 p-10">
    <h1 class="mb-4 font-semibold text-2xl">Tweets</h1>

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
</div>
