<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Customer;
use App\Pengelolawisata;
use App\User;
use PDF;
use Illuminate\Http\Request;

class DatatransaksiController extends Controller
{
    public function index()
    {
          $data = Transaksi::orderBy('created_at','DESC')->paginate(10);
        // $data = Transaksi::all();

        return view('Admin.Transaksi.index', compact('data'));
    }

    public function show($id)
    {
        $dataCustom         = Transaksi::with('paketWisata')->find($id);
        $pengelolawisata    = Pengelolawisata::where('id', $dataCustom->paketWisata->pengelola_wisata_id)->first();
        $customer           = Customer::where('user_id', $dataCustom->user_id)->first();
        $paket              = $dataCustom->paketWisata;
        $user               = User::where('id', $pengelolawisata->user_id)->first();

        $totalharga = 0;
        $totalharga += $dataCustom['harga'] * $dataCustom['qty'];
        // dd($dataCustom, $pengelolawisata, $customer, $paket, $totalharga);

        return view('Admin.Transaksi.show', compact('dataCustom', 'pengelolawisata', 'customer', 'paket', 'totalharga', 'user'));
    }

    public function printInvoice($id)
    {
        $dataCustom         = Transaksi::with('paketWisata')->find($id);
        $pengelolawisata    = Pengelolawisata::where('id', $dataCustom->paketWisata->pengelola_wisata_id)->first();
        $customer           = Customer::where('user_id', $dataCustom->user_id)->first();
        $paket              = $dataCustom->paketWisata;
        $user               = User::where('id', $pengelolawisata->user_id)->first();

        $totalharga = 0;
        $totalharga += $dataCustom['harga'] * $dataCustom['qty'];
        // dd($dataCustom, $pengelolawisata, $customer, $paket, $totalharga);

        $pdf = PDF::loadView('export.invoicePrintAdmin', compact('dataCustom', 'pengelolawisata', 'customer', 'paket', 'totalharga', 'user'))->setOptions(['defaultFont' => 'sans-serif']);
        // dd($pdf);

        return $pdf->download('invoice' . $dataCustom->nomor_urut . '.pdf');
    }
    
    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();
      
        return redirect()->back();
    }
}
