<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\adminMessage;
use App\Models\notification;
use App\Models\Profiles;
use Illuminate\Http\Request;



class adminMessageController extends Controller
{

  public function create(){
   $profile = new Profiles();
   $profileData = $profile->where('user_id', '=', Auth::id())->get();
     $notificationModel = new notification();
     return view('admin.messageCreateView', ['notificationModel' => $notificationModel->all(), 'profileData'=>$profileData,]);
   }


   public function storeMessage(Request $request){
// validate the form
        $request->validate([
           'subject'=>'required|max:200',
           'content'=>'required',
        ]);

      //   insert into admin_message table 
      $adminMessage= new adminMessage();
      $adminMessage::create([
            'user_id'=>Auth::user()->id,
            'subject'=>$request->subject,
            'content'=>$request->content 
        ]);
        
         //   insert into notification table 
        notification::create([
         'user_id'=>Auth::user()->id
        ]);

        return back();
   }

   public function getNotificationMessage(){
      $notificationModel = new notification();
      // recent message posted
      $message =adminMessage::join('notifications', 'admin_messages.id', '=','notifications.id')->get(['admin_messages.*','notifications.id', 'notifications.user_id']);
      return view('viewMessage', ['message'=>$message, 'notificationModel' => $notificationModel->all()]);
     
   }



}
