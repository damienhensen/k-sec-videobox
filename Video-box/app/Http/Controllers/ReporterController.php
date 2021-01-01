<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reporter;
use App\Report;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Session;

class ReporterController extends Controller
{
    function index() {
        $reports = Report::where('reporter', 1)->get();

        return view('account.dashboard', compact("reports"));
    }

    function uploadView() {
        return view('account.upload');
        // $reporter = Reporter::find(Auth::id());

        // if (!$reporter->verified) {
        //     return back()->withErrors(['message' => 'Je bent nog niet geaccrediteerd']);
        // }
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
        $newname    = md5($filename. time());
        $videoPath  = $request->video->store('public'.$path);
        $videoPath  = preg_replace('/public/', 'storage', $videoPath, 1);

        $report = new Report();

        $report->reporter   = 1;
        $report->title      = $request->title;
        $report->video      = $videoPath;

        $report->save();
        
        
        Session::flash('success', "Rapportage geüpload");
        return back();
    }

    function videoEditView($video) {
        $report = Report::where('reporter', 1)->where('id', $video)->first();

        return view('account.videoEdit', compact("report"));
    }

    function videoEdit(Request $request, $video) {
        $report = Report::where('reporter', 1)->where('id', $video)->first();

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
}
