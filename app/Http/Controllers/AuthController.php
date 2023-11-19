<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
// use Symfony\Component\HttpFoundation\Session\Session;
// use Illuminate\Database\QueryException;

class AuthController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prosesLogin(Request $request)
    {
        // Session
        Session::flash('username', $request->username);

        // Validate input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);
    
        // Prepare login information
        // $infoLogin = [
        //     'username' => $request->username,
        //     'password' => $request->password,
        // ];
    
        // Attempt authentication
        // if (Auth::attempt($infoLogin)) {
 
        //     if (Auth::user()->role == 'admin') {
        //         // Admin Dash
        //         return redirect('adminDash');

        //     }elseif (Auth::user()->role == 'staf') {
        //         // Kep Dash
        //         return redirect('dashboard.staf');

        //     }else {
        //         // staf Dash
        //         return redirect('dashboard.kep_it');
        //     }
    
        // } else {
        //     // If authentication fails, redirect with error message
        //     return redirect('/')->withErrors('Cek Kambali Username Dan Passwod !!!');
        // }

        $user = User::where('username', $request->username)->first();

        // Jika user ada
        if ($user) {
            // Verifikasi Password
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);

                // set session
                Session::put('username', $user->username);
                Session::put('role', $user->role);

                if ($user->role === 'admin') {
                    return redirect('adminDash');
                } elseif ($user->role === 'staf') {
                    return redirect('stafDash');
                } else {
                    return redirect('KepItDash');
                }
            }else {
                 // Display error message for incorrect password
                return redirect()->back()->with('error', 'Password Yang Anda Masukkan Salah');
            }
        }else {
            // Display Error
            return redirect()->back()->with('error', 'Username Tidak Terdaftar');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/')->with('success','Berhasil Logout');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

    }
}
