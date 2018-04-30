<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Shop;
use Mail;
use App\Mail\Reminder;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == "Cashier"){
            if( DB::table('cashiers')->where('username',Auth::user()->username)->first()->password == null){
            return redirect(route('cashier.add'));}
            else{
                return redirect('/cashier/resetPassword');
            }
        }
        if(Auth::user()->status == "unverify"){
            return view('mail.reminder');
        }
        $membercard = DB::table('membercards')->get();
        $shop_url = DB::table('shops')->get()->pluck('url','id');
        return view('home',['membercard'=>$membercard , 'shop_url' => $shop_url]);
    }

    public function testMail(){
        $mail = 'suphavich.c@gmail.com';
        Mail::to($mail)->send(new Reminder);
        dd('mail send success');

    }
}
