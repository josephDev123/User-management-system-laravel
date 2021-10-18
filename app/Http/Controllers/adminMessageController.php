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
// validate the form
        $request->validate([
           'subject'=>'required|min:100',
           'content'=>'required',
        ]);

      //   insert into table model
        adminMessage::create([
            'user_id'=>$request->Auth::user()->id,
            'subject'=>$request->subject,
            'content'=>$request->content, 
        ]);
        
        return back();
   }
}
