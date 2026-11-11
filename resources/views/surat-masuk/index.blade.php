
@extends('layouts.app')

@section('title', 'Surat Masuk')
@section('heading', 'Daftar Surat Masuk')

@section('content')

<div class="card p-4">

    <div class="d-flex justify-content-between mb-4">
        <h5>Data Surat Masuk</h5>

        {{-- Tambah Surat hanya untuk Petugas --}}
        @if(auth()->user()->role === 'petugas')
            <a href="{{ route('surat-masuk.create') }}"
               class="btn btn-primary">
                + Tambah Surat
            </a>
        @endif
    </div>

    <table class="table table-bordered">

        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Pengirim</th>
                <th>Perihal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($suratMasuk as $surat)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $surat->nomor_surat }}</td>
                    <td>{{ $surat->tanggal }}</td>
                    <td>{{ $surat->pengirim }}</td>
                    <td>{{ $surat->perihal }}</td>

                    <td>

                        {{-- Detail bisa diakses semua pengguna --}}
                        <a href="{{ route('surat-masuk.show', $surat->id) }}"
                           class="btn btn-info btn-sm">
                            Detail
                        </a>

                        {{-- Edit dan Hapus khusus Petugas --}}
                        @if(auth()->user()->role === 'petugas')

                            <a href="{{ route('surat-masuk.edit', $surat->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('surat-masuk.destroy', $surat->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus surat ini?')">
                                    Hapus
                                </button>

                            </form>

                        @endif

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        Belum ada data surat.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection
