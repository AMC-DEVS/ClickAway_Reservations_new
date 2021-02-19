<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyProfile;

class CompanyProfileController extends Controller
{
    public function index(Company $company){    
        $company_name = $company->company_name;
        $city = $company->city;
        $post_code = $company->post_code;
        $address = $company->address;
        $phone_num = $company->phone_num;
        $title = $company->category()->title;

        $profile = $company->company_profile();
        $company_desc = $profile->description;
    }
}
