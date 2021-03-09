<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Company Console' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
               
                <div class="console_info">
                    <h3 class="font-semibold text-xl ">Owner name</h3>
                    <p>{{$ownername}}</p><br/>
                </div>

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

            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight" >Reservations</h1></br>
           
           @if($reservations != null)
            @foreach($reservations as $reservation)
            <div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-5">

                <div style = "display:none;">
                {{  $user_id = $reservation->user_id }}
                {{  $time = $reservation->time }}
                {{  $user_name = $users->whereIn('id',$user_id)->pluck('name')[0] }}
                </div>                
                    <div class="console_info">
                        <h3 class="font-semibold text-xl ">User name</h3>
                        <p>{{ $user_name }}</p>
                    </div>

                    <div class="console_info">
                        <h3  class="font-semibold text-xl ">Time</h3>
                        <p>{{ $time }}</p>
                    </div>
                </div></br>
                @endforeach  
                @else
                    <div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
                        <div class="console_info">
                            <h3 class="font-semibold text-xl">You have not any reservations yet! :-)</h3>
                        </div>
                    </div>
            @endif
        </div>
    </div>
</x-app-layout> 
        