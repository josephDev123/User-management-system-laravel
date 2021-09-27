<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profiles;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function create(Request $request){
        //unique ip address
        $ip_address = [];
        if($request->ip() && $request->userAgent()){
            array_push($ip_address, $request->ip());
        }
        $unique_ip = array_unique($ip_address);
        $unique_ip = count($unique_ip);

        $profile = new Profiles;
        $profileData = $profile->where('user_id', '=', Auth::id())->get();
        $user = User::all();
        $auth_user = Auth::check();
    
        return view('welcome', ['users' => $user, 'auth'=>$auth_user, 'profileData'=>$profileData, 'ip_address'=>$unique_ip]);
    }
}
