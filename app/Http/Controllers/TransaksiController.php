<?php

namespace App\Http\Controllers;

use App\Bookingpaket;
use App\Http\Controllers\Controller;
use App\Paketwisata;
use App\Customer;
use App\Pengelolawisata;
use App\Transaksi;
use App\User;
use App\Ratting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\Cookie;

class TransaksiController extends Controller
{
    private function getCarts()
    {
        $carts = json_decode(request()->cookie('dw-carts'), true);
        $carts = $carts != '' ? $carts : [];
        return $carts;
    }

    public function addToCart(Request $request)
    {
        $carts   = $this->getCarts();
        $member  = User::where('id', auth()->user()->id)->first();
        $cekList = Bookingpaket::where('paket_wisata_id', $request->paketwisataid)->where('user_id', $member->user_id)->exists();

        if ($cekList) {
            return redirect()->back()->with(['success' => 'Paket Sudah Ada Di Keranjang']);
        } else {
            $paketWisata = Paketwisata::find($request->paketwisataid);
            $totalPersonal = $request->jml_org * $paketWisata->harga;
            $totalGroup = $request->qty * $paketWisata->harga;

            $var_paketWisata = new Bookingpaket;
            $var_paketWisata->user_id                   = $member->id;
            $var_paketWisata->paket_wisata_id           = $paketWisata->id;
            $var_paketWisata->pengelolawisata_id        = $paketWisata->pengelola_wisata_id;
            $var_paketWisata->nama_paket_wisata         = $paketWisata->nama_paket_wisata;
            $var_paketWisata->jenis_paket_wisata        = $paketWisata->jenis_paket_wisata;
            $var_paketWisata->foto1                     = $paketWisata->foto1;
            $var_paketWisata->foto2                     = $paketWisata->foto2;
            $var_paketWisata->foto3                     = $paketWisata->foto3;
            $var_paketWisata->foto4                     = $paketWisata->foto4;
            $var_paketWisata->qty                       = $request->qty;
            $var_paketWisata->jml_org                   = $request->jml_org;
            $var_paketWisata->tgl_booking               = $request->tgl_booking;
            if ($paketWisata->harga_satuan_paket == 'Group') {
                $var_paketWisata->harga                 = $totalGroup;
            } else {
                $var_paketWisata->harga                 = $totalPersonal;
            }
            $var_paketWisata->tgl_mulai                 = $paketWisata->tgl_mulai;
            $var_paketWisata->tgl_akhir                 = $paketWisata->tgl_akhir;
            $var_paketWisata->location                  = $paketWisata->location;
            $var_paketWisata->deskripsi                 = $paketWisata->deskripsi;
            $var_paketWisata->status                    = 'Keranjang';
            $var_paketWisata->status_pengelolawisata    = 'Verifikasi';
            $var_paketWisata->save();
        }

        $cookie = cookie('dw-carts', json_encode($carts), 2880);
        return redirect()->back()->with(['success' => 'Paket Di tambahkan ke Kerangjang'])->cookie($cookie);
    }

    public function listkeranjangbeli(Request $request)
    {
        $cart = Bookingpaket::with('user', 'paketWisata')
            ->where('user_id', auth()->user()->id) // menampilkan data booking paket yang user yang login
            ->where($request->paketwisataid)
            ->where('status', 'Keranjang')
            ->get();

        $member = User::where('id', auth()->user()->id)->first();

        if ($cart == null) {
            toast('Kerangjang Pembelian Masih Kosong !!!', 'Info');
            return redirect()->route('welcome');
        }

        $totalHarga = Bookingpaket::with('user', 'paketWisata')
            ->where('user_id', auth()->user()->id) // menampilkan data booking paket yang user yang login
            ->where($request->paketwisataid)
            ->where('status', 'Keranjang')
            ->sum('harga');

        return view('Homepage.cart', compact('cart', 'member', 'totalHarga'));
    }

    public function hapuscart($key)
    {
        Bookingpaket::where('id', $key)->delete();
        return redirect()->back();
    }

