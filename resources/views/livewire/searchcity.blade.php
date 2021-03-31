<div>
        <div class="homesearch-wr">
            <div class="mb-8">
                <select name="category" wire:model="city" 
                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                   
                    @foreach($allCompanies as $company)
                        <option value='{{ $company->city }}'>{{ $company->city}}</option>
                    @endforeach
                </select>
            </div>
            <x-jet-label for="customcity" value="Choose you city" />
            <x-jet-input id="customcity" class="block mt-1 w-full" type="text" wire:model="city" name="customcity"  placeholder="Search a city" :value="old('customcity')" autofocus autocomplete="customcity" />
        </div>
        
        @if(count($categories) > 0)
            <div class="mb-8">
                <select name="category" wire:model="category_id" 
                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                    <option value=''>Choose a category</option>
                    @foreach($categories as $category)
                        <option value='{{ $category->id }}'>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        @endif

    @if($companies->count() > 0)

            @foreach($companies->whereIn('city', $city)->whereIn('category_id', $category_id)  as $company)
        
            <div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg p-10">
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

        @elseif($city === "")
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                Select a city
            </div>
        @else
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
                No shops available in this city.
            </div>
        @endif
</div>
