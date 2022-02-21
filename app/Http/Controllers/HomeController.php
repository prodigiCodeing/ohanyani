<?php

namespace App\Http\Controllers;

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
        return view('home');
    }
    public function sendQuote(Request $request){
        return response()->json([
            'success'=>true
        ]);
    }
    public function sendNumberMAil(Request $request){
        dd($request);
        return response()->json([
            'success'=>true
        ]);
    }
    public function saveUserProgress(Request $request){
        return response()->json([
            'success'=>true
        ]);
    }
}
