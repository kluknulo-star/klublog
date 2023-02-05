<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $blogStatistic =[];
        $blogStatistic['usersCount'] = User::all()->count();
        $blogStatistic['postsCount'] = Post::all()->count();
        $blogStatistic['categoriesCount'] = Category::all()->count();
        $blogStatistic['tagsCount'] = Tag::all()->count();
        return view('admin.main.index', compact('blogStatistic'));
    }
}
