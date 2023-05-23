<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{

    public function index()
        {
    $user_id = auth()->id(); 
    $riwayats = Report::where('user_id', $user_id)->orderByDesc('created_at')->get();
    return view('riwayat',[
        'riwayats' => $riwayats
    ]);
    }


    public function destroy(Report $report)
    {
        $report->comments()->delete();
        $report->likes()->delete();
        Report::destroy($report->id);
        return redirect(route('riwayat.index'))->with('success','Report Successfully Deleted !');
    }



}