    /* Transaction Start */
    public function Ordertuku(Request $request)
    {
        $member = User::where('id', auth()->user()->id)->first();
        $cart = Bookingpaket::where($request->booking_id)->where('status', 'Keranjang')->where('user_id', auth()->user()->id)->get();
        // dd($cart);

        // Buat nomor urut transaksi
        $nomorUrut = $this->getNomorUrut(date('Ymd'));

        //Masuk Transaksi 
        foreach ($cart as $data) {
            $transaksi = new Transaksi;
            $transaksi->user_id                 = $member->id;
            $transaksi->paket_wisata_id         = $data['paket_wisata_id'];
            $transaksi->pengelola_wisata_id     = $data['pengelolawisata_id'];
            $transaksi->total_orang             = $data['jml_org'];
            $transaksi->harga                   = $data['harga'];
            $transaksi->qty                     = $data['qty'];
            $transaksi->tgl_transaksi           = date('Y-m-d');
            $transaksi->tgl_booking             = $data['tgl_booking'];
            $transaksi->nomor_urut              = $nomorUrut;
            $transaksi->status_pembayaran       = 'Menunggu Pembayaran';
            $transaksi->status_lanjutan         = 'Proses';
            $transaksi->save();
        }

        foreach ($cart as $xa) {
            $xa->update([
                'status' => 'Checkout'
            ]);
        }

        // Delete all data in table booking when status "Checkout"
        $dataBooking = Bookingpaket::where('status', 'Checkout')->where('user_id', auth()->user()->id)->get();
        foreach ($dataBooking as  $ac) {
            Bookingpaket::where('id', $ac->id)->delete();
        }

        $totalharga = 0;
        foreach ($cart as $wikwik) {
            $totalharga += $wikwik['harga'] * $wikwik['qty'];
        }

        // Start Cookie For Payment
        $payment = json_decode(request()->cookie('payment'), true);
        foreach ($cart as $as) {
            $payment = [
                'order_code' => $nomorUrut,
                'total_bayar' => $request->total_bayar,
                'nama' => $member->name,
                'email' => $member->email,
                'no_hp' => $member->no_hp,
            ];
        }

        $cookie = cookie('payment', json_encode($payment), 2880);
        return redirect()->route('payment')->cookie($cookie);
    }

