<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.add-category');
    }

    public function store(Request $request)
    {

        $category = new Category;

        $category->name = $request->name;
        $category->save();

        return redirect(route('admin.categories.create'))->with('success', 'New Category Successfully Added !');

    }

    
}
