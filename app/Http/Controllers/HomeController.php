<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = DB::table('posts as p')
            ->select('p.*','u.name')
            ->join('users as u','u.id','p.idUser')
            ->orderBy('created_at','desc')
            ->get();
        return view('home')->with(compact('posts'));
    }
}
