<?php

namespace App\Http\Controllers;

use App\Models\notification;
use App\Models\Profiles;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
   public function create(){
      $notificationModel = new notification();
    $user = new User();
    $profile = new Profiles;
    $profileData = $profile->where('user_id', '=', Auth::id())->get();
    
    $allUserProfile = $user->join('profiles', 'users.id', '=', 'profiles.user_id' )->get(['users.*', 'profiles.photo_url', 'profiles.photo_url', 'profiles.title', 'profiles.github_account', 'profiles.linkedin_account', 'profiles.contact', 'profiles.personal_detail']);
       return view('usersDetails',  ['profileData'=>$profileData, 'userProfile_detail'=>$allUserProfile, 'notificationModel' => $notificationModel->all()]);
   }
}
