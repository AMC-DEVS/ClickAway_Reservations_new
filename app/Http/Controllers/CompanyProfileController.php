<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyProfile;

class CompanyProfileController extends Controller
{
    public function show(Company $company){    
        $company_name = $company->company_name;
        $company_email = $company->company_email;
        $city = $company->city;
        $post_code = $company->post_code;
        $address = $company->address;
        $category = $company->category()->get()->pluck('title')[0];
        $phone_num = $company->phone_num;

        // $profile = $company->company_profile();
        // $company_desc = $profile->description;
        
        return view('company.company_profile', compact(
            'company_name',
            'company_email',
            'city',
            'post_code',
            'address',
            'category',
            'phone_num',
            'company'
        ));
    }

    
    public function edit(Company $company)
    {              
        return view('company.company_edit', compact('company'));
    }

    public function update(Company $company)
    {
        
        $data = request()->validate([

            'company_email' => '',
            'company_name' => '',
            'phone_num' => '',
            'address' => '',
            'post_code' => '',
            'city' => '',
            'profile_photo_path' => '',
            'afm' => '',
            'rsv_availabillity' => ''
        ]);

         auth()->user()->company()->update($data);

        

        // if (request('image')) {

        //     $imagePath = request('image');
            
		// 	$imagePathdes = request('image')->store('storage', 'public');
            
        //     $imagePath = base64_decode($imagePath);
            
        //     file_put_contents($path, $image);
          
        //     $image = Image::make($imagePath)->fit(500, 500);
            
        // 	$image->save($imagePathdes); 
			
		// 	$imageArray = ['image' => $imagePathdes];
        // }

        // auth()->user()->profile->update(array_merge(
        //         $data,
        //         $imageArray ?? []
        //     ));
        

        return redirect("/company_console");
    }
}
