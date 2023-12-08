<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KelolaBarang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
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
            ->select('tb_barang.*', 'tb_kelola_barang.jenis_kelola', 'tb_kelola_barang.keterangan', 'tb_kelola_barang.jumlah_kelola', 'tb_kelola_barang.created_at')
            ->where('tb_kelola_barang.jenis_kelola', '=', 'Masuk',)
            ->get();
        
        return view('barang.barang_masuk.barang_masuk', compact('data'), ["title" => "Data Barang"]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang.barang_masuk.tambah_barang_masuk', ["title" => "Tambah Barang Masuk"]);

    }

    public function generateKodeBarang(){
        $jumlahBarang = DB::table('tb_barang')->count();
        // $id_user = 
        $angkaAcak = sprintf('%04d', mt_rand(0, 9999));

        $kodeBarang = $angkaAcak . $jumlahBarang;

        return $kodeBarang;
    }

    public function generateKodeKelolaBarang(){
        $jumlahBarang = DB::table('tb_kelola_barang')->count();
        // $id_user = 
        $angkaAcak = sprintf('%04d', mt_rand(0, 9999));

        $kodeBarang = $angkaAcak . $jumlahBarang;

        return $kodeBarang;
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
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'tanggal_masuk' => 'required',
            'merek' => 'required',
            'jumlah_barang' => 'required',
            'keterangan' => 'required',
        ], [
            'nama_barang.required' => 'Nama Barang Wajib Diisi',
            'jenis_barang.required' => 'Jenis Barang Wajib Diisi',
            'tanggal_masuk.required' => 'Tanggal Masuk Wajib Diisi',
            'merek.required' => 'Merek Wajib Diisi',
            'jumlah_barang.required' => 'Jumlah Barang Wajib Diisi',
            'keterangan.required' => 'Keterangan Wajib Diisi',
        ]);
    
        $kode_barang = 'BR-' . time();
        $currentTime = now(); // Get the current timestamp
    
        Barang::create([
            'kode_barang' => $kode_barang,
            'nama_barang' => $request->nama_barang,
            'merek' => $request->merek,
            'jenis_barang' => $request->jenis_barang,
            'stok_barang' => $request->jumlah_barang,
            'tanggal_masuk' => $request->tanggal_masuk,
            'id_user' => 'USER-02',
        ]);
    
        KelolaBarang::create([
            'kode_kelola_barang' => 'KB-' . time(),
            'kode_barang' => $kode_barang,
            'jenis_kelola' => 'Masuk',
            'keterangan' => $request->keterangan,
            'jumlah_kelola' => $request->jumlah_barang,
            'tanggal_kelola' => $request->tanggal_masuk,
            'created_at' => $currentTime,
            'updated_at' => $currentTime,
        ]);
    
        return redirect()->route('barang-masuk.index')->with('success', 'Data Barang berhasil ditambahkan');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_barang)
    {
        $barang = DB::table('tb_barang')
            ->join('tb_kelola_barang', 'tb_barang.kode_barang', '=', 'tb_kelola_barang.kode_barang')
            ->select('tb_barang.*', 'tb_kelola_barang.jenis_kelola', 'tb_kelola_barang.keterangan', 'tb_kelola_barang.jumlah_kelola')
            ->where('tb_barang.kode_barang', '=', $kode_barang)
            ->where('tb_kelola_barang.jenis_kelola', '=', 'Masuk')
            ->where('tb_kelola_barang.kode_barang', '=', $kode_barang) // Additional where condition
            ->first();
    
            // dd($barang);
        return view('barang.barang_masuk.edit_barang_masuk', compact('barang'), ["title" => "Ubah Barang Masuk"]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'tanggal_masuk' => 'required',
            'merek' => 'required',
            'jumlah_barang' => 'required',
            'keterangan' => 'required',
        ], [
            'nama_barang.required' => 'Nama Barang Wajib Diisi',
            'jenis_barang.required' => 'Jenis Barang Wajib Diisi',
            'tanggal_masuk.required' => 'Tanggal Masuk Wajib Diisi',
            'merek.required' => 'Merek Wajib Diisi',
            'jumlah_barang.required' => 'Jumlah Barang Wajib Diisi',
            'keterangan.required' => 'Keterangan Wajib Diisi',
        ]);
    
        // Assuming you have an Eloquent model for Barang
        $barang = Barang::where('kode_barang', $kode_barang)->first();
    
        if (!$barang) {
            // Handle the case where the record is not found
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Update the existing record
        $barang->nama_barang = $request->nama_barang;
        $barang->merek = $request->merek;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->stok_barang = $request->jumlah_barang;
        $barang->tanggal_masuk = $request->tanggal_masuk;
        $barang->id_user = 'USER-02'; // You might want to get the user ID dynamically
    
        $barang->save();
    
        // Assuming you have an Eloquent model for KelolaBarang
        $kelolaBarang = KelolaBarang::where('kode_barang', $kode_barang)->first();
    
        if (!$kelolaBarang) {
            // Handle the case where the record is not found
            return redirect()->back()->with('error', 'Record not found.');
        }
    
        // Update the existing KelolaBarang record
        $kelolaBarang->keterangan = $request->keterangan;
        $kelolaBarang->jumlah_kelola = $request->jumlah_barang;
        $kelolaBarang->updated_at = now(); // Update the updated_at timestamp
    
        $kelolaBarang->save();
    
        return redirect()->route('barang-masuk.index')->with('success', 'Data Barang berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_barang)
    {
        try {
            // Temukan Pegawai berdasarkan kode pegawai
            $barang = Barang::where('kode_barang', $kode_barang)->first();
    
            // Hapus data Pegawai jika ditemukan
            if ($barang) {
                $barang->delete();
                return redirect()->route('barang-masuk.index')->with('success', 'Data Barang berhasil dihapus');
            }
    
            // Redirect dengan notifikasi gagal jika Pegawai tidak ditemukan
            return redirect()->route('barang-masuk.index')->with('error', 'Data Barang tidak ditemukan');
        } catch (\Exception $e) {
            // Tampilkan pesan kesalahan untuk debugging
            return redirect()->route('barang-masuk.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
