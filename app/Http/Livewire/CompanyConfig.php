<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class CompanyConfig extends Component
{
    protected $table = 'company';
    public $open_time;
    public $close_time;
    public $reservation_frequency;
    
    public function upload() {
        
        if($this->open_time === null) {
            $this->open_time = auth()->user()->company()->where('user_id', auth()->user()->id)->pluck('open_time')[0];
        }
        if($this->close_time === null) {
            $this->close_time = auth()->user()->company()->where('user_id', auth()->user()->id)->pluck('close_time')[0];
        }
        if($this->reservation_frequency === null) {
            $this->reservation_frequency = auth()->user()->company()->where('user_id', auth()->user()->id)->pluck('reservation_frequency')[0];
        }

            $arrayToStore = [
                'open_time' => $this->open_time,
                'close_time' => $this->close_time,
                'reservation_frequency' => $this->reservation_frequency
            ];
        
        // Update informations
        auth()->user()->company()->update($arrayToStore);

        session()->flash('message', 'Informations saved.');
    }

    public function render()
    {   
        $company = auth()->user()->company()->where('user_id', auth()->user()->id)->get();
        $open_t = $company->pluck('open_time')[0];
        $close_t = $company->pluck('close_time')[0];
        $reservation_fr = $company->pluck('reservation_frequency')[0];

        return view('livewire.company-config', compact(
            'open_t', 'close_t', 'reservation_fr'
        ));
    }
}
