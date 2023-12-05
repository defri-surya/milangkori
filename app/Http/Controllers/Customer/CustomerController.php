<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Paketwisata;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $datacv = Customer::with('user')->where('user_id', auth()->user()->id)->first();

        return view('Customer.cv_dup', compact('user', 'datacv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Customer.settingcustomer');
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
            'foto'      => 'image|nullable|max:300',
        ]);
        
        $data = $request->all();
        
        if ($request->has('foto')) {
            $foto = $request->foto;
            $new_foto = time() . 'fotocustomer' . $foto->getClientOriginalName();
            $tujuan_uploud = 'upload/fotocustomer/';
            $foto->move($tujuan_uploud, $new_foto);
            $data['foto'] = $tujuan_uploud . $new_foto;
        }

        Customer::create($data);
        return redirect()->route('infocv');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data       = Paketwisata::findOrFail($id);
        
        return view('Customer.detail_paket', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datacv = Customer::where('user_id', auth()->user()->id)->findOrFail($id);
        
        return view('Customer.edit', compact('datacv'));
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
            'user_id'  => 'required',
            'foto'     => 'image|nullable|max:300',
        ]);

        $data = Customer::findOrFail($id);

        if ($request->hasFile('foto')) {
            //upload new image
            $image = $request->file('foto');
            $new_foto = time() . 'fotocustomer' . $image->getClientOriginalName();
            $tujuan_uploud = 'upload/fotocustomer/';
            $image->move($tujuan_uploud, $new_foto);

            //delete old image in local
            if (file_exists(($data->foto))) {
                unlink(($data->foto));
            }

            //Update With New Image 
            $data->update([
                'user_id'      => $request->user_id,
                'foto'         => $tujuan_uploud . $new_foto,
                'nama_lengkap' => $request->nama_lengkap,
                'email'        => $request->email,
                'no_hp'        => $request->no_hp,
                'alamat'       => $request->alamat,
            ]);
    } else {
        // update with new image 
        $data->update([
            'user_id'      => $request->user_id,
            'nama_lengkap' => $request->nama_lengkap,
            'email'        => $request->email,
            'no_hp'        => $request->no_hp,
            'alamat'       => $request->alamat,
        ]);
    }
    return redirect()->route('infocv');

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
