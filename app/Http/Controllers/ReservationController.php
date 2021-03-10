<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\User;

class ReservationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){   

        $company = auth()->user()->company()->where('user_id', auth()->user()->id)->get();

        $ownername = auth()->user()->name;

        $company_name = $company->pluck('company_name')[0];
        $company_email =$company->pluck('company_email')[0];

        $city = $company->pluck('city')[0];
        $post_code = $company->pluck('post_code')[0];
        $address = $company->pluck('address')[0];
        $phone_num = $company->pluck('phone_num')[0];
        $category = $company[0]->category()->get()->pluck('title')[0];
     
       
        if($company[0]->reservation()->count()>0){
            
            $reservations = $company[0]->reservation()->get();
            $users = User::all();
        }
        else {
            $reservations = null;
            $users = null;
        }



        return view('company.company_console', compact(
            'company',
            'ownername',
            'city',
            'post_code',
            'address',
            'category',
            'phone_num',
            'company_name',
            'company_email',
            'reservations',
            'users'
        ));
       
    }

    public function index_user(){   

        $user = auth()->user();  
        
        return view('reservations.user_reservations', compact(
           'user'
        ));
       
    }

    // public function show(){   
    //     return view('company_console', compact('company','ownername','company_name', 'company_email'));
    // }

    // public function create(){   
    //     return view('company_console', compact('company','ownername','company_name', 'company_email'));
    // }

    public function save(){   
        $data = request()->validate([
            'user_id' => '',
            'company_id' =>  ['required', 'string', 'max:255'],
            'time' => ['required', 'string', 'max:100'],
        ]);

        auth()->user()->reservation()->create([
            'user_id' => auth()->user()->id,
            'company_id' => $data['company_id'], 
            'time' => $data['time'],
        ]);

        return redirect('home');
    }

    // public function delete(){   
    //     return view('company_console', compact('company','ownername','company_name', 'company_email'));
    // }

    // public function update(){   
    //     return view('company_console', compact('company','ownername','company_name', 'company_email'));
    // }
}
