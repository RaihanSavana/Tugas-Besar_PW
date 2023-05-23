<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Comment;


class AdminController extends Controller
{

    public function index()
    {
        $reports = Report::latest()->filter(request(['search']))->get();
        return view('admin.dashboard',[
            'reports'=>$reports,
            'comments' => Comment::all()
        ]);
    }


    public function show()
    {

        $user_reports = Report::all();
        return view('admin.reports-list',['reports' => $user_reports]);
    }

    public function showReport($reportId)
    {

        $report = Report::where('id', $reportId)->take(1)->get();

        $comments = Comment::where('report_id', $reportId)->get();

        if (!$report) {
            abort(404);
        }

        return view('admin.dashboard', [
            'reports' => $report,
            'comments' => $comments
        ]);
    }


    public function destroy(Report $report)
    {
        // hapus relasi ne dulu
        $report->likes()->delete();
        $report->comments()->delete();

        // hapus report
        $report->delete();
        return redirect('/user-reports')->with('success','Report Succcesfully Deleted !');
    }

    public function update(Report $report)
    {
        $report->alert = 9;
        $report->save();

        return redirect('/user-reports')->with('warn','Report Succcesfully Warned !');
    }



}
