<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Make a reservation in {{$company_name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">

                <div class="console_info">
                    <h3  class="font-semibold text-xl ">Company name</h3>
                    <p>{{$company_name}}</p><br/>
                
                </div>
                
                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company email</h3>
                    <p>{{$company_email}}</p>
                </div>
                
                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company Category</h3>
                    <p>{{$category}}</p>
                </div>

                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company location</h3>
                    <p>{{$city}}</p>
                </div>

                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company post code</h3>
                    <p>{{$post_code}}</p>
                </div>

                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company address</h3>
                    <p>{{$address}}</p>
                </div>
               
                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company address</h3>
                    <p>{{$phone_num}}</p>
                </div>

            </div>
            </br>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('reservation_save') }}">
                @csrf
                <canvas id="canvas" class="p-0"></canvas> <!--Confetti Generator-->
                    <div class="input" style="display:none;">
                        <label for="company_id">Reservation Date</label>
                        <input name="company_id" type="text" value="{{$company->id}}">
                    </div>
                    <div class="input">
                        <label for="date">Reservation Date</label>
                        
                        
                        <div class="group">
                            <label class="input-label">Pick date</label>
                            <input name="date" type="text" id="pickdate">
                            <span class="bar"></span>
                        </div>
                        @if($company->reservation_frequency === '15')
                        <div class="group">
                            <label class="input-label">Pick time</label>
                            <input name="time" type="text" id="picktime15">
                        </div>
                        @elseif($company->reservation_frequency === '30')
                        <div class="group">
                            <label class="input-label">Pick time</label>
                            <input name="time" type="text" id="picktime30">
                        </div>
                        @else
                        <div class="group">
                            <label class="input-label">Pick time</label>
                            <input name="time" type="text" id="picktime60">
                        </div>
                        @endif
                    </div>
              

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
                    
                    <div>
                    <x-jet-button id="button" class="ml-4 ready confeti message submitMessage button-text" onclick="clickButton();">
                        {{ __('Register') }}
                    </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 
        