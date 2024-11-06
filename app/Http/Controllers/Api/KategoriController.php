<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
class KategoriController extends Controller
{
    public function index(){
        return KategoriModel::all();
    }
    public function store(Request $request){
        $kategori = KategoriModel::create($request->all());
        return response()->json($kategori, 201);
    }
    public function show(KategoriModel $kategori){
        return response()->json($kategori);
    }
    public function update(Request $request, KategoriModel $kategori){
        $kategori->update($request->all());
        return response()->json($kategori);
    }
    public function destroy(KategoriModel $kategori){
        $kategori->delete();
        return response()->json([
            'success' => true,
            'massage' => 'Data terhapus'
        ]);
    }
}