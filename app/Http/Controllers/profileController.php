<?php

namespace App\Http\Controllers;
use App\Models\Profiles;
use Illuminate\Http\Request;


class profileController extends Controller
{
    public function create(){
        return view('profile');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title'=>['required', 'max:100'],
            'git_account'=>['required'],
            'linkedin_account'=>['required'],
            'phone_contact'=>['required', 'max:20'],
            'img_file'=>['required'],
            'profile_detail'=>['required', 'max:200']
        ]);

        $profile = new Profiles;
        $profile->photo_url = $request->file('img_file');
        $profile->title = $request->input('title');
        $profile->github_account = $request->input('git_account');
        $profile->linkedin_account = $request->input('linkedin_account');
        $profile->contact = $request->input('phone_contact');
        $profile->personal_detail = $request->input('profile_detail');

        $path = $request->file('img_file')->store('images');

        $profile-save();
    }
}
