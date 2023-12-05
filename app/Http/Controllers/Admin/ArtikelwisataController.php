<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Artikelwisata;

use function PHPUnit\Framework\returnSelf;

class ArtikelwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Artikelwisata::all();
        $data = Artikelwisata::orderBy('created_at','DESC')->paginate(10);
        // dd($data);
        return view('Admin.Artikelwisata.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Artikelwisata.create');
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
            'judul'  => 'required',
            'foto'      => 'image|nullable|max:500',
            'judul'  => 'required',
        ]);

        $data = $request->all();
        if ($request->has('foto')) {
            $foto = $request->foto;
            $new_foto = time() . 'fotoartikelwisata' . $foto->getClientOriginalName();
            $tujuan_uploud = 'upload/fotoartikelwisata/';
            $foto->move($tujuan_uploud, $new_foto);
            $data['foto'] = $tujuan_uploud . $new_foto;
        }

        Artikelwisata::create($data);
        return redirect()->route('dataartikelwisata.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Artikelwisata::findOrFail($id);

        return view('Admin.Artikelwisata.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Artikelwisata::findOrFail($id);

        return view('Admin.Artikelwisata.edit', compact('data'));
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
            'judul'     => 'required',
            // 'foto'      => 'image|nullable|max:500',
            'deskripsi' => 'required',
        ]);

        $data = Artikelwisata::findOrFail($id);
        
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $new_foto = time() . 'fotoartikelwisata' . $image->getClientOriginalName();
                $tujuan_uploud = 'upload/fotoartikelwisata/';
                $image->move($tujuan_uploud, $new_foto);
               
                if (file_exists(($data->foto))) {
                    unlink(($data->foto));
                }

                $data->update([
                    'judul'     => $request->judul,
                    'foto'      => $tujuan_uploud . $new_foto,
                    'deskripsi' => $request->deskripsi,
                ]);
            } else {
                $data->update([
                    'judul'       => $request->judul,
                    'deskripsi'   => $request->deskripsi,
                ]);
            }

            return redirect()->route('dataartikelwisata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artikelwisata::where('id',$id)
        ->delete();

        return redirect()->back();
    }
}
