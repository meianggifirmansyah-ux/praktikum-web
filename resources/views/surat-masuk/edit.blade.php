
@extends('layouts.app')

@section('title', 'Edit Surat')
@section('heading', 'Edit Surat Masuk')

@section('content')

<div class="card p-4">
    <h5 class="mb-4">Perbarui Data Surat</h5>

    <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nomor Surat</label>
            <input type="text" name="nomor_surat" class="form-control"
                   value="{{ old('nomor_surat', $surat->nomor_surat) }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Surat</label>
            <input type="date" name="tanggal" class="form-control"
                   value="{{ old('tanggal', $surat->tanggal) }}" required>
        </div>

        <div class="mb-3">
            <label>Pengirim</label>
            <input type="text" name="pengirim" class="form-control"
                   value="{{ old('pengirim', $surat->pengirim) }}" required>
        </div>

        <div class="mb-3">
            <label>Perihal</label>
            <input type="text" name="perihal" class="form-control"
                   value="{{ old('perihal', $surat->perihal) }}" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"
                      rows="3">{{ old('keterangan', $surat->keterangan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Update Surat
        </button>

        <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

@endsection
