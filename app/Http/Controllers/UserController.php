<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function index()
    // {
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
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user ->save();
        // return view('user', ['data' => $user]);



        //Jobsheet 4 Praktikum 2.5 Langkah 1
        // $user = UserModel::create([
        //     'username' => 'manager55',
        //     'nama' => 'Manager55',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);
        // $user->username = 'manager56';
        // $user->isDirty(); // true
        // $user->isDirty('username'); // true
        // $user->isDirty('nama'); // false
        // $user->isDirty(['nama', 'username']); // true
        // $user->isClean(); // false
        // $user->isClean('username'); // false
        // $user->isClean('nama'); // true
        // $user->isClean(['nama', 'username']); // false
        // $user->save();
        // $user->isDirty(); // false
        // $user->isClean(); // true
        // dd($user->isDirty());


        //Jobsheet 4 Praktikum 2.5 Langkah 3
        // $user = UserModel::create([
        //     'username' => 'manager 11',
        //     'nama' => 'Manager11',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);
        // $user->username = 'manager12';
        // $user->save();
        // $user->wasChanged(); // true
        // $user->wasChanged('username'); // true
        // $user->wasChanged(['nama', 'username']); // true
        // $user->wasChanged('nama'); // false
        // dd($user->wasChanged(['nama', 'username'])); // true

    // }



    //Jobsheet 4 Praktikum 2.6 Langkah 1
    public function index() {
        $user = UserModel::all();
        return view ('user', ['data' => $user]);
    }

    //Jobsheet 4 Praktikum 2.6 Langkah 6
    public function tambah() {
        return view ('user_tambah');
    }

    //Jobsheet 4 Praktikum 2.6 Langkah 9
    public function tambah_simpan(Request $request) {
        UserModel::create ([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);
        return redirect('/user');
    }

    //Jobsheet 4 Praktikum 2.6 Langkah 13
    public function ubah ($id) {
        $user = UserModel::find($id);
        return view ('user_ubah', ['data' => $user]);
    }

    //Jobsheet 4 Praktikum 2.6 Langkah 13
    public function ubah_simpan($id, Request $request) {
        $user = UserModel::find($id);
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;
        
        $user->save();
        
        return redirect('/user');
    }

    //Jobsheet 4 Praktikum 2.6 Langkah 19
    public function hapus($id) {
        $user = UserModel::find($id);
        $user->delete();
       
        return redirect('/user');
    } 

    
}
