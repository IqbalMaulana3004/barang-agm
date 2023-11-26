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
        // Validate input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);
    
        // Mencari user berdasarkan username
        $user = User::where('username', $request->username)->first();
    
        // Jika user ada
        if ($user) {
            // Verifikasi Password menggunakan fungsi otentikasi Laravel
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                // Set session
                session()->put('username', $user->username);
                session()->put('role', $user->role);
    
                // Redirect berdasarkan peran (role) user
                return redirect($this->redirectBasedOnRole($user->role));
            } else {
                // Display error message for incorrect password
                return redirect()->back()->withErrors(['password' => 'Password yang Anda masukkan salah']);
            }
        } else {
            // Display error message for non-existent username
            return redirect()->back()->withErrors(['username' => 'Username tidak terdaftar']);
        }
    }
    
    // Metode untuk menentukan redirect berdasarkan peran (role) user
    private function redirectBasedOnRole($role)
    {
        switch ($role) {
            case 'admin':
                return 'adminDash';
            case 'staf':
                return 'stafDash';
            default:
                return 'KepItDash';
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout(); // Lakukan logout user

        $request->session()->invalidate(); // Hapus sesi user

        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/')->with('success', 'Anda telah berhasil logout.');
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
