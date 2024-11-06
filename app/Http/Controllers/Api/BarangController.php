<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;
use Illuminate\Support\Facades\Validator;
class BarangController extends Controller
{
    // public function index(){
    //     return BarangModel::all();
    // }
    // public function store(Request $request){
    //     $barang = BarangModel::create($request->all());
    //     return response()->json($barang, 201);
    // }
    // public function show(BarangModel $barang){
    //     return response()->json($barang);
    // }
    // public function update(Request $request, BarangModel $barang){
    //     $barang->update($request->all());
    //     return response()->json($barang);
    // }
    // public function destroy(BarangModel $barang){
    //     $barang->delete();
    //     return response()->json([
    //         'success' => true,
    //         'massage' => 'Data terhapus'
    //     ]);
    // }

    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(),[
            'kategori_id' => 'required',
            'barang_kode' => 'required|min:3|max:10',
            'barang_nama' => 'required|min:5|max:100',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //if validations fails
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        //create barang
        $barang = BarangModel::create([
            'kategori_id' => $request->kategori_id,
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'image' => $request->image->hashName()
        ]);
        //return response JSON use is created
        if($barang){
            return response()->json([
                'success' => true,
                'barang' => $barang,
            ], 201);
        }
        //return JSON process insert failed
        return response()->json([
            'success' => false,
        ], 409);
    }
}