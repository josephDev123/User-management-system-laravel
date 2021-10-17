<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminMessageController extends Controller
{
  public function create(){
     return view('admin.messageCreateView');
   }

   public function storeMessage(){
       return 'store message in Db';
   }
}
