<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
// use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    // student view
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
                'email' => 'required|email',
                'password' => 'required|min:8',
                'cpassword' => 'required|same:password',
            ],
            [
                // message if input empty
                'nama_depan.required' => 'Nama depan wajib!',
                'nama_belakang.required' => 'Nama belakang wajib!',
                'username.required' => 'Username wajib!',
                'email.required' => 'Email wajib!',
                'password.required' => 'Password wajib!',
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
            'nama_lengkap' => $request->nama_depan . " " . $request->nama_belakang,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'username' => $request->username,
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password),
            'role' => 'student',
        ]);

        // event(new Registered($user));
        return redirect()->route('login');
    }
}
