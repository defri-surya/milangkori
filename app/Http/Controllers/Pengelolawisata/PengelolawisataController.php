<?php

namespace App\Http\Controllers\Pengelolawisata;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pengelolawisata;
use App\User;

class PengelolawisataController extends Controller
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

    public function profile()
    {
        $data = Pengelolawisata::with('user')->where('user_id', auth()->user()->id)->first();
        // dd($data);
        $user = User::where('id', auth()->user()->id)->first();

        return view('Pengelolawisata.profilepengelola', compact('data', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = User::where('id', auth()->user()->id)->first();
        return view('Pengelolawisata.settingpengelola', compact('data'));
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
            'user_id'   => 'required',
            'logo'      => 'image|nullable|max:300',
        ]);

        $data = $request->all();
        if ($request->has('logo')) {
            $logo = $request->logo;
            $new_logo = time() . 'logopengelolawisata' . $logo->getClientOriginalName();
            $tujuan_uploud = 'upload/logopengelolawisata/';
            $logo->move($tujuan_uploud, $new_logo);
            $data['logo'] = $tujuan_uploud . $new_logo;
        }

        Pengelolawisata::create($data);
        return redirect()->route('profilepengelolawisata');
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
        $data = Pengelolawisata::where('user_id', auth()->user()->id)->findOrFail($id);

        return view('Pengelolawisata.edit', compact('data'));
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
            'user_id'    => 'required',
            'logo'      => 'image|nullable|max:300',
        ]);

        $data = Pengelolawisata::findOrFail($id);

        if ($request->hasFile('logo')) {
            //upload new image
            $image = $request->file('logo');
            $new_foto = time() . 'logopengelolawisata' . $image->getClientOriginalName();
            $tujuan_uploud = 'upload/logopengelolawisata/';
            $image->move($tujuan_uploud, $new_foto);

            //delete old image in local
            if (file_exists(($data->logo))) {
                unlink(($data->logo));
            }

            //Update With New Image 
            $data->update([
                'logo'                  => $tujuan_uploud . $new_foto,
                'user_id'               => $request->user_id,
                'nama_pengelola_wisata' => $request->nama_pengelola_wisata,
                'about'                 => $request->about,
                'alamat'                 => $request->alamat,
                'kontak'                 => $request->kontak,
                'no_rek'                 => $request->no_rek,
                'bank'                 => $request->bank,
            ]);
        } else {
            // update with new image 
            $data->update([
                'user_id'               => $request->user_id,
                'nama_pengelola_wisata' => $request->nama_pengelola_wisata,
                'about'                 => $request->about,
                'alamat'                 => $request->alamat,
                'kontak'                 => $request->kontak,
                'no_rek'                 => $request->no_rek,
                'bank'                 => $request->bank,
            ]);
        }

        return redirect()->route('profilepengelolawisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
