<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    public function list(){
      $users = DB::table('users')->get();
     
      return view('admin.list', ['userlist' => $users]);
    
    }
      public function details($id){
      $user = DB::table('users')->find($id);  

      return view('admin.details', ['list' => $user]);



    }
}
