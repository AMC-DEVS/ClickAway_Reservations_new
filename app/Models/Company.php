<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'afm',
        'company_name', 
        'company_email', 
        'user_id', 
        'phone_num', 
        'address', 
        'city', 
        'post_code', 
        'category_id', 
        'profile_photo_path',
        'rsv_availabillity'
    ];

    // A company belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A company has many reservation
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    // A company can have one profile
    public function company_profile() 
    {
        return $this->hasOne(CompanyProfile::class);
    }

    // A company belongs to a category
    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

}
