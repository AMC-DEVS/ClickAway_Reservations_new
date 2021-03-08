<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Home
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if($companies->count() > 0)

            @foreach($companies as $company)
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                <div class="company_card">  
                    <div class="company_card_left">
                        <h3  class="font-semibold text-xl ">{{$company->company_name}}</h3>
                        
                        <p>{{$company->category()->pluck('title')[0]}}</p>
                        <p>{{$company->city}}</p>
                    </div>
                    <div class="company_card_right">
                    <x-jet-button class="ml-4">
                        <a href="/company_profile/{{$company->id}}">
                        Make a reservation
                        </a>
                       
                    </x-jet-button>
                    </div>
                </div>
            </div></br>
 
            @endforeach

        @else
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                No shops available
            </div>
        @endif
        </div>
    </div>
</x-app-layout>
