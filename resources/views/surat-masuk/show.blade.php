
@extends('layouts.app')

@section('title', 'Detail Surat')
@section('heading', 'Detail Surat Masuk')

@section('content')

<div class="card p-4">
    <h5 class="mb-4">
        <i class="bi bi-envelope-open text-primary"></i>
        Informasi Surat
    </h5>

    <table class="table">
        <tr>
            <th width="200">Nomor Surat</th>
            <td>{{ $surat->nomor_surat }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $surat->tanggal }}</td>
        </tr>
        <tr>
            <th>Pengirim</th>
            <td>{{ $surat->pengirim }}</td>
        </tr>
        <tr>
            <th>Perihal</th>
            <td>{{ $surat->perihal }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $surat->keterangan ?? '-' }}</td>
        </tr>
    </table>

    <div>
        <a href="{{ route('surat-masuk.edit', $surat->id) }}"
           class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>

        <a href="{{ route('surat-masuk.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>

@endsection
