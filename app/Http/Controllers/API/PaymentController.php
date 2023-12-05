<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Transaksi;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function statusbayar(Request $request)
    {
        $json = json_decode($request->getContent());
        $signature_key = hash('sha512', $json->order_id . $json->status_code . $json->gross_amount . env('MIDTRANS_SERVER_KEY'));

        if ($signature_key != $json->signature_key) {
            return abort(404);
        }

        // Ubah Status Payment
        $data = Transaksi::where('nomor_urut', $json->order_id)->get();
        if ($json->transaction_status == 'pending') {
            foreach ($data as $value) {
                $value->update([
                    'status_pembayaran' => 'Menunggu Pembayaran',
                ]);
            }
        }
        if ($json->transaction_status == 'settlement') {
            foreach ($data as $value) {
                $value->update([
                    'metode_bayar' => $json->payment_type,
                    'status_pembayaran' => 'Terbayar',
                ]);
            }
        }
        if ($json->transaction_status == 'expire') {
            foreach ($data as $value) {
                $value->update([
                    'status_pembayaran' => 'Gagal',
                ]);
            }
        }
    }
}
