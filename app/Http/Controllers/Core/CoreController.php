<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Magang;
use App\Models\semuaKelas;
use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Http\Request;

class CoreController extends Controller
{
    // index
    public function index()
    {
        $title = 'Dashboard';
        return view('core.dashboard', compact('title'));
    }


    // semuaKelas
    public function semuaKelas()
    {
        $ms_semuaKelas = [
            'title' => 'Semua Kelas',
            'list_semua_kelas' => semuaKelas::all(),
        ];
        return view('core.semuaKelas', $ms_semuaKelas);
    }

    // kelasLangganan
    public function kelasLangganan()
    {
        $ms_kelasLangganan = [
            'title' => 'Kelas Langganan',
        ];
        return view('core.kelasLangganan', $ms_kelasLangganan);
    }


    // kompetisi
    public function kompetisi()
    {
        $ms_kompetisi = [
            'title' => 'Kompetisi',
        ];
        return view('core.kompetisi', $ms_kompetisi);
    }

    // magang
    public function magang()
    {
        $ms_magang = [
            'title' => 'Program Magang',
            'list_magang' => Magang::all()
        ];
        return view('core.magang', $ms_magang);
    }


    // rankings
    public function rankings()
    {
        $ms_rankings = [
            'title' => 'Rankings',
        ];

        return view('core.rankings', $ms_rankings);
    }

    // sertifikat
    public function sertifikat()
    {
        $ms_sertifikat = [
            'title' => 'Sertifikat',
            'sertifikat' => Sertifikat::all(),
        ];

        return view('core.sertifikat', $ms_sertifikat);
    }

    public function sertifikat_download()
    {
        return view('download.certificate');
    }

    // profil
    public function profil()
    {
        $title = 'Profilku';
        return view('core.profil', compact('title'));
    }
}
