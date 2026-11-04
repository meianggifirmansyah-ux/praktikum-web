
@extends('layout.app_blade')

@section('title', 'Detail Surat Keluar')
@section('heading', 'Detail Surat Keluar')

@section('content')

<div class="card p-4">

    <div class="d-flex justify-content-between mb-4">
        <h5 class="fw-bold">
            <i class="bi bi-envelope-paper"></i>
            Detail Surat Keluar
        </h5>

        <span class="badge bg-primary">
            Surat Keluar
        </span>
    </div>

    <table class="table table-bordered">
        <tr>
            <th width="200">Nomor Surat</th>
            <td>{{ $surat->nomor_surat }}</td>
        </tr>

        <tr>
            <th>Tanggal Surat</th>
            <td>{{ \Carbon\Carbon::parse($surat->tanggal)->format('d-m-Y') }}</td>
        </tr>

        <tr>
            <th>Tujuan Surat</th>
            <td>{{ $surat->tujuan }}</td>
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
        <a href="{{ route('surat-keluar.edit', $surat->id) }}"
           class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a>

        <a href="{{ route('surat-keluar.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </div>

</div>

@endsection
