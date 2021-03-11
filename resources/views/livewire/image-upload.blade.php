<div>
    @if ($profile_photo_path)
        Photo Preview:
        <img width="150px" src="{{ $profile_photo_path->temporaryUrl() }}">
    @else
        <img src="/storage/{{ $company->profile_photo_path }}" style="width:150px;" alt=" {{$company->company_name}}" srcset="">
    @endif
    <input class="custom-file-input" type="file" wire:model="profile_photo_path">
    <br/>
    <x-jet-button  wire:click="upload" class="ml-4">
        {{ __('Upload') }}
    </x-jet-button>
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
