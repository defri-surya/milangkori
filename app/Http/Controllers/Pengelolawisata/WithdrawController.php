<?php

namespace App\Http\Controllers\Pengelolawisata;

use App\Http\Controllers\Controller;
use App\withdraw;
use App\Pengelolawisata;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
        $pengelola = Pengelolawisata::where('user_id', auth()->user()->id)->first();
        $data = withdraw::where('pengelolawisata_id', $pengelola->id)
            ->get();

        return view('Pengelolawisata.withdraw.index', compact('data', 'pengelola'));
    }

    public function create()
    {
        $pengelola = Pengelolawisata::where('user_id', auth()->user()->id)->first();
        return view('Pengelolawisata.withdraw.create', compact('pengelola'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['kode'] = 'WD-' . rand();
        $data['tgl_request'] = date('Y-m-d');
        $data['status'] = 'Proses';

        withdraw::create($data);
        return redirect('withdraw');
    }

    public function update($id)
    {
        $wd = withdraw::where('kode', $id)->first();
        $wd->update([
            'status' => 'Dibatalkan'
        ]);

        return back();
    }
}
