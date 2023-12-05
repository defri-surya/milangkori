<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Paketwisata;
use App\Pengelolawisata;
use Illuminate\Http\Request;

class DatapengelolawisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengelolawisata::all();
        // dd($data);

        return view('Admin.Pengelolawisata.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Pengelolawisata::with('user')->find($id);

        return view('Admin.Pengelolawisata.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function verifikasi(Request $request, $id)
    {
        $data   = Pengelolawisata::find($id);
        $status = $request->status_pengelolawisata; 

        $data->update([
                'status'  => 'Verifikasi'
            ]);

            foreach($status as $key => $value) {
                Paketwisata::where('pengelola_wisata_id', $id)
                ->update(['status_pengelolawisata' => $value]);
            }

        return redirect()->route('datapengelolawisata.index');
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
