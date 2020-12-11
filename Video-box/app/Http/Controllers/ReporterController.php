<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reporter;
Use Illuminate\Support\Facades\Auth;

class ReporterController extends Controller
{
    function index() {
        return view('account.dashboard');
    }

    function uploadView() {
        return view('account.upload');
        // $reporter = Reporter::find(Auth::id());

        // if (!$reporter->verified) {
        //     return back()->withErrors(['message' => 'Je bent nog niet geaccrediteerd']);
        // }
    }
}
