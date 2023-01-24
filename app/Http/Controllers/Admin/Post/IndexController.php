<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;
use Illuminate\Contracts\Container\BindingResolutionException;

class IndexController extends Controller
{
    /**
     */
    public function __invoke()
    {
        dd(11111);
    }
}
