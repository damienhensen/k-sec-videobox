<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    public function list(){
      $users = DB::table('users')->get();
      dd($users);
    }
    public function details(){
        
    }
}
