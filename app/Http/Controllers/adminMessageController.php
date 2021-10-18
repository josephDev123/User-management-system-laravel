<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\adminMessage;
use App\Models\notification;
use Illuminate\Http\Request;


class adminMessageController extends Controller
{

  public function create(){
     $notificationModel = new notification();
     return view('admin.messageCreateView', ['notificationModel' => $notificationModel->all()]);
   }


   public function storeMessage(Request $request){
// validate the form
        $request->validate([
           'subject'=>'required|max:200',
           'content'=>'required',
        ]);

      //   insert into table model
      $adminMessage= new adminMessage();
      $adminMessage::create([
            'user_id'=>Auth::user()->id,
            'subject'=>$request->subject,
            'content'=>$request->content 
        ]);
        
        notification::create([
         'user_id'=>Auth::user()->id
        ]);

        return back();
   }

   public function getNotificationMessage(){
      return 'i got the message';
   }



}
