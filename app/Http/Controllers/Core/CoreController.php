<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Magang;
use App\Models\semuaKelas;
use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoreController extends Controller
{
    // index
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'list_kelas' => semuaKelas::all(),
            'total_user' => User::count(),
            'users' => User::orderBy('role', 'ASC')->get(),
            'trainer' => User::where('role', '=', 'trainer')->count(),
            'student' => User::where('role', '=', 'student')->count(),
            'bloger' => User::where('role', '=', 'bloger')->count(),
        ];
        return view('core.dashboard', $data);
    }

    public function del_user($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/dashboard#users')->with('danger', 'Warning!⚠️ Satu akun baru saja berhasil di hapus secara permanen!');
    }

    public function nonaktif_user($id)
    {
        $user = User::find($id);
        $user->status = 'nonaktif';

        $user->save();
        return redirect('/dashboard#users')->with('warning', 'Warning!⚠️ Satu akun baru saja berhasil di nonaktifkan untuk sementara waktu!');
    }

    public function aktif_user($id)
    {
        $user = User::find($id);
        $user->status = 'aktif';

        $user->save();
        return redirect('/dashboard#users')->with('success', 'Warning!⚠️ Satu akun baru saja berhasil di aktifkan kembali!');
    }

    // semuaKelas
    public function semuaKelas()
    {
        if (auth()->user()->role == 'student') {
            $ms_semuaKelas = [
                'title' => 'Semua Kelas',
                'list_semua_kelas' => semuaKelas::all(),
            ];
        }

        if (auth()->user()->role == 'admin') {
            $ms_semuaKelas = [
                'title' => 'Management Kelas',
                'list_semua_kelas' => semuaKelas::all(),
            ];
        }
        return view('core.semuaKelas', $ms_semuaKelas);
    }

    // kelasLangganan
    public function kelasKamu()
    {
        $ms_kelasLangganan = [
            'title' => 'Kelas Kamu',
        ];
        return view('core.kelasKamu', $ms_kelasLangganan);
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

    // blog
    public function blogs()
    {
        $data = [
            'title' => 'Blogs',
            'blog_data' => Blog::all()->where('id_bloger', '=', auth()->user()->id_bloger),
        ];
        return view('core.blogs', $data);
    }

    public function buat_blog()
    {

        $data = [
            'title' => 'Buat Blog',
        ];

        return view('core.buat_blog', $data);
    }

    public function posting_blog(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required|max:7500',
            'kategori' => 'required',
        ], [
            'judul.required' => '⚠️ Judul tidak boleh kosong!',
            'deskripsi.required' => '⚠️ Deskripsi tidak boleh kosong!',
            'deskripsi.max' => '⚠️ Melebihi kapasitas!',
            'kategori.required' => '⚠️ Kategori tidak boleh kosong!',
        ]);

        $data = new Blog();

        $data->username = auth()->user()->username;
        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->kategori = $request->kategori;
        $i = DB::table('blog')->where('id_bloger', '=', auth()->user()->id_bloger)->count();
        if (auth()->user()->id_bloger) {
            // credential variabel
            $data->gambar = auth()->user()->id_bloger . '_' . ($i + 1) . '.' . 'png';
        }

        $data->id_bloger = auth()->user()->id_bloger;

        $data->save();
        return redirect('blogs')->with('success', 'Blog berhasil di posting!');

        $this->idGambar++;
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            // credential variabel
            $i = DB::table('blog')->where('id_bloger', '=', auth()->user()->id_bloger)->count();
            //filename to store
            $filenametostore = auth()->user()->id_bloger . '_' . ($i + 1) . '.' . 'png';

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/' . $filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    public function blog_template($id)
    {
        $datas = [
            'title' => 'Blog Templates',
            'data' => Blog::find($id),
        ];

        return view('core.template-blog', $datas);
    }

    // profil
    public function profil()
    {
        $title = 'Profilku';
        return view('core.profil', compact('title'));
    }

    public function loadImage()
    {
        return view('cropImage');
    }
    public function cropImg()
    {
        $data = $_POST['image'];
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $image_name = 'upload/' . time() . '.png';
        file_put_contents($image_name, $data);
        echo $image_name;
    }
}
