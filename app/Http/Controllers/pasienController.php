<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;

class pasienController extends Controller
{
    public function tampil() {
        $pasien = pasien::where('status', 'aktif')->get(); // hanya ambil data pasien yang aktif
        return view('dokter.dokter', compact('pasien'));
    }

    public function tambah() {
        return view('regist');
    }

    public function submit(Request $request) {
        // Validasi data input
        $request->validate([
            'no_reg' => 'required',
            'nama' => 'required',
            'kelamin' => 'required',
            'ttl' => 'required|date',
            'tujuan' => 'required',
            'no_hp' => 'required',
        ]);
    
        // Simpan data pasien ke database
        $pasien = new Pasien();
        $pasien->no_reg = $request->no_reg;
        $pasien->nama = $request->nama;
        $pasien->kelamin = $request->kelamin;
        $pasien->ttl = $request->ttl;
        $pasien->tujuan = $request->tujuan;
        $pasien->no_hp = $request->no_hp;
        $pasien->status = 'aktif'; // status default 'aktif'
        $pasien->save();
    
        // Redirect kembali dengan flash message dan data pasien
        return view('print', ['data' => $request->all()]);
    }
    

    public function hapus($id) {
        $pasien = pasien::find($id);
        if ($pasien) {
            $pasien->status = 'arsip'; // ubah status menjadi 'arsip'
            $pasien->save();
        }
        return redirect()->route('dokter.dokter');
    }
}