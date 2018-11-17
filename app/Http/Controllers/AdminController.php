<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\User;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // defining breadcrumb params
        $breadcrumbParams = json_encode([
            ["titleText" => "Admin","url" => ""]
        ]);
        $users = User::count();
        $articles = Article::count();
        $authors = User::where('author','=','T')->count();
        $admins = User::where('admin','=','T')->count();
        return view('admin', compact(
            'breadcrumbParams',
            'users',
            'articles',
            'authors',
            'admins'
        ));
    }
}
