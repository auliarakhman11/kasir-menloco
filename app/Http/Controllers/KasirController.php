<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Karyawan;
use App\Models\Penjualan;
use App\Models\PenjualanKaryawan;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KasirController extends Controller
{
    public function index()
    {
        return view('kasir.index', [
            'title' => 'Kasir',
            'service' => Service::where('void', 0)->get(),

        ]);
    }

    public function getInput()
    {
        return view('kasir.getInput', [])->render();
    }

    public function addPelanggan(Request $request)
    {

        $no_invoice = 'INV' . date('dmy') . strtoupper(Str::random(5));

        $dt_invoice = Invoice::where('tgl', date('Y-m-d'))->orderBy('id', 'DESC')->first();

        if ($dt_invoice) {
            $no_antrian = $dt_invoice->no_antrian + 1;
        } else {
            $no_antrian = 1;
        }

        Invoice::create([
            'cabang_id' => 1,
            'no_invoice' => $no_invoice,
            'nm_customer' => $request->nm_customer,
            'total' => 0,
            'tgl' => date('Y-m-d'),
            'no_antrian' => $no_antrian,
            'selesai' => 0,
            'void' => 0,
            'user_id' => Auth::id(),
        ]);

        return true;
    }

    public function getAntrian()
    {
        return view('kasir.getAntrian', [
            'antrian' => Invoice::where('selesai', 0)->where('void', 0)->where('tgl',date('Y-m-d'))->orderBy('id', 'ASC')->get(),
        ])->render();
    }

    public function getSelesai()
    {
        return view('kasir.getSelesai', [
            'antrian' => Invoice::where('selesai', 1)->where('void', 0)->orderBy('id', 'DESC')->where('tgl', date('Y-m-d'))->get(),
        ])->render();
    }

    public function deletePelanggan($id)
    {
        Invoice::where('id', $id)->update([
            'void' => 1
        ]);

        return true;
    }

    public function getTambahPesanan()
    {
        return view('kasir.getTambahPesanan', [
            'service' => Service::where('void', 0)->get(),
            'karyawan' => Karyawan::where('void', 0)->get(),
        ])->render();
    }

    public function checkout(Request $request)
    {

        $karyawan_id = $request->karyawan_id;

        $service_id = $request->service_id;
        $qty = $request->qty;
        $harga = $request->harga;


        if (empty($karyawan_id)) {
            return false;
        } else {
            $total = 0;

            for ($count = 0; $count < count($service_id); $count++) {
                $total += ($harga[$count] * $qty[$count]);
                Penjualan::create([
                    'invoice_id' => $request->id,
                    'cabang_id' => 1,
                    'service_id' => $service_id[$count],
                    'harga' => $harga[$count],
                    'qty' => $qty[$count],
                    'tgl' => date('Y-m-d'),
                    'void' => 0,
                    'user_id' => Auth::id(),
                ]);
            }

            foreach ($karyawan_id as $k) {
                PenjualanKaryawan::create([
                    'invoice_id' => $request->id,
                    'cabang_id' => 1,
                    'karyawan_id' => $k,
                    'harga' => 0,
                    'tgl' => date('Y-m-d'),
                    'void' => 0,
                    'user_id' => Auth::id(),
                ]);
            }

            Invoice::where('id', $request->id)->update([
                'total' => $total,
                'selesai' => 1
            ]);

            return true;
        }
    }

    public function getDeatailPesanan($invoice_id)
    {
        return view('kasir.getDeatailPesanan', [
            'invoice' => Invoice::where('id', $invoice_id)->with(['penjualan', 'penjualan.service', 'penjualanKaryawan', 'penjualanKaryawan.karyawan'])->first(),
        ])->render();
    }

    public function printNota(Request $request)
    {
        return view('kasir.nota', [
            'invoice' => Invoice::where('id', $request->inv)->with(['penjualan', 'penjualan.service', 'penjualanKaryawan', 'penjualanKaryawan.karyawan'])->first(),
        ])->render();
    }

    public function refundInvoice(Request $request)
    {
        Invoice::where('id', $request->id)->update(['void' => 2]);
        Penjualan::where('invoice_id', $request->id)->update(['void' => 2]);
        PenjualanKaryawan::where('invoice_id', $request->id)->update(['void' => 2]);

        return true;
    }
}
