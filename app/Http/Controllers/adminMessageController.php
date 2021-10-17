<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\adminMessage;
use Illuminate\Http\Request;


class adminMessageController extends Controller
{
  public function create(){
     return view('admin.messageCreateView');
   }

   public function storeMessage(Request $request){

        $request->validate([
           'subject'=>'required|min:100|max:100',
           'content'=>'required',
        ]);

        adminMessage::create([
            'user_id'=>$request->user,
            'subject'=>$request->subject,
            'content'=>$request->content, 
        ]);

   }
}
