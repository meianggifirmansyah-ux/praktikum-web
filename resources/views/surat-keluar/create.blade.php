
@extends('layout.app_blade')

@section('title', 'Tambah Surat Keluar')
@section('heading', 'Tambah Surat Keluar')

@section('content')

<div class="card p-4">

    <h5 class="fw-bold mb-1">Form Tambah Surat Keluar</h5>
    <p class="text-secondary">
        Masukkan informasi surat keluar dengan lengkap.
    </p>

    <form action="{{ route('surat-keluar.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Nomor Surat</label>
            <input type="text"
                   name="nomor_surat"
                   class="form-control"
                   value="{{ old('nomor_surat') }}"
                   placeholder="Contoh: 001/SM/2026"
                   required>
            @error('nomor_surat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Surat</label>
            <input type="date"
                   name="tanggal"
                   class="form-control"
                   value="{{ old('tanggal') }}"
                   required>
            @error('tanggal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tujuan Surat</label>
            <input type="text"
                   name="tujuan"
                   class="form-control"
                   value="{{ old('tujuan') }}"
                   placeholder="Masukkan tujuan surat"
                   required>
            @error('tujuan')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Perihal</label>
            <input type="text"
                   name="perihal"
                   class="form-control"
                   value="{{ old('perihal') }}"
                   placeholder="Masukkan perihal surat"
                   required>
            @error('perihal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan"
                      class="form-control"
                      rows="4"
                      placeholder="Tambahkan keterangan surat">{{ old('keterangan') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Simpan Surat
        </button>

        <a href="{{ route('surat-keluar.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>
</div>

@endsection
