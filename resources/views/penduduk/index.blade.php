<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Penduduk
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('penduduk.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">+ Tambah Penduduk</a>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">NIK</th>
                            <th class="border p-2">Nama</th>
                            <th class="border p-2">JK</th>
                            <th class="border p-2">Alamat</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penduduk as $item)
                            <tr>
                                <td class="border p-2 text-center">{{ $item->nik }}</td>
                                <td class="border p-2">{{ $item->nama }}</td>
                                <td class="border p-2 text-center">{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td class="border p-2">{{ $item->alamat }}</td>
                                <td class="border p-2 text-center">
                                    <a href="{{ route('penduduk.edit', $item->id) }}" class="text-yellow-600 font-bold mr-2">Edit</a>
                                    <form action="{{ route('penduduk.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin hapus?')" class="text-red-600 font-bold">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border p-4 text-center text-gray-500">Belum ada data penduduk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $penduduk->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>