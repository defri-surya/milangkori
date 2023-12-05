<?php

namespace App\Http\Controllers;

use App\Artikelwisata;
use App\Models\Regency;
use App\Customer;
use App\Kategoripaketwisata;
use App\Transaksi;
use App\Bookingpaket;
use App\Itenerary;
use Illuminate\Support\Carbon;
use GuzzleHttp\Client;
use App\Paketwisata;
use App\Pengelolawisata;
use App\Ratting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function index()
    {
        $client = new Client;
        $response = $client->request('GET', 'https://assesmen.mitrakampusjogja.com/api/testing', [
            'headers' => [
                'api_key' => 'nuswantara2022'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return view('getassesmen', compact('result'));
    }

    public function register_pengelolawisata()
    {
        return view('Homepage.register_pengelolawisata');
    }

    public function register_customer(Request $request)
    {
        return view('Homepage.register_customer');
    }

    public function landingPage()
    {
        return view('landingPage.index');
    }

    public function profileGuide($slug)
    {
        $data = Pengelolawisata::where('nama_pengelola_wisata', $slug)->first();
        $paket = PaketWisata::where('pengelola_wisata_id', $data->id)->get();

        return view('Homepage.ProfileGuide.index', compact('data', 'paket'));
    }

    public function homepage(Request $request)
    {
        //create a language session, by default it uses indonesian
        session()->put('language', Request('language') ?? 'id');

        $paketwisata     = Paketwisata::with('pengelolawisata')
            ->where('status_pengelolawisata', 'Verifikasi')
            ->limit(8)
            ->orderBy('rating', 'DESC')
            ->get();
        // $pengelolawisata = Paketwisata::with('pengelolawisata')->limit(8)->get();

        $kota                  = Regency::all();
        $katagoripaketwisata   = Kategoripaketwisata::all();
        // dd($kota, $katagoripaketwisata, $paketwisata, $pengelolawisata );

        // Auto FAIL PAYMENT ketika status_pembayaran masih "Menunggu Pembayaran" lebih dari 1 hari
        $currentDate = Carbon::now();
        $data = Transaksi::where('status_pembayaran', 'Menunggu Pembayaran')->get();
        $dataBooking = Bookingpaket::where('status', 'Keranjang')->get();

        // Auto ubah status_pembayaran menjadi GAGAL jika lebih dari 2 hari Customer tidak melakukan konfirmasi pembayaran
        foreach ($data as $item) {
            $createdAt = Carbon::parse($item->created_at);
            $diff = $currentDate->diffInDays($createdAt);
            if ($diff > 2) {
                Transaksi::where('id', $item->id)->update([
                    'status_pembayaran' => 'Gagal'
                ]);
            }
        }

        // Auto Delete jika produk dikeranjang lebih dari 1 hari / 24 jam
        // foreach ($dataBooking as $val) {
        //     $createdAt = Carbon::parse($val->created_at);
        //     $diff = $currentDate->diffInDays($createdAt);
        //     if ($diff > 1) {
        //         Bookingpaket::where('id', $val->id)->delete();
        //     }
        // }

        return view('Homepage.index', compact('kota', 'katagoripaketwisata', 'paketwisata'));
    }

    public function halamanpaket()
    {
        $katagoripaketwisata = Kategoripaketwisata::all();
        $kota                = Regency::all();
        $paketwisata         = Paketwisata::with('pengelolawisata')->orderBy('rating', 'DESC')->paginate(12);

        return view('Homepage.halamanpaket', compact('katagoripaketwisata', 'paketwisata'));
    }

    public function detailpaketwisata($id)
    {
        $data = Paketwisata::with('pengelolawisata')->where('slug', $id)->first();

        // Rating Function
        $rating = Ratting::with('customer')->where('wisata_id', $data->id)->get();
        $ulasan = $rating->count();
        if ($ulasan == 0) {
            $meanRating = 0;
        } else {
            $meanRating = $rating->sum('rating') / $ulasan;
        }
        // End Rating Function

        $itenerary = Itenerary::where('paket_id', $data->id)->first();
        $json = json_decode($itenerary, true);

        $waktu = json_decode($json['waktu'], true);
        $kegiatan = json_decode($json['kegiatan'], true);

        $arrayWaktu = $waktu['waktu'];
        $arrayKegiatan = $kegiatan['kegiatan'];

        // Youtube Video
        $video_url = $data->tumb_yt;
        $unique_param = Str::random(10);
        $video_id = substr(parse_url($video_url, PHP_URL_QUERY), 2);
        $new_url = 'https://www.youtube.com/embed/' . $video_id . '?si=' . $unique_param;

        return view('Homepage.detailpaketwisata', compact('data', 'arrayWaktu', 'arrayKegiatan', 'rating', 'ulasan', 'meanRating', 'new_url'));
    }

    public function bookingpaket($id)
    {
        $data                = Paketwisata::findOrFail($id);
        $kategoripaketwisata = Kategoripaketwisata::all();
        $kota                = Regency::all();
        $customer            = Customer::where('user_id', auth()->user()->id)->get();

        return view('Homepage.cart', compact('data', 'kategoripaketwisata', 'kota', 'customer'));
    }

    public function kerjasama()
    {
        return view('Homepage.Footer.kerjasama');
    }

    public function artikelwisata()
    {
        $data = Artikelwisata::orderBy('created_at', 'DESC')->paginate(8);
        // dd($data);

        return view('Homepage.Footer.artikelwisata', compact('data'));
    }

    public function detailartikelwisata($id)
    {
        $data = Artikelwisata::findOrFail($id);
        // dd($data);

        return view('Homepage.Footer.detailartikelwisata', compact('data'));
    }

    public function tentangkami()
    {
        return view('Homepage.Footer.tentangkami');
    }
}
