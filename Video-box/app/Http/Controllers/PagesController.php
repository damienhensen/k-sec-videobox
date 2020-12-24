<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/////////////---------The view name is the name of the file like home.blade.php the home part belongs in the view.---/////////
class PagesController extends Controller
{
    public function showHome()
    {
        return view('home');
    }
    public function showAbout()
    {
        return view('about');
    }
    public function showList()
    {
        return view('list');
    }
    public function showLogout()
    {
        return view('logout');
    }
    public function showMelding()
    {
        return view('melding');
    }
}
