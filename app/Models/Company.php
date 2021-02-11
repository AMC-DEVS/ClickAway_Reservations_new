<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name', 'company_email', 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

}
