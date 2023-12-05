<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Paketwisata;
use App\Bookingpaket;
use App\Pengelolawisata;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'customer') {
            $customer = Customer::where('user_id', auth()->user()->id)->get();
            $custom = Customer::where('user_id', auth()->user()->id)->first();
            if ($custom != null) {
                $data     = Paketwisata::all();
                $cart = Bookingpaket::with('user', 'paketWisata')
                    ->where('user_id', auth()->user()->id)
                    ->where('status', 'Keranjang')
                    ->get();
                $count = $cart->count();
                $waitingList = Transaksi::with('customer', 'paketWisata')->where('status_pembayaran', 'Menunggu Pembayaran')->where('user_id', $custom->user_id)->get();
                $selesai = Transaksi::with('customer', 'paketWisata')->where('status_pembayaran', 'Terbayar')->where('user_id', $custom->user_id)->get();
                return view('Customer.home', compact('customer', 'data', 'cart', 'count', 'waitingList', 'selesai', 'custom'));
            } else {
                $custom = User::where('id', auth()->user()->id)->first();
                $data     = Paketwisata::all();
                $cart = Bookingpaket::with('user', 'paketWisata')
                    ->where('user_id', auth()->user()->id)
                    ->where('status', 'Keranjang')
                    ->get();
                $count = $cart->count();
                $waitingList = Transaksi::with('customer', 'paketWisata')->where('status_pembayaran', 'Menunggu Pembayaran')->where('user_id', $custom->id)->get();
                $selesai = Transaksi::with('customer', 'paketWisata')->where('status_pembayaran', 'Terbayar')->where('user_id', $custom->id)->get();
                return view('Customer.home', compact('customer', 'data', 'cart', 'count', 'custom', 'waitingList', 'selesai'));
            }
        } elseif (auth()->user()->role == 'admin') {
            return view('Admin.index');
        } elseif (auth()->user()->role == 'pengelolawisata') {
            $paketwisata = Paketwisata::where('user_id', auth()->user()->id)->get();
            $pengelola = Pengelolawisata::where('user_id', auth()->user()->id)->first();
            return view('Pengelolawisata.home', compact('paketwisata', 'pengelola'));
        }
    }
}
