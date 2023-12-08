<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KelolaBarang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BarangRusakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('tb_barang')
        ->join('tb_kelola_barang', 'tb_barang.kode_barang', '=', 'tb_kelola_barang.kode_barang')
        ->select('tb_barang.*', 'tb_kelola_barang.jenis_kelola', 'tb_kelola_barang.keterangan', 'tb_kelola_barang.jumlah_kelola', 'tb_kelola_barang.tanggal_kelola')
        ->where('tb_kelola_barang.jenis_kelola', '=', 'Rusak',)
        ->get();
    
    return view('barang.barang_rusak.barang_rusak', compact('data'), ["title" => "Data Barang Rusak"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Barang::All();
        return view('barang.barang_rusak.tambah_barang_rusak', compact('data'), ["title" => "Tambah Barang Rusak"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'tanggal_rusak' => 'required',
            'jumlah_kelola' => 'required',
            'keterangan' => 'required',
           
        ],[
            'kode_barang.required' => 'Nama Barang Wajib Diisi',
            'tanggal_rusak.required' => 'Tanggal Rusak Wajib Diisi',
            'jumlah_kelola.required' => 'Jumlah Barang Wajib Diisi',
            'keterangan.required' => 'Keterangan Wajib Diisi',
         
        ]);

        $currentTime = now();

        KelolaBarang::create([
            'kode_kelola_barang' => 'KB-' . time(),
            'kode_barang' => $request->kode_barang,
            'jenis_kelola' => 'Rusak',
            'keterangan' => $request->keterangan,
            'jumlah_kelola' => $request->jumlah_kelola,
            'tanggal_kelola' => $request->tanggal_rusak,
            'created_at' => $currentTime,
            'updated_at' => $currentTime,
        ]);
        return redirect()->route('barang-rusak.index')->with('success', 'Data Barang Rusak berhasil ditambahkan');  
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
