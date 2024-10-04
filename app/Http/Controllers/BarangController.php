<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use App\Models\BarangModel;
use Yajra\DataTables\DataTables;

class BarangController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar Barang',
            'list' => ['Home', 'Barang']
        ];
    
        $page = (object)[
            'title' => 'Daftar barang yang terdaftar dalam sistem'
        ];
    
        $activeMenu = 'barang'; //set menu yang sedang aktif

        $kategori = KategoriModel::all(); //ambil data kategori unttuk filter kategori
    
        return view('barang.index',['breadcrumb'=>$breadcrumb, 'page' => $page, 'kategori' => $kategori,'activeMenu'=>$activeMenu]);
    }
    
    // Ambil data barang dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $barangs = BarangModel::select('barang_id', 'barang_kode', 'barang_nama', 'kategori_id', 'harga_beli', 'harga_jual')
            ->with('kategori');
        
        //Filter data barang berdasarkan kategori_id
        if ($request->kategori_id) {
            $barangs->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($barangs)
        // menambahkan kolom index / no urut (default barang_nama kolom: DT_RowIndex)
        ->addIndexColumn()
        ->addColumn('aksi', function ($barang) { // menambahkan kolom aksi
            $btn = '<a href="'.url('/barang/' . $barang->barang_id).'" class="btn btn-info btn-sm">Detail</a> ';
            $btn .= '<a href="'.url('/barang/' . $barang->barang_id. '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'. url('/barang/'.$barang->barang_id).'">'
            . csrf_field() . method_field('DELETE') .
            '<button type="submit" class="btn btn-danger btn-sm" onclick="return
            confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
            
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }

    //Menampilkan halaman form tambah barang
    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Barang',
            'list' => ['Home', 'Barang', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah barang baru'
        ];
        $kategori = KategoriModel::all(); //ambil data kategori untuk ditampilkan di form
        $activeMenu = 'barang'; //set menu yang sedang aktif
        return view('barang.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    //Menyimpan data barang baru
    public function store(Request $request){
        $request -> validate([
            //barang_kode harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel m_barang kolom barang_kode
            'barang_kode' => 'required|string|min:3|unique:m_barang,barang_kode',
            'barang_nama' => 'required|string|max:100', //barang_nama harus diisi, berupa string, dan maksimal 100 karakter
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'kategori_id' => 'required|integer'// kategori_id harus diisi dan berupa angka
        ]);
        BarangModel::create([
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request -> barang_nama,
            'harga_beli' => $request -> harga_beli,
            'harga_jual' => $request -> harga_jual,
            'kategori_id' => $request->kategori_id
        ]);
        return redirect('/barang') -> with('success', 'Data barang berhasil disimpan');
    }
    
    //Menampilkan detail barang
    public function show(String $id){
        $barang = BarangModel::with('kategori') -> find($id);
        $breadcrumb = (object)[
            'title' => 'Detail Barang',
            'list' => ['Home', 'Barang', 'Detail']
        ];
        $page = (object)[
            'title' => 'Detail barang'
        ];
        $activeMenu = 'barang'; //set menu yang sedang aktif
        return view('barang.show', ['breadcrumb' => $breadcrumb, 'page'=>$page, 'barang'=>$barang, 'activeMenu'=>$activeMenu]);
    }

    //Menampilkan halaman form edit barang
    public function edit(string $id){
        $barang = BarangModel::find($id);
        $kategori = KategoriModel::all();
        $breadcrumb = (object)[
            'title' => 'Edit barang',
            'list' => ['Home', 'Barang', 'Edit']
        ];
        $page = (object)[
            'title' => 'Edit Barang'
        ];
        $activeMenu = 'barang';
        return view ('barang.edit', ['breadcrumb'=>$breadcrumb, 'page'=>$page, 'barang'=>$barang, 'kategori'=>$kategori, 'activeMenu'=>$activeMenu]);
    }
    //Menyimpan perubahan data barang
    public function update(Request $request, string $id)
    {
        $request->validate([
            'barang_kode' => 'required|string|min:3|unique:m_barang,barang_kode,' . $id . ',barang_id',
            'barang_nama' => 'required|string|max:100',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'kategori_id' => 'required|integer'
        ]);
        BarangModel::find($id)->update([
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request -> harga_beli,
            'harga_jual' => $request -> harga_jual,
            'kategori_id' => $request->kategori_id
        ]);
        return redirect('/barang')->with('success' . "data barang berhasil diubah");
    }

    //Mengapus data barang
    public function destroy(string $id)
    {
        $check = BarangModel::find($id);
        if (!$check) {
            return redirect('/barang')->with('error','Data barang tidak ditemukan');
        }
        try{
            barangModel::destroy($id);
            return redirect('/barang')->with('success', 'Data barang berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/barang')->with('error','Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}