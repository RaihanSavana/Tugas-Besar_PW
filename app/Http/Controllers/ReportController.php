<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Report;


class ReportController extends Controller{

    public function create()
    {
        $categories = Category::all();
        return view('reports', [
            'categories'=>$categories
        ]);

    }


    public function store(Request $request) // menangkap isi form
    {

        // validate
        $validatedData =  $request->validate([
            'title' => 'required|max:100|min:5|',
            'description' => 'required|max:500|min:20|',
            'address' => 'required|min:5|max:50',
            'category' => 'required',
            'severity' => 'required',
            'media' => 'required|image|file'
        ]);

        // dd($request);  (cek isi request)

        // upload database
        $report = new Report;

        $report->user_id = auth()->user()->id;
        $report->title = $validatedData['title'];
        $report->description = $validatedData['description'];
        $report->address = $validatedData['address'];
        $report->category_id = $validatedData['category'];
        $report->severity = $validatedData['severity'];
        $report->media = str_replace('public/', '', $request->file('media')->store('public'));
        $report->save();

        return redirect(route('timelines.index'))->with('success','Report Successfully Posted !!');
    }









}
