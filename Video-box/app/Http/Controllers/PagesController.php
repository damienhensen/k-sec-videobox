<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;


/////////////---------The view name is the name of the file like home.blade.php the home part belongs in the view.---/////////
class PagesController extends Controller
{
    public function showHome()
    {
        $reports = Report::orderBy('viewCount', 'desc')
                            ->limit(5)
                            ->get();

        return view('home', compact('reports'));
    }
    public function showList()
    {
        return view('list');
    }
    public function showLogout()
    {
        return view('logout');
    }
    public function showAbout()
    {
        return view('about');
    }
    public function showMelding()
    {
        return view('melding');
    }
}
