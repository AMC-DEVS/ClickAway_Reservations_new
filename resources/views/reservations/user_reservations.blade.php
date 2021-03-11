<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'My reservations' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight" >Reservations</h1></br>
           
          

           @if($user->reservation != null)
            @foreach($user->reservation as $reservation)
            <div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-5">

                <div style = "display:none;">
                {{  $company = $reservation->company}}
                {{  $time = $reservation->time }}
                </div>                
                    <div class="console_info">
                        <h3 class="font-semibold text-xl ">Company name</h3>
                        <p>{{ $company->company_name }}</p>
                    </div>

                    <div class="console_info">
                        <h3  class="font-semibold text-xl ">Time</h3>
                        <p>{{ $time }}</p>
                    </div>
                </div></br>
                @endforeach  
                @else
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg d-flex console_info_wr p-10">
                        <div class="console_info">
                            <h3 class="font-semibold text-xl">You have not any reservations yet! :-)</h3>
                        </div>
                    </div>
            @endif
        </div>
    </div>
</x-app-layout> 
        