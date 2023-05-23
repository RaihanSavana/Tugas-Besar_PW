<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Like;


class LikeController extends Controller
{
    public function count($id)
    {
        $like = Like::where('user_id', auth()->user()->id)
            ->where('report_id', $id)
            ->first();

        if ($like) {
            $like->delete(); // Unlike  report
        } else {
            $like = new Like;
            $like->user_id = auth()->user()->id;
            $like->report_id = $id;
            $like->save(); // Like  report
        }

        return redirect('/timelines');
    }
}
