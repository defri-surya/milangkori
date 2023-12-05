<?php

namespace App\Http\Controllers\Pengelolawisata;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Pengelolawisata;
use App\Transaksi;
use Illuminate\Http\Request;

class DataTransaksiController extends Controller
{
    public function index()
    {
        $pengelola = Pengelolawisata::where('user_id', auth()->user()->id)->first();
        if ($pengelola == null) {
            return view('Pengelolawisata.dataTransaksi.index', compact('pengelola'));
        } else {
            $waitingList = Transaksi::with('customer', 'paketWisata')->where('status_lanjutan', 'Proses')->where('pengelola_wisata_id', $pengelola->id)->get();
            $selesai = Transaksi::with('customer', 'paketWisata')->where('status_lanjutan', 'Selesai')->where('pengelola_wisata_id', $pengelola->id)->get();
            return view('Pengelolawisata.dataTransaksi.index', compact('waitingList', 'selesai', 'pengelola'));
        }
    }
    
     public function show($id)
    {
        $data = Transaksi::with('customer', 'paketWisata')->where('nomor_urut', $id)->first();
        // dd($data);
        $custom = Customer::where('user_id', $data->user_id)->first();
        $paket = $data->paketWisata;
        // dd($paket);

        return view('Pengelolawisata.dataTransaksi.show', compact('data', 'custom', 'paket'));
    }

    // public function show($id)
    // {
    //     $data = Transaksi::with('customer', 'paketWisata')->find($id);
    //     // dd($data);
    //     $custom = Customer::where('user_id', $data->user_id)->first();
    //     $paket = $data->paketWisata;
    //     // dd($paket);

    //     return view('Pengelolawisata.dataTransaksi.show', compact('data', 'custom', 'paket'));
    // }

    public function print($id)
    {
        $data = Transaksi::with('customer', 'paketWisata')->where('id', $id)->first();
        $custom = $data->customer;
        $paket = $data->paketWisata;
        $pengelola = Pengelolawisata::where('user_id', auth()->user()->id)->first();
        // dd($paket);

        return view('Pengelolawisata.dataTransaksi.printTransaksi', compact('data', 'custom', 'paket', 'pengelola'));
    }

    public function konfirmbayar(Request $request, $id)
    {
        $data = Transaksi::with('customer', 'paketWisata')->where('id', $id)->first();

        $data->update([
            'status_pembayaran' => $request->status_pembayaran
        ]);

        alert()->success('Success', 'Pembayaran Berhasil Dikonfirmasi.');
        return redirect()->back();
    }

    public function finish(Request $request, $id)
    {
        $data = Transaksi::with('customer', 'paketWisata')->where('id', $id)->first();

        $data->update([
            'status_lanjutan' => $request->status_lanjutan
        ]);

        alert()->success('Success', 'Berhasil Menyelesaikan Transaksi.');
        return redirect()->back();
    }
}
