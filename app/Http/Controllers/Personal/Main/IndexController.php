<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        return redirect()->route('personal.like.index');
//        return view('personal.main.index');
    }
}
