<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Terapkan promo 10% untuk pesanan lama yang menginap lebih dari 3 malam.
        $pesanan = DB::table('tbl_pemesanan')
            ->where('durasi', '>', 3)
            ->where('diskon', 0)
            ->get();

        foreach ($pesanan as $item) {
            $subtotal = (float) $item->total_bayar;
            $diskon = (int) round($subtotal * 0.10);

            DB::table('tbl_pemesanan')->where('id', $item->id)->update([
                'diskon' => $diskon,
                'total_bayar' => $subtotal - $diskon,
            ]);
        }
    }

    public function down(): void
    {
        // Kembalikan total ke nilai sebelum diskon.
        $pesanan = DB::table('tbl_pemesanan')->where('diskon', '>', 0)->get();

        foreach ($pesanan as $item) {
            DB::table('tbl_pemesanan')->where('id', $item->id)->update([
                'total_bayar' => (float) $item->total_bayar + (float) $item->diskon,
                'diskon' => 0,
            ]);
        }
    }
};
