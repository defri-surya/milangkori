<?php

use App\Loker;
use App\Pencaker;
use App\Perusahaan;
use App\User;


function totalLoker()
{
    return Loker::where('status_company', 'Verifikasi')->count();
}

function totalPencaker()
{
    return Pencaker::count();
}

function totalPerusahaan()
{
    return Perusahaan::where('status', 'Verifikasi')->count();
}

function totalUser()
{
    return User::count();
}
