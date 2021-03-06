<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LogController;
use Mail;
use App\Mail\Reminder;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|unique:users,phone|numeric',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $private = str_random(40);
        $this->sendMail($data['email'] ,  $data['username']);    
        return User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => 'User',
            'private_key' => $private,
            'phone' => $data['phone'],
            'status' => 'unverify'
        ]);
        
    }

    public function createAffi()
    {
        $username = request()->username;
        $name = request()->name;
        $password = request()->password;
        $email = request()->email;
        $code = request()->code;
        $private = str_random(40);
        $remember = str_random(40);
        $phone = request()->phone;

        $bePointRecord = new LogController;

        // Record to Affiliate Table
        DB::table('affiliates')->insert(
            ['username' => $code,
            'assigned_to' => $username]);

        // BePoint
        $count = DB::table('affiliates')->where('username',$code)->count();
        $bePoint = DB::table('users')->where('username',$code)->first()->bePoint;
        if ($count > 5){
            $msg = "Invited to register , and BePoint not plus because invitie is more than 5. But $username has 100 BePoint on started.";
        }else{
            $bePointRecord->recordBePoint($code,"Invited to $username for register.",50,0);
            $msg = "Invited to register , and BePoint+50 (={{ $bePoint+50 }}) because invitie is {{ $count }}. But $username has 100 BePoint on started.";
        }

        // Create User
        $newbp = 100;
        User::create([
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => 'User',
            'private_key' => $private,
            'remember_token' => $remember,
            'phone' => $phone,
            'bePoint' => $newbp,
            'status' => 'unverify'
        ]);

        // BePoint
        $bePointRecord->recordBePoint($username,"Register from $code invite.",100,0);

        // Logs
        DB::table('user_logs')->insert(
            ['username' => $code,
            'msg' => $msg,
            'assigned_to' => $username]
        );

        //mail
        $this->sendMail($email,$username);

        return redirect('/');
    }

    public function sendMail($email,$username){
        // $mail = $email;
        // Mail::to($mail)->send(new Reminder);
        $data = [
            'username' => $username,        
            'email' => $email
        ];
        // dd($data);
        $sendMailStatus = Mail::send('mail.verifyEmail', ['data' => $data] , function ($message) use ($data) {
        $message->from('eventhubth@gmail.com', 'BeCard');
        $message->to($data['email'])->subject('BeCerd Verify Account');
        });
        // dd('mail send success');

    }

}
