<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        
    }

    public function create()
    {    
        return view('company_create');    }
    
     /**
     * Create a newly registered Company.
     *
     * @param  array  $input
     * @return \App\Models\Company
     */
    public function save()
    {        
        $data = request()->validate([
            'user_id' => '',
            'company_email' =>  ['required', 'string', 'email', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
        ]);

        auth()->user()->company()->create([
            'user_id' => auth()->user()->id,
            'company_email' => $data['company_email'],
            'company_name' => $data['company_name'],
        ]);
        return redirect('company_console');
        // return redirect('/user/profile');
    }

    public function update(User $user){
        $this->authorize('update', $user->profile);
        $data = request()->validate([

            'company_email' => auth()->user()->name,
            'company_name' => '',
           
        ]);
       
    }
  
}
