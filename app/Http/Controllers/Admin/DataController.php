<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Customer;
use App\Kategoripaketwisata;
use App\Pengelolawisata;

class DataController extends Controller
{
    // public function karyawan()
    // {
    //     $karyawans = Karyawan::orderBy('nama', 'ASC');
    //     return datatables()->of($karyawans)
    //         ->editColumn(
    //             'cover',
    //             function (Karyawan $model) {
    //                 return '<img src="' . $model->getCover() . '" height="100px">'; // untuk merubah cover menjadi format img
    //             }
    //         )
    //         ->addColumn('action', 'admin.karyawan.action')
    //         ->addIndexColumn() // membuat no urut
    //         ->rawColumns(['cover', 'action'])
    //         ->toJson();
    // }

    public function kategoripaket()
    {
        $kategoripaketwisata = Kategoripaketwisata::orderBy('nama_paket','ASC');
        return datatables()->of($kategoripaketwisata)
        ->editColumn(
            'foto', 
            function(Kategoripaketwisata $model) {
                return '<img src="' . $model->getCover() . '" height="100px">'; // untuk merubah cover menjadi format img
            }
        )
        ->addColumn('action','Admin.Kategoripaketwisata.action')
        ->addIndexColumn() // membuat no urut
        ->rawColumns(['foto','action'])
        ->toJson();
    }
}
