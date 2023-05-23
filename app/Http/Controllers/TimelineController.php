<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Comment;
use Illuminate\Http\Request;

class TimelineController extends Controller
{

    public function index()
    {
        return view('timelines',[
            'reports' => Report::latest()->filter(request(['search']))->get(),
            'comments' => Comment::all()
        ]);
    }

    public function show($reportId)
    {


        $report = Report::where('id', $reportId)->take(1)->get();

        $comments = Comment::where('report_id', $reportId)->get();

        if (!$report) {
            abort(404);
        }

        return view('timelines', [
            'reports' => $report,
            'comments' => $comments
        ]);
    }


}
