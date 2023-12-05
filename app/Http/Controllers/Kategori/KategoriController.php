<?php

namespace App\Http\Controllers\Kategori;

use App\Http\Controllers\Controller;
use App\Kategoripaketwisata;
use App\Paketwisata;
use App\Pengelolawisata;
use App\User;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function viewKategori(Request $request)
    {
        $dayTrip = $request->day_trip;
        $menginap = $request->menginap;
        $group = $request->group;
        $personal = $request->personal;
        $guide = $request->guide;

        if ($dayTrip) {
            $paketDayTrip = Paketwisata::where('jenis_paket_wisata', $dayTrip)->orderBy('rating', 'DESC')->get();
            $katagoripaketwisata   = Kategoripaketwisata::all();

            return view('Homepage.Kategori.dayTrip', compact('paketDayTrip', 'katagoripaketwisata'));
        } elseif ($menginap) {
            $paketMenginap = Paketwisata::where('jenis_paket_wisata', $menginap)->orderBy('rating', 'DESC')->get();
            $katagoripaketwisata   = Kategoripaketwisata::all();

            return view('Homepage.Kategori.menginap', compact('paketMenginap', 'katagoripaketwisata'));
        } elseif ($group) {
            $paketGroup = Paketwisata::where('harga_satuan_paket', $group)->orderBy('rating', 'DESC')->get();
            $katagoripaketwisata   = Kategoripaketwisata::all();

            return view('Homepage.Kategori.group', compact('paketGroup', 'katagoripaketwisata'));
        } elseif ($personal) {
            $paketPersonal = Paketwisata::where('harga_satuan_paket', $personal)->orderBy('rating', 'DESC')->get();
            $katagoripaketwisata   = Kategoripaketwisata::all();

            return view('Homepage.Kategori.personal', compact('paketPersonal', 'katagoripaketwisata'));
        } elseif ($guide) {
            $katagoripaketwisata   = Kategoripaketwisata::all();
            $pengelola = Pengelolawisata::orderBy('rating', 'DESC')->get();

            return view('Homepage.Kategori.guide', compact('pengelola', 'katagoripaketwisata'));
        }
    }

    public function kategoriSlug($slug)
    {
        $kategori = Kategoripaketwisata::where('nama_paket', $slug)->first();
        $data = Paketwisata::where('kategori_paket_wisata_id', $kategori->id)->orderBy('rating', 'DESC')->get();
        $katagoripaketwisata   = Kategoripaketwisata::all();
        // dd($slug);

        return view('Homepage.Kategori.index', compact('data', 'katagoripaketwisata', 'slug'));
    }
}
