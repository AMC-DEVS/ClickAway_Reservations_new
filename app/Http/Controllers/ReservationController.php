<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\User;

class ReservationController extends Controller
{
    public function index(){   

 

        $company = auth()->user()->company()->where('user_id', auth()->user()->id)->get();

        $ownername = auth()->user()->name;

        $company_name = $company->pluck('company_name')[0];
        $company_email =$company->pluck('company_email')[0];


       
        if($company[0]->reservation()->count()>0){
            
            $reservations = $company[0]->reservation()->get();
            $users = User::all();
        }
        else {
            $reservations = null;
            $users = null;
        }


        return view('company_console', compact('company','ownername','company_name', 'company_email', 'reservations', 'users'));
       
    }

    // public function show(){   
    //     return view('company_console', compact('company','ownername','company_name', 'company_email'));
    // }

    // public function create(){   
    //     return view('company_console', compact('company','ownername','company_name', 'company_email'));
    // }

    // public function save(){   
    //     return view('company_console', compact('company','ownername','company_name', 'company_email'));
    // }

    // public function delete(){   
    //     return view('company_console', compact('company','ownername','company_name', 'company_email'));
    // }

    // public function update(){   
    //     return view('company_console', compact('company','ownername','company_name', 'company_email'));
    // }
}
