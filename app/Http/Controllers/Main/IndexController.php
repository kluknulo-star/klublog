<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $route = 'personal.main.index';
        if (auth()->user()->role_id === 0)
        {
            $route = 'admin.main.index';
        }
        return redirect()->route($route);
    }
}