    // Method untuk mengambil nomor urut terakhir dan menambahkannya dengan 1
    private function getNomorUrut($date)
    {
        $lastCheckout = DB::table('transaksi')->latest('id')->first();

        if ($lastCheckout) {
            $lastNumber = (int) substr($lastCheckout->nomor_urut, -5);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return 'CHK' . $date . str_pad($newNumber, 5, '0', STR_PAD_LEFT);
    }

    // PAYMENT MIDTRANS
    public function payment()
    {
        $payment = json_decode(request()->cookie('payment'), true);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $payment['order_code'],
                'gross_amount' => $payment['total_bayar'],
            ),
            'customer_details' => array(
                'first_name' => $payment['nama'],
                'email' => $payment['email'],
                'phone' => $payment['no_hp'],
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $url = "https://app.sandbox.midtrans.com/snap/v2/vtweb/$snapToken";

        return redirect()->away($url);
    }
    /* Transaction End */

    // Rating
    public function ratting()
    {
        $payment = json_decode(request()->cookie('payment'), true);

        $dataTrans = Transaksi::with('customer', 'paketWisata', 'pengelola')
            ->where('user_id',  auth()->user()->id)
            ->where('nomor_urut', $payment['order_code'])
            ->get();

        return view('Homepage.ratting', compact('dataTrans'));
    }

    public function rattingStore(Request $request)
    {
        $dataTrans = Transaksi::with('customer', 'paketWisata', 'pengelola')
            ->where('user_id',  auth()->user()->id)
            ->where('nomor_urut', $request->order_code)
            ->latest()
            ->get();

        $ratings = $request->rating;
        $comments = $request->comment;
        foreach ($dataTrans as $index => $data) {
            $rating = $ratings[$index];
            $comment = $comments[$index];
            $ratingString = implode($rating);
            $commentString = implode($comment);

            $ratting = new Ratting;
            $ratting->user_id       = $data->user_id;
            $ratting->wisata_id     = $data->paket_wisata_id;
            $ratting->pengelola_id  = $data->pengelola_wisata_id;
            $ratting->rating        = $ratingString;
            $ratting->comment       = $commentString;
            $ratting->save();

            $paketwisata = Paketwisata::find($data->paket_wisata_id);
            $paketwisata->rating += $ratingString;
            $paketwisata->save();

            $pengelolawisata = Pengelolawisata::find($data->pengelola_wisata_id);
            $pengelolawisata->rating += $ratingString;
            $pengelolawisata->save();
        }

        return redirect()->route('invoice');
    }

    // Invoice
    public function invoice()
    {
        $payment = json_decode(request()->cookie('payment'), true);

        $data               = Transaksi::with('customer', 'paketWisata', 'pengelola')
            ->where('user_id',  auth()->user()->id)
            ->where('nomor_urut', $payment['order_code'])
            ->latest()
            ->get();

        $pengelolaWisata = collect();
        foreach ($data as $value) {
            $pengelola = Pengelolawisata::with('user')->where('id', $value->pengelola_wisata_id)->get();
            $pengelolaWisata = $pengelolaWisata->merge($pengelola);
        }

        $customer           = User::where('id', auth()->user()->id)->first();
        $invoice            = Transaksi::with('customer', 'paketWisata', 'pengelola')
            ->where('user_id',  auth()->user()->id)
            ->where('nomor_urut', $payment['order_code'])
            ->first();
        $user               = User::where('id', $customer->id)->first();

        $totalharga = 0;
        foreach ($data as $wikwik) {
            $totalharga += $wikwik['harga'] * $wikwik['qty'];
        }

        return view('Homepage.invoice', compact('data', 'pengelolaWisata', 'customer', 'invoice', 'totalharga', 'user'));
    }

    public function print_invoice()
    {
        $payment = json_decode(request()->cookie('payment'), true);

        $data               = Transaksi::with('customer', 'paketWisata', 'pengelola')
            ->where('user_id',  auth()->user()->id)
            ->where('nomor_urut', $payment['order_code'])
            ->latest()
            ->get();

        $pengelolaWisata = collect();
        foreach ($data as $value) {
            $pengelola = Pengelolawisata::with('user')->where('id', $value->pengelola_wisata_id)->get();
            $pengelolaWisata = $pengelolaWisata->merge($pengelola);
        }

        $customer           = Customer::where('user_id', auth()->user()->id)->first();
        $invoice            = Transaksi::with('customer', 'paketWisata', 'pengelola')
            ->where('user_id',  auth()->user()->id)
            ->where('nomor_urut', $payment['order_code'])
            ->first();
        $user               = User::where('id', $customer->user_id)->first();

        $totalharga = 0;
        foreach ($data as $wikwik) {
            $totalharga += $wikwik['harga'] * $wikwik['qty'];
        }

        // Convert Image to base64
        $base64Comp = collect();
        foreach ($pengelolaWisata as $foto) {
            $pathComp = public_path($foto->logo);
            $typeComp = pathinfo($pathComp, PATHINFO_EXTENSION);
            $imgComp = file_get_contents($pathComp);
            $logoComp = 'data:image/' . $typeComp . ';base64,' . base64_encode($imgComp);
            $base64Comp = $base64Comp->merge($logoComp);
        }

        $pathClient = public_path($customer->foto);
        $typeClient = pathinfo($pathClient, PATHINFO_EXTENSION);
        $imgClient = file_get_contents($pathClient);
        $base64Client = 'data:image/' . $typeClient . ';base64,' . base64_encode($imgClient);

        $pdf = PDF::loadView('export.invoicePrint', compact('data', 'pengelolaWisata', 'customer', 'invoice', 'totalharga', 'user', 'base64Client', 'base64Comp'))->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'landscape');
        // dd($pdf);

        return $pdf->download('invoice' . $invoice->nomor_urut . '.pdf');
    }
}
