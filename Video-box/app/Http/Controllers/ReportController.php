<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function getReportList()
    {
        return view ('report.list', [
           Report::TABLE_NAME => Report::all()
        ]);
    }
}
