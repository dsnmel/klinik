<?php

namespace App\Http\Controllers;

use App\Models\farmasi;
use App\Models\pasien;
use Illuminate\Http\Request;

class arsipController extends Controller
{
    public function search(Request $request) {
        $query = $request->input('query');
    
        // Mengambil data dari tabel pasien dan farmasi
        $results = pasien::where('pasien.status', 'arsip') // hanya ambil data yang sudah diarsipkan
            ->where(function($q) use ($query) {
                $q->where('pasien.nama', 'like', '%' . $query . '%') // Tambahkan alias tabel
                  ->orWhere('pasien.no_reg', 'like', '%' . $query . '%'); // Tambahkan alias tabel
            })
            ->leftJoin('farmasi', 'pasien.no_reg', '=', 'farmasi.no_reg') // Lakukan join dengan tabel farmasi
            ->select('pasien.*', 'farmasi.diagnosa', 'farmasi.resep_obat') // Ambil kolom yang diinginkan
            ->get();
    
        return view('arsip', compact('results'));
    }
    public function arsip($id) {
        $pasien = pasien::find($id);
        if ($pasien) {
            $pasien->status = 'arsip'; // ubah status menjadi 'arsip'
            $pasien->save();
        }
        return redirect()->route('arsip'); // kembalikan ke halaman arsip
    }

    public function dok($id) {
        $farmasi = farmasi::find($id);
        if ($farmasi) {
            $farmasi->status = 'arsip'; // ubah status menjadi 'arsip'
            $farmasi->save();
        }
        return redirect()->route('arsip'); // kembalikan ke halaman arsip
    }

    public function edit($id) {
        $pasien = pasien::find($id);
        return view('edit', compact('pasien'));
    }
    public function hapus($id)
    {
        // Find the record by ID
        $record = pasien::findOrFail($id); // Replace YourModel with your actual model

        // Delete the record
        $record->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
}