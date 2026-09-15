<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return view('form.pesan', compact('pemesanan'));
    }

    public function riwayat()
    {
        $pemesanan = Pemesanan::where('user_id', Auth::id())->latest()->get();
        return view('page.riwayat', compact('pemesanan'));
    } 

    public function store(Request $request)
    {
        // 1. Validasi data input dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_identitas' => 'required|string|size:16',
            'jenis_kelamin' => 'required|string',
            'tipe_kamar' => 'required|string',
            'harga' => 'required|numeric',
            'tanggal_pesan' => 'required|date',
            'durasi' => 'required|integer|min:1',
            'total_bayar' => 'required|numeric',
        ]);

        // 2. Simpan data dengan menyertakan user_id
        Pemesanan::create([
            'user_id' => Auth::id(), 
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_identitas' => $request->nomor_identitas,
            'tipe_kamar' => $request->tipe_kamar,
            'harga' => $request->harga,
            'tanggal_pesan' => $request->tanggal_pesan,
            'durasi' => $request->durasi,
            'total_bayar' => $request->total_bayar,
        ]);

        // 3. Arahkan langsung ke halaman riwayat agar datanya langsung terlihat
        return redirect()->route('riwayat')->with('success', 'Pemesanan berhasil disimpan!');
    }
}