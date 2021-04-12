<div>
    <div class = "border-dashboard-box">
        <div class="homesearch-wr">
            <div class="mb-8 select-city">
                <select name="category" wire:model="city" 
                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                   
                    @foreach($allCompanies as $company)
                        <option value='{{ $company->city }}'>{{ $company->city}}</option>
                    @endforeach
                </select>
            </div>
            <x-jet-label for="customcity" value="Search for your city" />
            <x-jet-input id="customcity" class="block mt-1" type="text" wire:model="city" name="customcity"  placeholder="Search a city" :value="old('customcity')" autofocus autocomplete="customcity" />
        </div>
        
        @if(count($categories) > 0)
            <div class="mb-8 select-category">
                <select name="category" wire:model="category_id" 
                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                    <option value=''>Choose a category</option>
                    @foreach($categories as $category)
                        <option value='{{ $category->id }}'>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
    @if($companies->count() > 0)

            @foreach($companies->whereIn('city', $city)->whereIn('category_id', $category_id)  as $company)
        
            <div class="glass-effect overflow-hidden shadow-xl sm:rounded-lg p-10">
                <div class="company_card">  
                    <div class="show-card-mobile">
                        <h2  class="font-semibold text-lg company-heading">{{$company->company_name}}</h2>
                        <p class="text-left text-category">{{$company->category()->pluck('title')[0]}}</p>
                        <p class="text-left text-city">{{$company->city}}</p>
                    </div>
                    <div class="company_card_right show-card-mobile-button">
                    <x-jet-button>
                        <a href="/company_profile/{{$company->id}}">
                        Make a reservation
                        </a>
                       
                    </x-jet-button>
                    </div>
                </div>
            </div></br>
 
            @endforeach

        @elseif($city === "")
            <div class="selected-city">
                No City Selected
            </div>
        @else
            <div class="selected-city-long">
                No Shops Available In This City
            </div>
        @endif
</div>
