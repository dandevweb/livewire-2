<?php

namespace App\Livewire;

use App\Models\Tweet;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;

    #[Rule(['max:255', 'required', 'min:3'])]
    public string $content = '';

    #[Layout('layouts.app')]
    public function render(): View
    {
        $tweets = Tweet::with('user')->latest()->paginate(3);

        return view('livewire.show-tweets', compact('tweets'));
    }

    public function create(): void
    {
        $this->validate();


        $user = auth()->user();

        $user->tweets()->create([
            'content' => $this->content,
        ]);

        $this->content = '';
    }
}
