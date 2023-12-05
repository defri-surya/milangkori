<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Customer;
use App\Pengelolawisata;
use App\User;
use PDF;
use Illuminate\Http\Request;

class DataTransaksiCustomerController extends Controller
{
    public function index()
    {
        $custom = User::where('id', auth()->user()->id)->first();
        $waitingList = Transaksi::with('customer', 'paketWisata', 'user')->where('status_pembayaran', 'Menunggu Pembayaran')->where('user_id', $custom->id)->get();
        $selesai = Transaksi::with('customer', 'paketWisata', 'user')->where('status_pembayaran', 'Terbayar')->where('user_id', $custom->id)->get();
        // dd($waitingList, $selesai);

        return view('Customer.dataTransaksi.index', compact('waitingList', 'selesai'));
    }

    public function show($id)
    {
        $dataCustom         = Transaksi::with('paketWisata')->where('user_id',  auth()->user()->id)->find($id);
        $pengelolawisata    = Pengelolawisata::where('id', $dataCustom->paketWisata->pengelola_wisata_id)->first();
        $customer           = Customer::where('user_id', auth()->user()->id)->first();
        $paket              = $dataCustom->paketWisata;
        $user               = User::where('id', $pengelolawisata->user_id)->first();

        $totalharga = 0;
        $totalharga += $dataCustom['harga'] * $dataCustom['qty'];
        // dd($dataCustom, $pengelolawisata, $customer, $paket, $totalharga);

        return view('Customer.dataTransaksi.show', compact('dataCustom', 'pengelolawisata', 'customer', 'paket', 'totalharga', 'user'));
    }

    public function printInvoiceCustomer($id)
    {
        $dataCustom         = Transaksi::with('paketWisata')->where('user_id',  auth()->user()->id)->find($id);
        $pengelolawisata    = Pengelolawisata::where('id', $dataCustom->paketWisata->pengelola_wisata_id)->first();
        $customer           = Customer::where('user_id', auth()->user()->id)->first();
        $paket              = $dataCustom->paketWisata;
        $user               = User::where('id', $pengelolawisata->user_id)->first();

        $totalharga = 0;
        $totalharga += $dataCustom['harga'] * $dataCustom['qty'];
        // dd($dataCustom, $pengelolawisata, $customer, $paket, $totalharga);

        $pdf = PDF::loadView('export.invoicePrintCustomer', compact('dataCustom', 'pengelolawisata', 'customer', 'paket', 'totalharga', 'user'))->setOptions(['defaultFont' => 'sans-serif']);
        // dd($pdf);

        return $pdf->download('invoice' . $dataCustom->nomor_urut . '.pdf');
    }
}
