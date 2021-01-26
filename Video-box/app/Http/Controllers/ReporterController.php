<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Report;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Support\Facades\Hash;

class ReporterController extends Controller
{
    function index() {
        $user = User::find(Auth::id());
        $reports = Report::where('reporter', $user->id)->get();

        return view('account.dashboard', compact("user", "reports"));
    }

    function uploadView() {
        $user = User::find(Auth::id());

        if (!$user->verified) {
            return back()->withErrors(['message' => 'Je bent nog niet geaccrediteerd']);
        }

        return view('account.upload', compact("user"));
    }

    function upload(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string',
            'video' => 'required|file|mimetypes:video/mp4,video/webm'
        ],[
            'title.required' => 'Je rapportage heeft een titel nodig',
            'video.required' => 'Je rapportage heeft natuurlijk wel een video nodig ;)',
            'video.mimetypes' => 'De video moet een mp4 of webm zijn',
        ]);

        $path       = '/reports';
        $filename   = $request->video->getClientOriginalName();
        $filename   = pathinfo($filename, PATHINFO_FILENAME);
        $videoPath  = $request->video->store('public'.$path);
        $videoPath  = preg_replace('/public/', 'storage', $videoPath, 1);

        $report = new Report();

        $report->reporter   = Auth::id();
        $report->title      = $request->title;
        $report->video      = $videoPath;

        $report->save();
        
        
        Session::flash('success', "Rapportage geüpload");
        return back();
    }

    function videoEditView($video) {
        $user = User::find(Auth::id());
        $report = Report::where('reporter', $user->id)->where('id', $video)->first();

        return view('account.videoEdit', compact("report", "user"));
    }

    function videoEdit(Request $request, $video) {
        $report = Report::where('reporter', Auth::id())->where('id', $video)->first();

        if ($request->submit == "delete") {
            $report->delete();
            return redirect()->route('reporter.crud');
        }

        $validated = $request->validate([
            'title' => 'required|string',
        ],[
            'title.required' => 'Je rapportage heeft een titel nodig',
        ]);


        $report->title = $request->title;

        $report->save();
        
        return redirect()->route('reporter.crud');
    }

    function accountEditView() {
        $user = User::find(Auth::id());

        return view('account.edit', compact('user'));
    }

    function accountEdit(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
            'password' => 'required_if:passwordChange,"on"|nullable|string|min:8|confirmed'
        ],[
            'name.required' => 'Je hebt een naam nodig',
            'email.required' => 'Je hebt een email nodig',
            'password.required_if' => 'Vul een nieuw wachtwoord in',
            'password.min' => 'Je hebt minstens :min karakters nodig in je nieuwe wachtwoord',
        ]);

        $user = User::find(Auth::id());

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        Session::flash('success', "Account bijgewerkt");
        return back();
    }
}
