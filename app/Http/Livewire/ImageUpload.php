<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Company;

use App\Models\User;

class ImageUpload extends Component
{
    use WithFileUploads;

    public $profile_photo_path;

    public function upload() {
        $this->validate([
            'profile_photo_path' => 'image|max:1024', // 1MB Max
        ]);

        $image_path = $this->profile_photo_path->store('company_images', 'public');


        $arrayToStore = ['profile_photo_path' => $image_path];

        auth()->user()->company()->update($arrayToStore);

        session()->flash('message', 'Image uploaded.');

    }

    public function render()
    {
        $company = auth()->user()->company;
        return view('livewire.image-upload', compact('company'));
    }
}
