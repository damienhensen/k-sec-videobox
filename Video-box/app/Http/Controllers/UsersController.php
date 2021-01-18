<?php

namespace App\Http\Controllers;
use App\Reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Dum;
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
    
    public function destroy($id)
    {
    //   if ($id != null) {
    //     $id->delete();
    //     return redirect()->route('user.list');
    // }
        $id = Dum::find($id);
        $id ->delete();
       session()->flash('message', 'Delete Successfully');
        return redirect()->route('user.list');
    }
}
