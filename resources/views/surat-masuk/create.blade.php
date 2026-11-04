
@extends('layouts.app')

@section('title', 'Tambah Surat')
@section('heading', 'Tambah Surat Masuk')

@section('content')

<div class="card p-4">
    <h5 class="mb-4">Formulir Surat Masuk</h5>

    <form action="{{ route('surat-masuk.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nomor Surat</label>
            <input type="text" name="nomor_surat"
                   class="form-control"
                   value="{{ old('nomor_surat') }}"
                   placeholder="Contoh: 001/ADM/XI/2026" required>
            @error('nomor_surat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Surat</label>
            <input type="date" name="tanggal"
                   class="form-control"
                   value="{{ old('tanggal') }}" required>
            @error('tanggal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Pengirim</label>
            <input type="text" name="pengirim"
                   class="form-control"
                   value="{{ old('pengirim') }}" required>
            @error('pengirim')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Perihal</label>
            <input type="text" name="perihal"
                   class="form-control"
                   value="{{ old('perihal') }}" required>
            @error('perihal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control"
                      rows="3">{{ old('keterangan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan Surat
        </button>

        <a href="{{ route('surat-masuk.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>

@endsection
