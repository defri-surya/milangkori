<?php

namespace App\Http\Controllers\Pengelolawisata;

use App\Http\Controllers\Controller;
use App\Itenerary;
use Illuminate\Http\Request;
use App\Pengelolawisata;
use App\Kategoripaketwisata;
use App\Paketwisata;
use App\Models\Regency;
use App\Models\District;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class BuatpaketwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoripaketwisata = Kategoripaketwisata::all();
        $pengelolawisata     = Pengelolawisata::where('user_id', auth()->user()->id)->first();
        $kota                = Regency::all();

        if ($pengelolawisata->status == 'Belum Verifikasi') {
            alert()->info('Akun anda belum TERVERIFIKASI', 'Mohon menunggu 1x24 jam untuk proses verifikasi');
            return redirect()->route('home');
        } else {
            return view('Pengelolawisata.buatpaketwisata', compact('kota', 'kategoripaketwisata', 'pengelolawisata'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'foto1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:500',
            'foto2' => 'image|mimes:jpg,png,jpeg,gif,svg|max:500',
            'foto3' => 'image|mimes:jpg,png,jpeg,gif,svg|max:500',
            'foto4' => 'image|mimes:jpg,png,jpeg,gif,svg|max:500',
        ]);

        $data = $request->all();
        $data['rating'] = 0;

        $baseSlug = Str::slug($data['nama_paket_wisata'], '-');
        $data['slug'] = $baseSlug;

        $count = Paketwisata::where('slug', $baseSlug)->count();
        if ($count > 0) {
            $i = 1;
            while (Paketwisata::where('slug', $data['slug'])->count() > 0) {
                $data['slug'] = $baseSlug . '-' . $i;
                $i++;
            }
        }

        // Save Itenenary
        $waktu = ['waktu' => $data['waktu']];
        $kegiatan = ['kegiatan' => $data['kegiatan']];

        if ($request->has('foto1')) {
            $foto1 = $request->foto1;
            $new_foto = time() . 'fotobuatpaket' . $foto1->getClientOriginalName();
            $tujuan_uploud = 'upload/fotobuatpaket/';
            $foto1->move($tujuan_uploud, $new_foto);
            $data['foto1'] = $tujuan_uploud . $new_foto;
        }

        if ($request->has('foto2')) {
            $foto2 = $request->foto2;
            $new_foto2 = time() . 'fotobuatpaket' . $foto2->getClientOriginalName();
            $tujuan_uploud = 'upload/fotobuatpaket/';
            $foto2->move($tujuan_uploud, $new_foto2);
            $data['foto2'] = $tujuan_uploud . $new_foto2;
        }

        if ($request->has('foto3')) {
            $foto3 = $request->foto3;
            $new_foto3 = time() . 'fotobuatpaket' . $foto3->getClientOriginalName();
            $tujuan_uploud = 'upload/fotobuatpaket/';
            $foto3->move($tujuan_uploud, $new_foto3);
            $data['foto3'] = $tujuan_uploud . $new_foto3;
        }

        if ($request->has('foto4')) {
            $foto4 = $request->foto4;
            $new_foto4 = time() . 'fotobuatpaket' . $foto4->getClientOriginalName();
            $tujuan_uploud = 'upload/fotobuatpaket/';
            $foto4->move($tujuan_uploud, $new_foto4);
            $data['foto4'] = $tujuan_uploud . $new_foto4;
        }

        $paket = Paketwisata::create($data);

        $itenenary =  new Itenerary;
        $itenenary->paket_id = $paket['id'];
        $itenenary->pengelola_id = $data['pengelola_wisata_id'];
        $itenenary->waktu = json_encode($waktu, true);
        $itenenary->kegiatan = json_encode($kegiatan, true);
        $itenenary->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data                = Paketwisata::findOrFail($id);
        $kategoripaketwisata = Kategoripaketwisata::all();
        $pengelolawisata     = Pengelolawisata::where('user_id', auth()->user()->id)->first();
        $kota                = Regency::all();
        $dist                = District::all();
        $itenerary           = Itenerary::where('paket_id', $data->id)->first();
        $json = json_decode($itenerary, true);
        $arrayWaktu = json_decode($json['waktu'], true)['waktu'];
        $arrayKegiatan = json_decode($json['kegiatan'], true)['kegiatan'];
        // dd($kategoripaketwisata, $pengelolawisata, $kota, $data, $itenerary);

        return view('Pengelolawisata.editpaketwisata', compact('data', 'kategoripaketwisata', 'pengelolawisata', 'kota', 'itenerary', 'arrayWaktu', 'arrayKegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'foto1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:500',
            'foto2' => 'image|mimes:jpg,png,jpeg,gif,svg|max:500',
            'foto3' => 'image|mimes:jpg,png,jpeg,gif,svg|max:500',
            'foto4' => 'image|mimes:jpg,png,jpeg,gif,svg|max:500',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($data['nama_paket_wisata'], '-');

        if ($request->has('foto1')) {
            $foto1 = $request->foto1;
            $new_foto = time() . 'fotobuatpaket' . $foto1->getClientOriginalName();
            $tujuan_uploud = 'upload/fotobuatpaket/';
            $foto1->move($tujuan_uploud, $new_foto);
            $data['foto1'] = $tujuan_uploud . $new_foto;
        }

        if ($request->has('foto2')) {
            $foto2 = $request->foto2;
            $new_foto2 = time() . 'fotobuatpaket' . $foto2->getClientOriginalName();
            $tujuan_uploud = 'upload/fotobuatpaket/';
            $foto2->move($tujuan_uploud, $new_foto2);
            $data['foto2'] = $tujuan_uploud . $new_foto2;
        }

        if ($request->has('foto3')) {
            $foto3 = $request->foto3;
            $new_foto3 = time() . 'fotobuatpaket' . $foto3->getClientOriginalName();
            $tujuan_uploud = 'upload/fotobuatpaket/';
            $foto3->move($tujuan_uploud, $new_foto3);
            $data['foto3'] = $tujuan_uploud . $new_foto3;
        }

        if ($request->has('foto4')) {
            $foto4 = $request->foto4;
            $new_foto4 = time() . 'fotobuatpaket' . $foto4->getClientOriginalName();
            $tujuan_uploud = 'upload/fotobuatpaket/';
            $foto4->move($tujuan_uploud, $new_foto4);
            $data['foto4'] = $tujuan_uploud . $new_foto4;
        }

        $datapaket   = Paketwisata::findOrFail($id);
        $datapaket->update($data);

        $id = $id;
        $waktu = $request->input('waktu');
        $kegiatan = $request->input('kegiatan');

        $updated = DB::table('iteneraries')
            ->where('paket_id', $id)
            ->update([
                'waktu' => json_encode(['waktu' => $waktu]),
                'kegiatan' => json_encode(['kegiatan' => $kegiatan])
            ]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paketwisata::findOrFail($id)->delete();
        return redirect()->back();
    }
}
