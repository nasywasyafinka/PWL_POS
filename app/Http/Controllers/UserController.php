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
        // $data
        //     = [
        //         'level_id' => 2,
        //         'username' => 'manajer_tiga',
        //         'nama' => 'Manager 3',
        //         'password' => Hash::make('12345')
        //     ];
        // UserModel::create($data);

        // // mencoba mengakses model UserModel
        // $user = UserModel::all(); // Mengambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);

        // Jobsheet 4 Praktikum 2.1 Langkah 3
        // $user = UserModel::find(1); // Mengambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);

        // Jobsheet 4 Praktikum 2.1 Langkah 5
        // $user = UserModel::where('level_id', 1)->first();
        // return view('user', ['data' => $user]);

        // Jobsheet 4 Praktikum 2.1 Langkah 5
        // $user = UserModel::findor(1, ['username', 'nama'], function () {
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);

        // Jobsheet 4 Praktikum 2.1 Langkah 10
        // $user = UserModel::findor(20, ['username', 'nama'], function () {
        //     abort(404);
        // });
        // return view('user', ['data' => $user]);

        // Jobsheet 4 Praktikum 2.2 Langkah 1
        // $user = UserModel::findOrFail(1);
        // return view('user', ['data' => $user]);

        // Jobsheet 4 Praktikum 2.2 Langkah 3
        // $user = UserModel::where('username', 'manager9')->first0rFail();
        // return view('user', ['data' => $user]);


        //Jobsheet 4 Praktikum 2.3 Langkah 3
        // Menghitung jumlah pengguna dengan level_id = 2
        // $userCount = UserModel::where('level_id', 2)->count();
        // return view('user', ['userCount' => $userCount]);


        //Jobsheet 4 Praktikum 2.4 Langkah 3
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // return view('user', ['data' => $user]);

        //Jobsheet 4 Praktikum 2.4 Langkah 6
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager',
        //         'nama' => 'Manager',
        //     ],
        // );
        // return view('user', ['data' => $user]);

        //Jobsheet 4 Praktikum 2.4 Langkah 8
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // return view('user', ['data' => $user]);


        //Jobsheet 4 Praktikum 2.4 Langkah 10
        $user = UserModel::firstOrNew(
            [
                'username' => 'manager33',
                'nama' => 'Manager Tiga Tiga',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ],
        );
        $user ->save();
        return view('user', ['data' => $user]);


    }
}
