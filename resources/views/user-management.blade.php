@extends('layouts.app')
@section('title', 'User Management')
@section('content')

<div class="container py-4">
    <div class="card shadow border-0">
        <div class="card-header text-white d-flex justify-content-between align-items-center"
            style="background-color: #212121;">
            <h4 class="mb-0">👥 User Management</h4>
            <a href="{{ route('user-management.create') }}" class="btn btn-outline-light btn-sm">
                ➕ Tambah User
            </a>
        </div>
        <div class="card-body" style="background-color: #f5f5f5;">

            {{-- Alert sukses --}}
            @if(session('success'))
                <div class="alert alert-secondary alert-dismissible fade show border-0 shadow-sm" role="alert"
                    style="background-color: #e0e0e0; color: #212121;">
                    ✅ {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Search --}}
            <form method="GET" action="{{ route('user-management.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control border-secondary"
                        placeholder="Cari nama, NPM, atau kelas..."
                        value="{{ $search }}"
                        style="background-color: #fff;">
                    <button class="btn btn-dark" type="submit">🔍 Cari</button>
                    @if($search)
                        <a href="{{ route('user-management.index') }}" class="btn btn-secondary">✖ Reset</a>
                    @endif
                </div>
            </form>

            {{-- Tabel --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead style="background-color: #212121; color: #fff;">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #fff;">
                        @forelse ($users as $index => $user)
                            <tr>
                                <td>{{ $users->firstItem() + $index }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->npm }}</td>
                                <td>
                                    <span class="badge"
                                        style="background-color: #616161; color: #fff;">
                                        {{ $user->nama_kelas }}
                                    </span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $user->id }}">
                                        ✏️ Edit
                                    </button>
                                    <form action="{{ route('user-management.destroy', $user->id) }}"
                                        method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-dark btn-sm" type="submit">🗑️ Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Tidak ada data user.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Paginasi --}}
            <div class="d-flex justify-content-center">
                {{ $users->appends(['search' => $search])->links() }}
            </div>

        </div>
    </div>
</div>

{{-- Modal Edit --}}
@foreach ($users as $user)
<div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow">
            <div class="modal-header text-white" style="background-color: #212121;">
                <h5 class="modal-title">✏️ Edit User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="background-color: #f5f5f5;">
                <form action="{{ route('user-management.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">NPM</label>
                        <input type="text" class="form-control" name="npm"
                            value="{{ $user->npm }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Kelas</label>
                        <select class="form-select" name="kelas_id">
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}"
                                    {{ $k->id == $user->kelas_id ? 'selected' : '' }}>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-dark">💾 Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection