<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;


    protected $fillable = [
        'company_name',
        'about_company',
        'phone',
        'phone2',
        'email',
        'website',
        'location',
        'facebook',
        'whatsapp',
        'instagram',
        'telegram',
        'logo',
        'established_date',
        'status',
        'meta_title',
        'meta_description',
    ];
}
