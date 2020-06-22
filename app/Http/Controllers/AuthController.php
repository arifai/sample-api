<?php

namespace App\Http\Controllers;

use App\UsersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Str as Str;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function register(Request $request)
    {
        // validasi input data
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // password dihash
        $password_hashed = Hash::make($password);

        $data = [
            'email' => $email,
            'password' => $password_hashed
        ];

        if (UsersModel::create($data)) {
            // return success jika user berhasil register dengan http response code 201
            // untuk mengetahui arti response code
            // selengkapnya bisa baca di sini [https://developer.mozilla.org/id/docs/Web/HTTP/Status]
            return response()->json(['status' => 'success', 'message' => '', 'result' => null], 201);
        }

        // return failed jika user gagal register dengan http response code 400
        return response()->json(['status' => 'failed', 'message' => 'error', 'result' => null], 400);
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);

        // cari user berdasarkan email
        $user = UsersModel::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // generate new token
            $token = Str::random(100);
            $user->update(['token' => $token]);

            // return success jika user berhasil authorize dengan http response code 200
            return response()->json(['status' => 'success', 'message' => '', 'result' => $user]);
        }

        // return failed jika user gagal authorize dengan http response code 401
        return response()->json(['status' => 'failed', 'message' => 'error', 'result' => null], 401);
    }

    // TODO(you): fix me
    // public function unauthenticate(Request $request)
    // {
    //     // ambil data user yang statusnya masih authorize
    //     $user = $request->user();
    //     // ubah nilai token menjadi null
    //     $user->update(['token' => null]);

    //     return response()->json(['status' => 'success', 'message' => '', 'result' => null]);
    // }
}
