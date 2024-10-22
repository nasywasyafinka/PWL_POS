<?php

namespace App\Http\Controllers;

use App\Models\DetailModel;
use App\Models\PenjualanModel;
use App\Models\BarangModel;
use App\Models\UserModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Yajra\DataTables\DataTables;

class TransaksiController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Transaksi',
            'list' => ['Home', 'Transaksi']
        ];

        $page = (object)[
            'title' => 'Daftar transaksi yang terdaftar dalam sistem'
        ];

        $activeMenu = 'transaksi';

        $users = UserModel::all();

        return view('transaksi.index', compact('breadcrumb', 'page', 'activeMenu', 'users'));
    }

    public function list(Request $request)
    {
        $penjualan = PenjualanModel::with(['user'])
            ->select('penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal');

        // Filter based on User ID
        if ($request->user_id) {
            $penjualan->where('user_id', $request->user_id);
        }

        return DataTables::of($penjualan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penjualan) {
                $btn = '<button onclick="modalAction(\'' . url('/transaksi/' . $penjualan->penjualan_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/transaksi/' . $penjualan->penjualan_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function confirm_ajax(string $penjualan_id)
    {
        // Ambil data penjualan berdasarkan ID
        $penjualan = PenjualanModel::find($penjualan_id);

        // Cek apakah data penjualan ditemukan
        if (!$penjualan) {
            return response()->json([
                'status' => false,
                'message' => 'Data penjualan tidak ditemukan.'
            ], 404);
        }

        // Ambil detail penjualan terkait
        $penjualanDetail = DetailModel::where('penjualan_id', $penjualan_id)->get();

        return view('transaksi.confirm_ajax', [
            'penjualan' => $penjualan,
            'penjualanDetail' => $penjualanDetail
        ]);
    }

    public function show_ajax(string $id)
    {

        $penjualan = PenjualanModel::with(['user', 'penjualan_detail.barang'])->find($id);


        if ($penjualan) {
            return view('transaksi.show_ajax', [
                'penjualan' => $penjualan
            ]);
        } else {

            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }


    public function create_ajax()
    {
        $penjualan = PenjualanModel::all();
        $user = UserModel::all();
        $barang = BarangModel::all();
        return view('transaksi.create_ajax', ['penjualan' => $penjualan, 'user' => $user, 'barang' => $barang]);
    }

    public function getHargaBarang($id)
    {
        $barang = BarangModel::find($id);

        if ($barang) {
            return response()->json([
                'status' => true,
                'harga_jual' => $barang->harga_jual
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Barang tidak ditemukan'
            ]);
        }
    }

    public function store_ajax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'pembeli' => 'required|string|min:3|max:20',
            'penjualan_kode' => 'required|string|min:3|max:100|unique:t_penjualan,penjualan_kode',
            'penjualan_tanggal' => 'required|date',
            'barang_id' => 'required|array',
            'barang_id.*' => 'numeric',
            'harga' => 'required|array',
            'harga.*' => 'numeric',
            'jumlah' => 'required|array',
            'jumlah.*' => 'numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msgField' => $validator->errors()
            ]);
        }

        try {
            // Simpan data penjualan
            $penjualan = new PenjualanModel();
            $penjualan->user_id = $request->user_id;
            $penjualan->pembeli = $request->pembeli;
            $penjualan->penjualan_kode = $request->penjualan_kode;
            $penjualan->penjualan_tanggal = $request->penjualan_tanggal;
            $penjualan->save();

            // Simpan detail barang
            foreach ($request->barang_id as $index => $barangId) {
                $detailPenjualan = new DetailModel();
                $detailPenjualan->penjualan_id = $penjualan->penjualan_id;
                $detailPenjualan->barang_id = $barangId;
                $detailPenjualan->harga = $request->harga[$index];
                $detailPenjualan->jumlah = $request->jumlah[$index];
                $detailPenjualan->save();
            }

            return response()->json([
                'status' => true,
                'message' => 'Data penjualan berhasil disimpan!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan, data gagal disimpan!',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function edit_ajax(string $penjualan_id)
    {
        $penjualan = PenjualanModel::findOrFail($penjualan_id); // Pastikan gagal dengan benar jika tidak ditemukan
        $users = UserModel::all(); // Mengambil semua pengguna

        return view('penjualan.edit_ajax', compact('penjualan', 'users'));
    }

    public function update_ajax(Request $request, string $penjualan_id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|integer',
                'pembeli' => 'required|string',
                'penjualan_kode' => 'required|string',
                'penjualan_tanggal' => 'required|date',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'errors' => $validator->errors(),
                ]);
            }

            $penjualan = PenjualanModel::findOrFail($penjualan_id);

            $penjualan->update($request->all());

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diupdate'
            ]);
        }

        return redirect('/');
    }

    public function delete_ajax(Request $request, string $penjualan_id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            // Cari data penjualan
            $penjualan = PenjualanModel::findOrFail($penjualan_id);

            if ($penjualan) {
                try {
                    // Hapus semua detail penjualan yang terkait
                    DetailModel::where('penjualan_id', $penjualan_id)->delete();

                    // Hapus data penjualan
                    $penjualan->delete();

                    return response()->json([
                        'status' => true,
                        'message' => 'Data penjualan berhasil dihapus'
                    ]);
                } catch (\Illuminate\Database\QueryException $e) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data gagal dihapus karena masih terkait dengan data lain'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data penjualan tidak ditemukan'
                ]);
            }
        }

        return redirect('/');  // Jika bukan ajax request, redirect ke halaman utama
    }

    // Function untuk export data penjualan ke Excel
    public function export_excel()
    {
        // Ambil data penjualan yang akan diexport
        $penjualan = PenjualanModel::select('penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal')
            ->with(['user', 'penjualan_detail.barang']) // Gunakan relasi 'penjualanDetail' sesuai model
            ->orderBy('penjualan_tanggal')
            ->get();

        // Load library excel
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet(); // Ambil sheet yang aktif

        // Set header untuk penjualan
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal Penjualan');
        $sheet->setCellValue('C1', 'User ID');
        $sheet->setCellValue('D1', 'Nama Pembeli');
        $sheet->setCellValue('E1', 'Kode Penjualan');
        $sheet->setCellValue('F1', 'Barang ID');
        $sheet->setCellValue('G1', 'Nama Barang');
        $sheet->setCellValue('H1', 'Jumlah');
        $sheet->setCellValue('I1', 'Harga');

        $sheet->getStyle('A1:I1')->getFont()->setBold(true); // Bold header

        $no = 1;  // Nomor data dimulai dari 1
        $baris = 2; // Baris data dimulai dari baris ke 2

        // Loop untuk setiap penjualan
        foreach ($penjualan as $penj) {
            // Loop untuk setiap detail penjualan
            foreach ($penj->penjualan_detail as $detail) {
                $sheet->setCellValue('A' . $baris, $no);
                $sheet->setCellValue('B' . $baris, $penj->penjualan_tanggal); // Tanggal penjualan
                $sheet->setCellValue('C' . $baris, $penj->user->nama); // Nama user
                $sheet->setCellValue('D' . $baris, $penj->pembeli); // Nama pembeli
                $sheet->setCellValue('E' . $baris, $penj->penjualan_kode); // Kode penjualan
                $sheet->setCellValue('F' . $baris, $detail->barang_id); // Barang ID
                $sheet->setCellValue('G' . $baris, $detail->barang->barang_nama); // Nama barang
                $sheet->setCellValue('H' . $baris, $detail->jumlah); // Jumlah barang
                $sheet->setCellValue('I' . $baris, $detail->harga); // Harga per barang

                $baris++;
                $no++;
            }
        }

        // Set auto size untuk kolom
        foreach (range('A', 'I') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Set title sheet
        $sheet->setTitle('Data Penjualan');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $filename = 'Data Penjualan ' . date('Y-m-d H:i:s') . '.xlsx';

        // Pengaturan header untuk download file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $writer->save('php://output');
        exit;
    }
    public function export_pdf()
    {
        // Ambil data penjualan yang akan diexport
        $penjualan = PenjualanModel::select('penjualan_id', 'penjualan_kode', 'penjualan_tanggal', 'user_id', 'pembeli')
            ->with(['Penjualan_detail.barang', 'user']) // Pastikan relasi sudah terdefinisi
            ->orderBy('penjualan_tanggal')
            ->get();

        // Load view untuk PDF
        $pdf = Pdf::loadView('transaksi.export_pdf', ['penjualan' => $penjualan]);

        $pdf->setPaper('a4', 'landscape'); // Set ukuran kertas dan orientasi
        $pdf->setOption("isRemoteEnabled", true); // Set true jika ada gambar dari URL
        $pdf->render();

        return $pdf->stream('Data Penjualan ' . date('Y-m-d H:i:s') . '.pdf');
    }
}
