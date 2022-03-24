<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardControllel extends Controller
{
    public function index()
    {
        $namaSiswa = 'Hafiz';
        return view('dashboard.index', [
            'nama' => $namaSiswa
        ]);
    }
}
