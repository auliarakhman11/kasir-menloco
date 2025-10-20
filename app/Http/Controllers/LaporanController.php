<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function laporanPenjualan(Request $request)
    {
        if ($request->query('tgl1')) {
            $tgl1 = $request->query('tgl1');
            $tgl2 = $request->query('tgl2');
        } else {
            $tgl1 = date('Y-m-01');
            $tgl2 = date('Y-m-t');
        }

        return view('laporan.index', [
            'title' => 'Laporan Penjualan',
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'laporan' => Invoice::select('tgl')->selectRaw('SUM(total) as ttl_penjualan, COUNT(id) as jml_pelanggan')->where('tgl', '>=', $tgl1)->where('tgl', '<=', $tgl2)->where('void', 0)->where('selesai', 1)->groupBy('tgl')->orderBy('tgl', 'DESC')->get(),
        ]);
    }

    public function detailLaporanPenjualan($tgl)
    {
        return view('laporan.detailLaporanPenjualan', [
            'tgl' => $tgl,
            'laporan' => Invoice::where('tgl', $tgl)->where('void', 0)->where('selesai', 1)->orderBy('id', 'ASC')->with(['penjualan', 'penjualan.service', 'penjualanKaryawan', 'penjualanKaryawan.karyawan'])->get(),
        ]);
    }
}
