
@extends('layout.app_blade')

@section('title', 'Edit Surat Keluar')
@section('heading', 'Edit Surat Keluar')

@section('content')

<div class="card p-4">

    <h5 class="fw-bold mb-3">Form Edit Surat Keluar</h5>

    <form action="{{ route('surat-keluar.update', $surat->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nomor Surat</label>
            <input type="text"
                   name="nomor_surat"
                   class="form-control"
                   value="{{ old('nomor_surat', $surat->nomor_surat) }}"
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
                   value="{{ old('tanggal', $surat->tanggal) }}"
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
                   value="{{ old('tujuan', $surat->tujuan) }}"
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
                   value="{{ old('perihal', $surat->perihal) }}"
                   required>
            @error('perihal')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan"
                      class="form-control"
                      rows="4">{{ old('keterangan', $surat->keterangan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Update Surat
        </button>

        <a href="{{ route('surat-keluar.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>
</div>

@endsection
