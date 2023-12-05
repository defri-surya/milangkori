<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kategoripaketwisata;
use Illuminate\Http\Request;

class KategoripaketwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategoripaketwisata::all();

        return view('Admin.Kategoripaketwisata.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Kategoripaketwisata.create');
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
            'nama_paket'  => 'required',
            'foto'      => 'image|nullable|max:500',
        ]);

        $data = $request->all();

        if ($request->has('foto')) {
            $foto = $request->foto;
            $new_foto = time() . 'fotokategoripaketwisata' . $foto->getClientOriginalName();
            $tujuan_uploud = 'upload/fotokategoripaketwisata/';
            $foto->move($tujuan_uploud, $new_foto);
            $data['foto'] = $tujuan_uploud . $new_foto;
        }

        Kategoripaketwisata::create($data);
        return redirect()->route('kategoripaketwisata.index');
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
        $data = Kategoripaketwisata::findOrFail($id);

        return view('Admin.Kategoripaketwisata.edit', compact('data'));
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
            'nama_paket' => 'required',
            'foto'       => 'image|nullable|max:500',
        ]);

        // $data = $request->all();

        // $kategoripaketwisata = Kategoripaketwisata::findOrfail($id);
        $data = Kategoripaketwisata::findOrfail($id);
        // $kategoripaketwisata->update($data);

        if ($request->hasFile('foto')) {
            //upload new image
            $image = $request->file('foto');
            $new_foto = time() . 'fotokategoripaketwisata' . $image->getClientOriginalName();
            $tujuan_uploud = 'upload/fotokategoripaketwisata/';
            $image->move($tujuan_uploud, $new_foto);

            //delete old image in local
            if (file_exists(($data->foto))) {
                unlink(($data->foto));
            }

            //Update With New Image 
            $data->update([
                'foto'                  => $tujuan_uploud . $new_foto,
                'nama_paket'               => $request->nama_paket,
            ]);
        } else {
            // update with new image 
            $data->update([
                'nama_paket'               => $request->nama_paket,
            ]);
        }

        return redirect()->route('kategoripaketwisata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategoripaketwisata::where('id', $id)->delete();

        return redirect()->back();
    }
}
