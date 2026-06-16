@extends('layouts.app')
@section('content')
    <h1>User Management</h1>
    <p>ini adalah halaman user management</p>
    <a class="btn btn-primary" href="{{ route('user-management.create') }}">Tambah User</a>

    <table border="1" cellpadding="10" style="margin: 0 auto;">
        <tr style="background-color: #0000ff;">
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->npm }}</td>
                <td>{{ $user->nama_kelas }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $user->id }}">Edit</button>
                    <form action="{{ route('user-management.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    @foreach ($users as $user)
    <!-- Modal -->
    <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel{{ $user->id }}">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user-management.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="npm" class="form-label">NPM</label>
                            <input type="text" class="form-control" id="npm" name="npm" value="{{ $user->npm }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kelas_id" class="form-label">Kelas</label>
                            <select class="form-select" id="kelas_id" name="kelas_id">
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}" {{ $k->id == $user->kelas_id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection