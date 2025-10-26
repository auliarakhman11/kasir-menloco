<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use Illuminate\Http\Request;

class DiskonController extends Controller
{
    public function index()
    {
        return view('diskon.index', [
            'title' => 'Diskon',
            'diskon' => Diskon::all(),
        ]);
    }

    public function addDiskon(Request $request)
    {
        Diskon::create([
            'nm_diskon' => $request->nm_diskon,
            'jumlah' => $request->jumlah,
            'void' => 0
        ]);

        return redirect()->back()->with('success', 'Data diskon berhasil dibuat');
    }

    public function editDiskon(Request $request)
    {
        Diskon::where('id', $request->id)->update([
            'nm_diskon' => $request->nm_diskon,
            'jumlah' => $request->jumlah,
            'void' => $request->void
        ]);

        return redirect()->back()->with('success', 'Data diskon berhasil diubah');
    }
}
