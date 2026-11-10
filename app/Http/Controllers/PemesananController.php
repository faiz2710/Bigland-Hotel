<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    /**
     * Menampilkan formulir pemesanan kamar
     */
    public function index()
    {
        $pemesanan = Pemesanan::latest()->get();
        return view('form.pesan', compact('pemesanan'));
    }

    /**
     * Menampilkan seluruh riwayat reservasi tanpa login (File Baru: resources/views/riwayat.blade.php)
     */
    public function riwayat()
    {
        $pemesanan = Pemesanan::latest()->get();
        return view('riwayat', compact('pemesanan'));
    }

    /**
     * Menyimpan data pemesanan kamar baru
     */
    public function store(Request $request)
    {
        // 1. Validasi data input dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_identitas' => ['required', 'string', 'regex:/^[0-9]{16}$/'],
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'tipe_kamar' => 'required|string|in:Standar,Deluxe,Executif',
            'harga' => 'required|numeric',
            'tanggal_pesan' => 'required|date',
            'durasi' => 'required|integer|min:1',
            'breakfast' => 'nullable|string',
        ], [
            'nama.required' => 'Nama lengkap pemesan wajib diisi.',
            'nomor_identitas.required' => 'Nomor identitas (KTP) wajib diisi.',
            'nomor_identitas.regex' => 'Nomor identitas (KTP) harus berupa 16 digit angka.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Pilihan jenis kelamin tidak valid.',
            'tipe_kamar.required' => 'Tipe kamar wajib dipilih.',
            'tipe_kamar.in' => 'Tipe kamar yang dipilih tidak valid.',
            'tanggal_pesan.required' => 'Tanggal check-in wajib dipilih.',
            'durasi.required' => 'Durasi menginap wajib diisi.',
            'durasi.min' => 'Durasi menginap minimal 1 malam.',
        ]);

        // 2. Perhitungan biaya di sisi server
        $harga = (int) $request->harga;
        $durasi = (int) $request->durasi;
        $breakfast = $request->input('breakfast') === 'Ya' ? 80000 : 0;

        $totalKamar = $harga * $durasi;
        $totalSarapan = $breakfast * $durasi;

        $diskon = $durasi >= 3 ? (int) round($totalKamar * 0.10) : 0;
        $totalBayar = ($totalKamar - $diskon) + $totalSarapan;

        // 3. Simpan data reservasi (user_id opsional/null)
        $pesanan = Pemesanan::create([
            'user_id' => Auth::id() ?? null,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_identitas' => $request->nomor_identitas,
            'tipe_kamar' => $request->tipe_kamar,
            'harga' => $harga,
            'tanggal_pesan' => $request->tanggal_pesan,
            'durasi' => $durasi,
            'total_bayar' => $totalBayar,
            'diskon' => $diskon,
        ]);

        // Simpan id pesanan terakhir di session agar bisa diberi highlight jika melihat riwayat
        session()->flash('pesanan_terbaru_id', $pesanan->id);

        // 4. Arahkan langsung ke halaman invoice (struk) pemesanan resmi
        return redirect()->route('invoice', $pesanan->id)->with('success', 'Reservasi kamar berhasil disimpan! Berikut struk / invoice resmi pemesanan Anda.');
    }

    /**
     * Menampilkan struk / invoice resmi pemesanan kamar (File Baru: resources/views/invoice.blade.php)
     */
    public function invoice($id = null)
    {
        if ($id) {
            $pesanan = Pemesanan::find($id);
        } else {
            $pesananId = session('pesanan_terbaru_id');
            $pesanan = $pesananId ? Pemesanan::find($pesananId) : Pemesanan::latest()->first();
        }

        if (!$pesanan) {
            return redirect()->route('form.pesan')->with('error', 'Belum ada data pemesanan untuk ditampilkan di invoice.');
        }

        return view('invoice', compact('pesanan'));
    }

    /**
     * Menghapus / membatalkan data reservasi
     */
    public function destroy($id)
    {
        $pemesanan = Pemesanan::find($id);

        if ($pemesanan) {
            $pemesanan->delete();
            return redirect()->route('riwayat')->with('success', 'Data reservasi berhasil dihapus.');
        }

        return redirect()->route('riwayat')->with('error', 'Data reservasi tidak ditemukan.');
    }
}
