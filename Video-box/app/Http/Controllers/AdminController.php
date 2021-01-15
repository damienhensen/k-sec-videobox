<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function __construct() {
        $this->middleware(function ($request, $next) {  
            if (Auth::user()->type != 'admin') {
                return redirect('/');
            }
            
            return $next($request);
        });
    }
    public function index()
    {
        return view('admin.index');
    }
    public function overzicht()
    {
        return view('admin.overzicht');


    }

}
