<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Session;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    // public function login(Request $data)
    // {
    //     $pas = DB::table('users')->where('email',$data->email)->first();
    //     $result = DB::table('users')->where('email',$data->email)->count();
    //     //cek username ada atau tidak
    //     if ($result == 1 )
    //     {
    //        //apabila terdapat email
    //         if(\Hash::check($data->password, $pas->password))
    //         {
    //             //berhasil
    //             $catatan= DB::table('users')->where('email',$data->email)->get();
    //             return view('dashboard');
                
    //         }else{
    //             Session::flash('loginError', 'Login gagal ! Username atau Password Salah');
    //             return redirect()->intended('/');
    //         }             
    //     }
    // }

    public function login (Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required| email:dns',
            'password' => 'required'
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Anda Berhasil Login!');
        }

        return back()->with('loginError', 'Login gagal ! Username atau Password Salah');
    }


    public function logout (Request $request)
    {
        Auth::logout();
        // $request->session()-invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
