@extends('layouts.app')
@section('title', 'Tambah User')
@section('content')

<div class="container py-4">
    <div class="card shadow border-0" style="max-width: 600px; margin: 0 auto;">
        <div class="card-header text-white" style="background-color: #212121;">
            <h5 class="mb-0">➕ Tambah User Baru</h5>
        </div>
        <div class="card-body" style="background-color: #f5f5f5;">
            <form action="{{ route('user-management.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold">Nama</label>
                    <input type="text" class="form-control" name="name"
                        placeholder="Masukkan nama..." required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">NPM</label>
                    <input type="text" class="form-control" name="npm"
                        placeholder="Masukkan NPM..." required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Kelas</label>
                    <select class="form-select" name="kelas_id" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-dark">➕ Tambah</button>
                    <a href="{{ route('user-management.index') }}"
                        class="btn btn-secondary">← Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection