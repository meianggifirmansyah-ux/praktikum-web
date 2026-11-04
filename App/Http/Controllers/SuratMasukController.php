<?php

namespace App\Http\Controllers;

use App\Models\IncomingLetter;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    // Menampilkan daftar surat
   public function index(Request $request)
{
    $query = IncomingLetter::query();

    $suratMasuk = $query
        ->orderBy('id', 'desc')
        ->get();

    return view('surat-masuk.index', compact('suratMasuk'));
}

    // Menampilkan form tambah
    public function create()
    {
        return view('surat-masuk.create');
    }

    // Menyimpan surat baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        IncomingLetter::create($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil ditambahkan!');
    }

    // Menampilkan detail surat
    public function show($id)
    {
        $surat = IncomingLetter::findOrFail($id);

        return view('surat-masuk.show', compact('surat'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $surat = IncomingLetter::findOrFail($id);

        return view('surat-masuk.edit', compact('surat'));
    }

    // Memperbarui surat
    public function update(Request $request, $id)
    {
        $surat = IncomingLetter::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $surat->update($validated);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil diperbarui!');
    }

    // Menghapus surat
    public function destroy($id)
    {
        $surat = IncomingLetter::findOrFail($id);

        $surat->delete();

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat berhasil dihapus!');
    }
}