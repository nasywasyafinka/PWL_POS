<!-- ?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index() {
        // Untuk menambahkan data
        // DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?, ?, ?)', ['CUS', 'Pelanggan', now()]);
        // return 'Insert data baru berhasil'; 

        // Mengupdate data
        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate : ' . $row . ' baris';

        // Untuk menghapus data
        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // return 'Delete data berhasil. Jumlah data yang dihapus : ' .$row. ' baris';

        // Untuk menampilkan view
        $data = DB::select('select * from m_level');
        return view('level_id', ['data' => $data]);
    }
} -->

<!-- jobsheet 5 tugas -->
<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LevelController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];
    
        $page = (object)[
            'title' => 'Daftar level yang terdaftar dalam sistem'
        ];
    
        $activeMenu = 'level'; //set menu yang sedang aktif

        $level = LevelModel::all(); //ambil data level unttuk filter level
    
        return view('level.index',['breadcrumb'=>$breadcrumb, 'page' => $page, 'level' => $level,'activeMenu'=>$activeMenu]);
    }
    
    // Ambil data level dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $levels = LevelModel::select('level_id', 'level_kode', 'level_nama')
            ->with('level');
        
        //Filter data level berdasarkan level_id
        if ($request->level_id) {
            $levels->where('level_id', $request->level_id);
        }

        return DataTables::of($levels)
        // menambahkan kolom index / no urut (default level_nama kolom: DT_RowIndex)
        ->addIndexColumn()
        ->addColumn('aksi', function ($level) { // menambahkan kolom aksi
            $btn = '<a href="'.url('/level/' . $level->level_id).'" class="btn btn-info btn-sm">Detail</a> ';
            $btn .= '<a href="'.url('/level/' . $level->level_id. '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/level/'.$level->level_id).'">'
            . csrf_field() . method_field('DELETE') .
            '<button type="submit" class="btn btn-danger btn-sm" onclick="return
            confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
            
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }

    //Menampilkan halaman form tambah level
    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah level baru'
        ];
        $level = LevelModel::all(); //ambil data level untuk ditampilkan di form
        $activeMenu = 'level'; //set menu yang sedang aktif
        return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    //Menyimpan data level baru
    public function store(Request $request){
        $request -> validate([
            //level_kode harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel m_level kolom level_kode
            'level_kode' => 'required|string|min:3|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:100', //level_nama harus diisi, berupa string, dan maksimal 100 karakter
            // 'level_id' => 'required|integer'
        ]);
        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request -> level_nama,
            'level_id' => $request->level_id
        ]);
        return redirect('/level') -> with('success', 'Data level berhasil disimpan');
    }
    
    //Menampilkan detail level
    public function show(String $id){
        $level = LevelModel::with('level') -> find($id);
        $breadcrumb = (object)[
            'title' => 'Detail Level',
            'list' => ['Home', 'Level', 'Detail']
        ];
        $page = (object)[
            'title' => 'Detail level'
        ];
        $activeMenu = 'level'; //set menu yang sedang aktif
        return view('level.show', ['breadcrumb' => $breadcrumb, 'page'=>$page, 'level'=>$level, 'activeMenu'=>$activeMenu]);
    }

    //Menampilkan halaman form edit level
    public function edit(string $id){
        $level = LevelModel::find($id);
        $breadcrumb = (object)[
            'title' => 'Edit level',
            'list' => ['Home', 'Level', 'Edit']
        ];
        $page = (object)[
            'title' => 'Edit Level'
        ];
        $activeMenu = 'level';
        return view ('level.edit', ['breadcrumb'=>$breadcrumb, 'page'=>$page, 'level'=>$level, 'activeMenu'=>$activeMenu]);
    }
    //Menyimpan perubahan data level
    public function update(Request $request, string $id)
    {
        $request->validate([
            'level_kode' => 'required|string|min:3|unique:m_level,level_kode,' . $id . ',level_id',
            'level_nama' => 'required|string|max:100',
            // 'level_id' => 'required|integer'
        ]);
        LevelModel::find($id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
            'level_id' => $request->level_id
        ]);
        return redirect('/level')->with('success' . "data level berhasil diubah");
    }

    //Mengapus data level
    public function destroy(string $id)
    {
        $check = LevelModel::find($id);
        if (!$check) {
            return redirect('/level')->with('error','Data level tidak ditemukan');
        }
        try{
            levelModel::destroy($id);
            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/level')->with('error','Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}