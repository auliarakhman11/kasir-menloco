<?php

namespace App\Http\Controllers;

use App\Models\AksesCabang;
use App\Models\Akun;
use App\Models\Cabang;
use App\Models\Invoice;
use App\Models\Jurnal;
use App\Models\Karyawan;
use App\Models\Penjualan;
use App\Models\PenjualanKaryawan;
use App\Models\PersenInvestor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JurnalController extends Controller
{


    public function pengeluaran(Request $request)
    {

        if ($request->query('tgl1')) {
            $tgl1 = $request->query('tgl1');
            $tgl2 = $request->query('tgl2');
        } else {
            $tgl1 = date('Y-m-01');
            $tgl2 = date('Y-m-t');
        }

        $cabang_id = Auth::user()->cabang_id;

        $jurnal = Jurnal::where('tgl', '>=', $tgl1)->where('tgl', '<=', $tgl2)->where('jenis', 2)->where('void', 0)->where('cabang_id', $cabang_id)->with(['akun', 'user', 'cabang'])->get();

        return view('jurnal.pengeluaran', [
            'title' => 'Laporan Pengeluaran',
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'jurnal' => $jurnal,
            'akun' => Akun::all(),
        ]);
    }

    public function addPengeluaran(Request $request)
    {

        $cabang_id = Auth::user()->cabang_id;

        if ($request->akun_id == 8) {
            Jurnal::create([
                'cabang_id' => $cabang_id,
                'akun_id' => $request->akun_id,
                'jumlah' => $request->jumlah,
                'ket' => $request->ket,
                'pembayaran_id' => $request->pembayaran_id,
                'jenis' => 1,
                'tgl' => $request->tgl,
                'void' => 0,
                'user_id' => Auth::id()
            ]);

            Jurnal::create([
                'cabang_id' => $cabang_id,
                'akun_id' => $request->akun_id,
                'jumlah' => $request->jumlah,
                'ket' => $request->ket,
                'pembayaran_id' => $request->pembayaran_id,
                'jenis' => 2,
                'tgl' => $request->tgl,
                'void' => 0,
                'user_id' => Auth::id()
            ]);
        } else {
            Jurnal::create([
                'cabang_id' => $cabang_id,
                'akun_id' => $request->akun_id,
                'jumlah' => $request->jumlah,
                'ket' => $request->ket,
                'pembayaran_id' => $request->pembayaran_id,
                'jenis' => 2,
                'tgl' => $request->tgl,
                'void' => 0,
                'user_id' => Auth::id()
            ]);
        }


        return redirect()->back()->with('success', 'Data berhasil dibuat');
    }

    public function editPengeluaran(Request $request)
    {
        Jurnal::where('id', $request->id)->update([
            'akun_id' => $request->akun_id,
            'pembayaran_id' => $request->pembayaran_id,
            'jumlah' => $request->jumlah,
            'ket' => $request->ket,
            'tgl' => $request->tgl,
            'user_id' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function deletePengeluaran($id)
    {
        Jurnal::where('id', $id)->update([
            'void' => 1,
        ]);

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
