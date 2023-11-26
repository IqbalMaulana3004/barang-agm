<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
// use Illuminate\View\View;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //load to pegawai views
        // return "HAI";
        //View Pegawai
        $data = Pegawai::all();
        // dd($data);
        return view('pegawai.view_pegawai', compact('data'), ["title" => "Data Pegawai"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tambah pegawai
        return view('pegawai.view_tambah_pegawai', ["title" => "Tambah Pegawai"]);
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
        $request->validate([
            // 'kode_pagawai' => 'required',
            'nama_pegawai' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_telfn' => 'required',
            // 'id_user' => 'required',
        ],[
            // 'kode_pagawai.required' => 'Wajib Diisi',
            'nama_pegawai.required' => 'Nama Pegawai Wajib Diisi',
            'jabatan.required' => 'Jabatan Wajib Diisi',
            'departemen.required' => 'Departemen Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Diisi',
            'no_telfn.required' => 'No Telphone Wajib Diisi',
            // 'id_user.required' => 'Wajib Diisi',
        ]);

        Pegawai::create([
            'kode_pegawai' => 'PE-' . time(),
            'nama_pegawai' => $request->nama_pegawai,
            'jabatan' => $request->jabatan,
            'departemen' => $request->departemen,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telfn' => $request->no_telfn,
            'id_user' => 'USER-02',
        ]);
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil ditambahkan');        // return 'hai';
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
    public function edit($kode_pegawai)
    {
        $pegawai = Pegawai::where('kode_pegawai', $kode_pegawai)->firstOrFail();
        return view('pegawai.view_ubah_pegawai', compact('pegawai'),  ["title" => "Ubah Pegawai"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_pegawai)
    {
        // Validasi input
        $request->validate([
            'nama_pegawai' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_telfn' => 'required',
        ]);

        // Temukan pegawai berdasarkan kode pegawai
        $pegawai = Pegawai::where('kode_pegawai', $kode_pegawai)->firstOrFail();

        // Update data pegawai
        $pegawai->update([
            'nama_pegawai' => $request->nama_pegawai,
            'jabatan' => $request->jabatan,
            'departemen' => $request->departemen,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telfn' => $request->no_telfn,
        ]);

        // Redirect dengan notifikasi sukses
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_pegawai)
    {
        try {
            // Temukan Pegawai berdasarkan kode pegawai
            $pegawai = Pegawai::where('kode_pegawai', $kode_pegawai)->first();
    
            // Hapus data Pegawai jika ditemukan
            if ($pegawai) {
                $pegawai->delete();
                return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil dihapus');
            }
    
            // Redirect dengan notifikasi gagal jika Pegawai tidak ditemukan
            return redirect()->route('pegawai.index')->with('error', 'Data Pegawai tidak ditemukan');
        } catch (\Exception $e) {
            // Tampilkan pesan kesalahan untuk debugging
            return redirect()->route('pegawai.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    
    
}
