<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            ➕ Tambah User Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>❌ {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user-management.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-gray-700 dark:text-gray-300">Nama</label>
                            <input type="text" 
                                class="w-full border border-gray-300 rounded px-3 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                                name="name" placeholder="Masukkan nama..." required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-gray-700 dark:text-gray-300">NPM</label>
                            <input type="text" 
                                class="w-full border border-gray-300 rounded px-3 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                                name="npm" placeholder="Masukkan NPM..." required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" 
                                class="w-full border border-gray-300 rounded px-3 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                                name="email" placeholder="Masukkan email..." required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-gray-700 dark:text-gray-300">Password</label>
                            <input type="password" 
                                class="w-full border border-gray-300 rounded px-3 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-gray-400"
                                name="password" placeholder="Masukkan password..." required>
                        </div>
                        <div class="mb-4">
                            <label class="block font-bold mb-1 text-gray-700 dark:text-gray-300">Kelas</label>
                            <select class="w-full border border-gray-300 rounded px-3 py-2 text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-gray-400" 
                                name="kelas_id" required>
                                <option value="">-- Pilih Kelas --</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex gap-2">
                            <button type="submit"
                                class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">➕ Tambah</button>
                            <a href="{{ route('user-management.index') }}"
                                class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">← Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>