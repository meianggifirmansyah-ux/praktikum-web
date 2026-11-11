
@extends('layouts.app')

@section('title', 'Surat Keluar')
@section('heading', 'Data Surat Keluar')

@section('content')

<div class="card p-4">

    {{-- JUDUL DAN TOMBOL TAMBAH --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h5 class="fw-bold mb-1">Daftar Surat Keluar</h5>
            <small class="text-secondary">
                Manajemen arsip surat keluar
            </small>
        </div>

        {{-- Tambah Surat hanya untuk Petugas --}}
        @if(auth()->user()->role === 'petugas')

            <a href="{{ route('surat-keluar.create') }}"
               class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Surat
            </a>

        @endif

    </div>


    {{-- FORM PENCARIAN --}}
    <form action="{{ route('surat-keluar.index') }}"
          method="GET"
          class="mb-3">

        <div class="input-group">

            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Cari nomor surat, tujuan, atau perihal..."
                   value="{{ request('search') }}">

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i> Cari
            </button>

            <a href="{{ route('surat-keluar.index') }}"
               class="btn btn-secondary">
                Reset
            </a>

        </div>

    </form>


    {{-- TABEL DATA SURAT KELUAR --}}
    <div class="table-responsive">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-primary">

                <tr>
                    <th>No</th>
                    <th>Nomor Surat</th>
                    <th>Tanggal</th>
                    <th>Tujuan</th>
                    <th>Perihal</th>
                    <th width="220">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($suratKeluar as $surat)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $surat->nomor_surat }}</td>

                        <td>
                            {{ \Carbon\Carbon::parse($surat->tanggal)->format('d-m-Y') }}
                        </td>

                        <td>{{ $surat->tujuan }}</td>

                        <td>{{ $surat->perihal }}</td>

                        <td>

                            {{-- DETAIL: PETUGAS DAN PEMBACA --}}
                            <a href="{{ route('surat-keluar.show', $surat->id) }}"
                               class="btn btn-info btn-sm text-white">

                                <i class="bi bi-eye"></i> Detail

                            </a>


                            {{-- EDIT DAN HAPUS: KHUSUS PETUGAS --}}
                            @if(auth()->user()->role === 'petugas')

                                <a href="{{ route('surat-keluar.edit', $surat->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="bi bi-pencil"></i> Edit

                                </a>


                                <form action="{{ route('surat-keluar.destroy', $surat->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus surat ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">

                                        <i class="bi bi-trash"></i> Hapus

                                    </button>

                                </form>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center text-secondary py-4">

                            <i class="bi bi-inbox fs-2 d-block"></i>

                            Belum ada data surat keluar.

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
