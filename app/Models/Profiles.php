<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo_url',
        'title',
        'github_account',
        'linkedin_account',
        'contact',
        'personal_detail'
        
    ];
}
