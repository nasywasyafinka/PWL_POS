<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    // Menampilkan halaman form tambah user
    public function registration()
    {
        $level = LevelModel::select('level_id', 'level_nama')->get();

        return view('auth.signup')
                    ->with('level', $level);
    }

    //Menyimpan data user baru
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
            'username'  => 'required|string|min:3|unique:m_user,username',
            'nama'      => 'required|string|max:100',   //nama harus diisi, berupa string, dan maksimal 100 karakter
            'password'  => 'required|min:5',            //password harus diisi dan minimal 5 karakter
            'level_id'  => 'required|integer'           //level_id harus diisi dan berupa angka
        ]);

        if ($validator->fails()) {
            // Jika validasi gagal, kirim respons JSON dengan pesan error
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal.',
                'msgField' => $validator->messages()
            ], 422);
        }

        UserModel::create([
            'username'  => $request->username,
            'nama'      => $request->nama,
            'password'  => bcrypt($request->password),  //password dienkripsi sebelum disimpan
            'level_id'  => $request->level_id
        ]);
        
        // Kirim respons sukses
        return response()->json([
            'status' => true,
            'message' => 'Registrasi berhasil dilakukan!',
            'redirect' => url('/login') // Redirect ke laman login
        ]);
    }
}