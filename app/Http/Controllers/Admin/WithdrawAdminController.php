<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\withdraw;
use Illuminate\Http\Request;

class WithdrawAdminController extends Controller
{
    public function index()
    {
        $data = withdraw::get();

        return view('Admin.Withdraw.index', compact('data'));
    }

    public function update($id)
    {
        $wd = withdraw::where('kode', $id)->first();
        $wd->update([
            'status' => 'Selesai',
            'tgl_konfirm' => date('Y-m-d')
        ]);

        return back();
    }
}
