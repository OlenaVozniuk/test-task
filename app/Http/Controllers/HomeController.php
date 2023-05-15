<?php

namespace App\Http\Controllers;

use App\Services\Post\Contracts\PostServiceInterface;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function __invoke(): View
    {
        return view('home.home', [
            'posts' => resolve(PostServiceInterface::class)->getAllPaginated()
        ]);
    }
}
