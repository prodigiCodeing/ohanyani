<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
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
        Mail::raw($request->message, function ($message) {
            $message->from('info.ohanyan@gmail.com', 'Ohanyan Team');
            $message->to('smariamvs@gmail.com');
            $message->subject('Quote message for first mini quiz');
        });
         return response()->json([
            'success'=>true
        ]);
    }
    public function sendNumberMAil(Request $request){
        Mail::raw($request->message, function ($message) {
            $message->from('info.ohanyan@gmail.com', 'Ohanyan Team');
            $message->to('smariamvs@gmail.com');
            $message->subject('Quote message for Second mini quiz');
        });
        return response()->json([
            'success'=>true
        ]);
    }
    public function saveUserProgress(Request $request){
        $score = new Score();
        $score->userId = $request->user()->id;
        $score->score = $request->rightCount;
        $score->save();
        return response()->json([
            'success'=>true
        ]);
    }
}
