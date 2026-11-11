<?php

namespace App\Http\Controllers;

use App\Models\OutgoingLetter;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    // 1. MENAMPILKAN DAFTAR SURAT KELUAR
    public function index()
    {
        $suratKeluar = OutgoingLetter::query()
            ->when(request('search'), function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nomor_surat', 'like', "%{$search}%")
                      ->orWhere('tujuan', 'like', "%{$search}%")
                      ->orWhere('perihal', 'like', "%{$search}%");
                });
            })
            ->get();

        return view('surat-keluar.index', compact('suratKeluar'));
    }


    // 2. MENAMPILKAN FORM TAMBAH SURAT
    public function create()
    {
        return view('surat-keluar.create');
    }


    // 3. MENYIMPAN DATA SURAT KELUAR (STORE)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $surat = new OutgoingLetter();

        $surat->nomor_surat = $validated['nomor_surat'];
        $surat->tanggal = $validated['tanggal'];
        $surat->tujuan = $validated['tujuan'];
        $surat->perihal = $validated['perihal'];
        $surat->keterangan = $validated['keterangan'] ?? null;

        $surat->save();

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan!');
    }


    // 4. MENAMPILKAN DETAIL SURAT KELUAR
    public function show($id)
    {
        $suratKeluar = OutgoingLetter::findOrFail($id);

        return view('surat-keluar.show', compact('suratKeluar'));
    }


    // 5. MENAMPILKAN FORM EDIT SURAT KELUAR
    public function edit($id)
    {
        $suratKeluar = OutgoingLetter::findOrFail($id);

        return view('surat-keluar.edit', compact('suratKeluar'));
    }


    // 6. MEMPERBARUI DATA SURAT KELUAR
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'tujuan' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $surat = OutgoingLetter::findOrFail($id);

        $surat->nomor_surat = $validated['nomor_surat'];
        $surat->tanggal = $validated['tanggal'];
        $surat->tujuan = $validated['tujuan'];
        $surat->perihal = $validated['perihal'];
        $surat->keterangan = $validated['keterangan'] ?? null;

        $surat->save();

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui!');
    }


    // 7. MENGHAPUS DATA SURAT KELUAR
    public function destroy($id)
    {
        $surat = OutgoingLetter::findOrFail($id);

        $surat->delete();

        return redirect()
            ->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus!');
    }
}
