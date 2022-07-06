<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use App\Models\semuaKelas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // index
    public function index()
    {
        $title = 'Home';
        return view('home.index', compact('title'));
    }

    public function magang()
    {
        $data = [
            'title' => 'Magang',
            'list_magang' => Magang::all(),
        ];
        return view('home.magang', $data);
    }

    public function semuaKelas()
    {
        $data = [
            'title' => 'Semua Kelas',
            'list_semua_kelas' => semuaKelas::all(),
        ];

        return view('home.semuaKelas', $data);
    }
}
