<?php

namespace App\Livewire;

use App\Models\Tweet;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowTweets extends Component
{
    public string $message = 'Apenas um teste';

    #[Layout('layouts.app')]
    public function render(): View
    {
        $tweets = Tweet::with('user')->latest()->get();

        return view('livewire.show-tweets', compact('tweets'));
    }
}
