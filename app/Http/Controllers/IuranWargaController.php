<?php

namespace App\Http\Controllers;

use App\Models\IuranWarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class IuranWargaController extends Controller
{
    public function index()
    {
        // Mengambil data iuran beserta data penduduk terkait menggunakan eager loading (with)
        $iuran = IuranWarga::with('penduduk')->latest()->paginate(10);
        return view('iuran.index', compact('iuran'));
    }

    public function create()
    {
        $penduduk = Penduduk::orderBy('nama', 'asc')->get();
        return view('iuran.create', compact('penduduk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduks,id',
            'bulan' => 'required|string',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_pembayaran' => 'required|date',
        ]);

        IuranWarga::create($request->all());

        return redirect()->route('iuran.index')->with('success', 'Catatan iuran warga berhasil ditambahkan.');
    }

    public function edit(IuranWarga $iuran)
    {
        $penduduk = Penduduk::orderBy('nama', 'asc')->get();
        return view('iuran.edit', compact('iuran', 'penduduk'));
    }

    public function update(Request $request, IuranWarga $iuran)
    {
        $request->validate([
            'penduduk_id' => 'required|exists:penduduks,id',
            'bulan' => 'required|string',
            'jumlah' => 'required|numeric|min:0',
            'tanggal_pembayaran' => 'required|date',
        ]);

        $iuran->update($request->all());

        return redirect()->route('iuran.index')->with('success', 'Catatan iuran warga berhasil diperbarui.');
    }

    public function destroy(IuranWarga $iuran)
    {
        $iuran->delete();
        return redirect()->route('iuran.index')->with('success', 'Catatan iuran berhasil dihapus.');
    }
}
