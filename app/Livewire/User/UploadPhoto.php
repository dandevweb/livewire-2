<?php

namespace App\Livewire\User;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhoto extends Component
{
    use WithFileUploads;

    #[Rule(['max:1024', 'required', 'image', 'mimes:jpg,jpeg,png,webp'])]
    public $photo;

    #[Layout('layouts.app')]
    public function render(): View
    {
        return view('livewire.user.upload-photo');
    }

    public function storagePhoto()
    {
        $this->validate();

        $user = auth()->user();

        $fileName = Str::slug($user->name).'.'.$this->photo->getClientOriginalExtension();

        if ($path = $this->photo->storeAs('users', $fileName)) {
            $user->update([
                'profile_photo_path' => $path,
            ]);
        }

        return redirect()->route('tweets');
    }
}
