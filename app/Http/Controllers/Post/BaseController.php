<?php


namespace App\Http\Controllers\Post;


use App\Http\Controllers\Controller;
use App\Servises\Post\PostService;

class BaseController extends Controller
{
    public $service;

    public function __construct(PostService $post_service)
    {
        $this->service = $post_service;
    }
}
