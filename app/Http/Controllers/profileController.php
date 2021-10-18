<?php

namespace App\Http\Controllers;

use App\Models\notification;
use App\Models\Profiles;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class profileController extends Controller
{
    public function create(){
        $notificationModel = new notification();
        $user = new User();
        $profile = new Profiles();
        $profileData = $profile->where('user_id', '=', Auth::id())->get();
        return view('profile', ['profileData'=>$profileData, 'notificationModel' => $notificationModel->all()]);
    }


    public function store(Request $request){
        $validated = $request->validate([
            'title'=>[ 'required','max:100'],
            // 'git_account'=>['required'],
            // 'linkedin_account'=>['required'],
            'phone_contact'=>['required', 'max:20'],
            // 'img_file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'profile_detail'=>['required', 'max:200']
        ]);

        $profile = new Profiles;

         // Get Filename
        //  $filename = pathinfo($request->file('img_file'), PATHINFO_FILENAME);
        //  // Get just Extension
        //  $extension = $request->file('img_file')->getClientOriginalExtension();
        //  // Filename To store
        //  $fileNameToStore = $filename. '_'. time().'.'.$extension;
        //  // Upload Image
        //  $path = $request->file('img_file')->storeAs('public/image', $fileNameToStore);
        $file = $request->file('img_file');
        $file->move(base_path('\public\profile_images'), $file->getClientOriginalName());

        $profile->user_id = Auth::id();
        $profile->photo_url = $request->file('img_file')->getClientOriginalName();
        $profile->title = $request->input('title');
        $profile->github_account = $request->input('git_account');
        $profile->linkedin_account = $request->input('linkedin_account');
        $profile->contact = $request->input('phone_contact');
        $profile->personal_detail = $request->input('profile_detail');
       
        $profile->save();
        return redirect()->back();
       
    }

    public function update(Request $request){
        $profile = new Profiles;
        $validated = $request->validate([
            'title'=>[ 'required','max:100'],
            'git_account'=>['required'],
            'linkedin_account'=>['required'],
            'phone_contact'=>['required', 'max:20'],
            'img_file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'profile_detail'=>['required', 'max:200']
        ]);
        
        $file = $request->file('img_file');
        $file->move(base_path('\public\profile_images'), $file->getClientOriginalName());


        $profile::where('user_id', '=', Auth::id() )->update([
            'photo_url' =>$request->img_file->getClientOriginalName(),
            'title'=>$request->title,
            'github_account'=>$request->git_account,
            'linkedin_account'=>$request->linkedin_account,
            'contact'=>$request->phone_contact,
            'personal_detail'=>$request->profile_detail,
        ]);

        return redirect()->back();
    }
}
