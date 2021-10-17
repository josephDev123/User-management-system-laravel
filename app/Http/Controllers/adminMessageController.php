<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminMessageController extends Controller
{
   function create(){
     return view('admin.messageCreateView');
   }
}
