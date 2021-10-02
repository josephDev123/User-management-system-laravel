<?php

namespace App\Http\Controllers;
use App\Models\Profiles;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
   public function create(){
    $user = new User();
    $profile = new Profiles;
    $profileData = $profile->where('user_id', '=', Auth::id())->get();
       return view('usersDetails',  ['profileData'=>$profileData, 'allUser'=>$user->all(), 'allProfile'=>$profile->all() ]);
   }
}
