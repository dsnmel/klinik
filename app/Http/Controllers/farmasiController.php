<?php

namespace App\Http\Controllers;
use App\Models\farmasi;
use Illuminate\Http\Request;

class farmasiController extends Controller
{
    function tampil(){
        $farmasi = farmasi::where('status', 'aktif')->get();
        return view('farmasi.farmasi', compact('farmasi'));
    }
    function tambah(){
        return view('dokter.submit');
    }
    public function submit(Request $request) {
        $farmasi = new Farmasi();
        $farmasi->no_reg = $request->no_reg;
        $farmasi->nama = $request->nama;
        $farmasi->diagnosa = $request->diagnosa;
        $farmasi->resep_obat = $request->resep_obat;
        $farmasi->save();

        return redirect()->route('dokter.dokter')->with([
            'success' => 'Data berhasil dikirim ke dashboard farmasi.',
            'data' => $farmasi
        ]);
    }
    public function cetak(Request $request)
{
    $data = [
        'no_reg' => $request->input('no_reg'),
        'nama' => $request->input('nama'),
        'poli' => $request->input('poli'), // Pastikan 'poli' juga dikirim
        'harga' => $request->input('harga'), // Pastikan 'harga' juga dikirim
    ];

    return view('cetak', ['data' => $request->all()]);
}
public function delete($id) {
    $farmasi = farmasi::find($id);
    if ($farmasi) {
        $farmasi->status = 'arsip'; // ubah status menjadi 'arsip'
        $farmasi->save();
    }
    return redirect()->route('farmasi.farmasi');
}
public function index() {
    // Ambil semua data dari tabel farmasi
    $farmasi = Farmasi::all();

    // Kirim data ke view farmasi
    return view('farmasi.farmasi', compact('farmasi'));
}
}
