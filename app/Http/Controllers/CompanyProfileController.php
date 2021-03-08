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
        
        return view('company_profile', compact(
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
}
