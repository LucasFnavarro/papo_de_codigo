<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home()
    {
        $posts = Post::paginate(6);
        return view('home', ['posts' => $posts]);
    }
}
