<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AntarmukaController extends Controller
{
 
    public function index()
    {
        //Login View
        return view('auth.login');
    }

    public function adminDashboard()
    {
        //dashboard view admin
        $data['title'] = 'Dashboard';
        return view('dashboard.admin', $data);
    }

    public function stafDashboard()
    {
        //dashboard view staf
        $data['title'] = 'Dashboard';
        return view('dashboard.staf', $data);
    }

    public function kepalaItDashboard()
    {
        //dashboard view kep_it
        $data['title'] = 'Dashboard';
        return view('dashboard.kep_it', $data);
    }

    public function pegawaiView()
    {
        //View Pegawai
        $data = Pegawai::all();
        return view('pegawai.view_pegawai', compact('data'), ["title" => "Data Pegawai"]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
