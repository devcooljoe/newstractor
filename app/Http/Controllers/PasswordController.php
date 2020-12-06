<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\User;
use App\Custom;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PasswordController extends Controller
{


    public function index() {
        return view('auth.passwords.email');
    }







    public function checkAndSendToken() {
        $data = request()->validate(['email'=>'required | email']);
        $user = User::where('email', $data['email'])->first();
        if ($user != null) { 
            $str = '$ABCDEFGHIJKL$MNOPQRSTUVWXYZ$';
            $uniqid = uniqid('', true).uniqid('', true).$str.uniqid('', true);
            $token = str_shuffle(str_replace('.', '', $uniqid));

            include 'templates/password.php';
            $html = getPasswordHtml($token, route('index'));
            $send = Custom::sendMail($user->email, 'Reset Your Password.', $html);
            
            if ($send) {
                Session::put('tokenemail', $user->email);
                Session::put('token', $token);
                return redirect('/password/email')->with('success', 'A reset password link has been sent to the email provided and will expire soon.');
            }else{
                return redirect('/password/email')->with('message', 'Failed to send Link.');
            }
        }else {
            return redirect('/password/email')->with('message', 'Sorry! We can\'t find your account.');
        }
    }










    public function resendResetLink() {
        if (Session::has('token') && Session::has('tokenemail')) {
            $token = Session::get('token');
            $email = Session::get('tokenemail');
            include 'templates/password.php';
            $html = getPasswordHtml($token, route('index'));
            $send=Custom::sendMail($email, 'Reset Your Password.', $html);
            if ($send) {
                return redirect('/password/email')->with('success', 'Another reset password link has been sent to the email provided and will expire soon.');
            }else{
                return redirect('/password/email')->with('message', 'Failed to send Link.');
            }
        }else{
            die('INVALID/EXPIRED TOKEN!');
        }
    }







    public function verifyToken() {
        if (request()->token) {
            $token = request()->token;
            if (Session::has('token') && Session::has('tokenemail')) {
                if (Session::get('token') == $token) {
                    Session::forget('token');
                    Session::put('tokenVerified', true);
                    return redirect('/password/reset');
                }
            }else{
                die('INVALID/EXPIRED TOKEN!');
            }
        }else {
            die('EMPTY TOKEN!');
        }
    }







    public function viewResetForm() {
        if (Session::has('tokenVerified')) {
            return view('auth.passwords.reset');
        }else {
            die('INVALID REQUEST!');
        }
    }



    public function reset() {
        $data = request()->validate([
            'password' => ['required', 'min:6', 'confirmed'],
        ]);
        
        $user = User::where('email', Session::get('tokenemail'))->first();

        if (Hash::check($data['password'], $user->password) != true) {
            $user->update([
                'password'=>Hash::make($data['password']),
            ]);

            return redirect('/');
        }else {
            return redirect('/password/reset')->with('message', 'New password must be different from the old one!');
        }

    }

    
}