<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Menambahkan data user dengan Eloquent Model
        // $data = [
        //     'username' => 'custmer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data); // Menambahkan data ke tabel m_user

        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        //     'username' => 'customer-1'
        // ];
        // UserModel::where('level_id', '4')->update($data); // Mengupdate data user

        //Jobsheet 4 Praktikum 1 Langkah 2
        // $data
        //     = [
        //         'level_id' => 2,
        //         'username' => 'manager_dua',
        //         'nama' => 'Manager 2',
        //         'password' => Hash::make('12345')
        //     ];
        // UserModel::create($data);

        //Jobsheet 4 Praktikum 1 Langkah 4
        $data
            = [
                'level_id' => 2,
                'username' => 'manajer_tiga',
                'nama' => 'Manager 3',
                'password' => Hash::make('12345')
            ];
        UserModel::create($data);
        // mencoba mengakses model UserModel
        $user = UserModel::all(); // Mengambil semua data dari tabel m_user
        return view('user', ['data' => $user]);
    }
}
