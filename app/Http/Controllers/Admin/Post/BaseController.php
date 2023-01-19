<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Service\PostSerivce;

class BaseController extends Controller
{
    public PostSerivce $service;

    public function __construct(PostSerivce $service)
    {
        $this->service = $service;
    }
}
