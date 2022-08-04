<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
// use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    // student register
    public function student()
    {
        $title = 'Student';
        return view('auth.student', compact('title'));
    }

    // create student
    public function create_student(Request $request)
    {
        $this->validate(
            $request,
            [
                // requirement validated
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'username' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'cpassword' => 'required|same:password',
            ],
            [
                // message if input empty
                'nama_depan.required' => 'Nama depan wajib!',
                'nama_belakang.required' => 'Nama belakang wajib!',
                'username.required' => 'Username wajib!',
                'email.required' => 'Email wajib diisi!',
                'email.unique' => 'Email sudah digunakan!',
                'password.required' => 'Password wajib diisi!',
                'cpassword.required' => 'Konfirmasi password wajib!',

                // message if input not email format
                'email.email' => 'Masukkan format email yang benar!',

                // message if password request not least 8 char
                'password.min' => 'Password minimal 8 karakter!',

                // message if cpassword not same with password request
                'cpassword.same' => 'Password tidak sama!',
            ],
        );

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'username' => $request->username,
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password),
            'role' => 'student',
            'id_bloger' => null,
            'id_mentro' => null,
        ]);
        // even(new Registered($user));
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Cek email untuk verifikasi');
    }

    // trainer register
    public function mentor()
    {
        $data = [
            'title' => 'Mentor',
            'provinces' => Province::all(),
            'regencies' => Regency::all(),
            'districts' => District::all(),
            'villages' => Village::all(),
        ];
        return view('auth.mentor', $data);
    }

    public function create_mentor(Request $request)
    {
        $this->validate(
            $request,
            [
                'nama_lengkap' => 'required',
                'username' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'cpassword' => 'required|same:password',
            ],

            [
                'nama_lengkap.required' => 'Nama lengkap wajib diisi!',
                'username.required' => 'Username wajib diisi!',
                'email.required' => 'Email wajib diisi!',
                'email.unique' => 'Email sudah digunakan!',
                'password.required' => 'Password wajib diisi!',
                'cpassword.required' => 'Konfirmasi password wajib!',

                // message if input not email format
                'email.email' => 'Masukkan format email yang benar!',

                // message if password request not least 8 char
                'password.min' => 'Password minimal 8 karakter!',

                // message if cpassword not same with password request
                'cpassword.same' => 'Password tidak sama!',
            ]
        );

        $user = User::count();
        $trainer = User::where('role', '=', 'trainer')->count();
        $token_username = substr(strrev($request->username), 3);

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password),
            'role' => 'trainer',
            'status' => null,
            'id_bloger' => $request->username . ($user + 1),
            'id_mentor' => $request->username . ($trainer + 1),
            'crud_token' => 'plqju' . $user . 'ksoidheyrfYhtg' . ($trainer + 1) . $token_username,
        ]);
        // even(new Registered($user));
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Cek email untuk verifikasi');
    }
}
