<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Company Console' }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="navigation-effect edit-button" href="{{ route('company_profile_edit', $company->pluck('id')[0]) }}"><small>Edit your Information</small></a>
            <div class="navigation-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
                <div class="console_info">
                    <img src="/storage/{{ $company->pluck('profile_photo_path')[0] }}" style="width:150px;" alt=" {{$company->pluck('company_name')[0]}}" srcset="">
                </div>
                <div class="console_info">
                    <h3 class="font-semibold text-xl ">Owner Name</h3>
                    <p>{{$ownername}}</p><br/>
                </div>

                <div class="console_info">
                    <h3  class="font-semibold text-xl ">Company Name</h3>
                    <p>{{$company_name}}</p><br/>
                
                </div>
                
                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company Email</h3>
                    <p>{{$company_email}}</p>
                </div>
                
                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company Category</h3>
                    <p>{{$category}}</p>
                </div>

                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company Location</h3>
                    <p>{{$city}}</p>
                </div>

                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company Postal Code</h3>
                    <p>{{$post_code}}</p>
                </div>

                <div class="console_info">  
                    <h3  class="font-semibold text-xl ">Company Address</h3>
                    <p>{{$address}}</p>
                </div>

            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Configurations</h1></br>
     
            @livewire('company-config')
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Reservations</h1></br>
           
           @if($reservations != null)
            @foreach($reservations as $reservation)
            <div class="navigation-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-5">

                <div style = "display:none;">
                {{  $user_id = $reservation->user_id }}
                {{  $time = $reservation->time }}
                {{  $user_name = $users->whereIn('id',$user_id)->pluck('name')[0] }}
                </div>                
                    <div class="console_info">
                        <h3 class="font-semibold text-xl ">Username</h3>
                        <p>{{ $user_name }}</p>
                    </div>

                    <div class="console_info">
                        <h3  class="font-semibold text-xl ">Date & Time</h3>
                        <p>{{ $time }}</p>
                    </div>
                    <div class="res_status-wr">
                        <small class="res_status-date"><b class="mr-1">Received at: </b>{{$reservation->created_at}}</small>
                        <div class="res_status-buttons reservation-buttons">
                            <x-jet-button class="ml-4 status_label status-success">
                                Verify                       
                            </x-jet-button>
                            <x-jet-button class="ml-4 status_label status-reject">
                                Reject                       
                            </x-jet-button>
                        </div>
                    </div>
                </div></br>
                @endforeach  
                @else
                    <div class="navigation-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
                        <div class="console_info">
                            <h3 class="font-semibold text-xl">You have not any reservations yet! :-)</h3>
                        </div>
                    </div>
            @endif
        </div>
    </div>
</x-app-layout> 
        