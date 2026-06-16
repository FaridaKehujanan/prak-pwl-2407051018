<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            👥 User Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                            ✅ {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4 flex justify-between items-center">
                        <form method="GET" action="{{ route('user-management.index') }}" class="flex gap-2">
                            <input type="text" name="search" class="border rounded px-3 py-1"
                                placeholder="Cari nama, NPM..."
                                value="{{ $search ?? '' }}">
                            <button class="bg-gray-800 text-white px-3 py-1 rounded" type="submit">🔍 Cari</button>
                            @if(!empty($search))
                                <a href="{{ route('user-management.index') }}" class="bg-gray-400 text-white px-3 py-1 rounded">✖ Reset</a>
                            @endif
                        </form>
                        <a href="{{ route('user-management.create') }}" class="bg-gray-800 text-white px-3 py-1 rounded">
                            ➕ Tambah User
                        </a>
                    </div>

                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="border p-2">No</th>
                                <th class="border p-2">Nama</th>
                                <th class="border p-2">NPM</th>
                                <th class="border p-2">Kelas</th>
                                <th class="border p-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $index => $user)
                                <tr class="hover:bg-gray-100">
                                    <td class="border p-2 text-center">{{ $users->firstItem() + $index }}</td>
                                    <td class="border p-2">{{ $user->name }}</td>
                                    <td class="border p-2">{{ $user->npm }}</td>
                                    <td class="border p-2">{{ $user->nama_kelas }}</td>
                                    <td class="border p-2 text-center">
                                        <a href="{{ route('user-management.edit', $user->id) }}"
                                            class="bg-blue-500 text-white px-2 py-1 rounded text-sm">✏️ Edit</a>
                                        <form action="{{ route('user-management.destroy', $user->id) }}"
                                            method="POST" class="inline"
                                            onsubmit="return confirm('Yakin hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-500 text-white px-2 py-1 rounded text-sm">🗑️ Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border p-2 text-center text-gray-500">Tidak ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $users->appends(['search' => $search ?? ''])->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>