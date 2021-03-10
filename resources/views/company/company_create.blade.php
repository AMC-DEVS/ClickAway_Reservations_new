    

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Company registration
        </h2>
    </x-slot>

    <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
                <h3>Company registration</h3>
            </x-slot>

        <x-jet-validation-errors class="mb-4" />
        

        <form method="POST" action="{{ route('company_save') }}">
            @csrf
      
         
            <div>
                <x-jet-label for="company_name" value="Company Name" />
                <x-jet-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required autofocus autocomplete="company_name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="company_email" value="Company email" />
                <x-jet-input id="company_email" class="block mt-1 w-full" type="email" name="company_email" :value="old('company_email')"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="afm" value="AFM" />
                <x-jet-input id="afm" class="block mt-1 w-full" type="text" name="afm" :value="old('afm')"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="phone_num" value="Phone number" />
                <x-jet-input id="phone_num" class="block mt-1 w-full" type="text" name="phone_num" :value="old('phone_num')"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="address" value="Address" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="city" value="City" />
                <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"/>
            </div>
            <div class="mt-4">
                <x-jet-label for="post_code" value="Post code" />
                <x-jet-input id="post_code" class="block mt-1 w-full" type="text" name="post_code" :value="old('post_code')"/>
            </div>
           
            @foreach($categories as $category)
                <div class="mt-4">
                    <div class="flex items-center">
                        <x-jet-checkbox name="category_id" value="{{$category->id}}"/>
                        <div class="ml-2">
                            {{$category->title}}
                        </div>  
                    </div>
                </div>
            @endforeach


            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
        
    </x-jet-authentication-card>
</x-app-layout>