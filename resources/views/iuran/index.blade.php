<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Iuran Warga
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('iuran.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">+ Catat Pembayaran Iuran</a>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">Nama Penduduk</th>
                            <th class="border p-2">NIK</th>
                            <th class="border p-2">Bulan Pembayaran</th>
                            <th class="border p-2">Jumlah Pembayaran</th>
                            <th class="border p-2">Tanggal Bayar</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($iuran as $item)
                            <tr>
                                <td class="border p-2 font-semibold">{{ $item->penduduk->nama }}</td>
                                <td class="border p-2 text-center">{{ $item->penduduk->nik }}</td>
                                <td class="border p-2 text-center">{{ $item->bulan }}</td>
                                <td class="border p-2 text-right">Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                <td class="border p-2 text-center">{{ \Carbon\Carbon::parse($item->tanggal_pembayaran)->format('d-m-Y') }}</td>
                                <td class="border p-2 text-center">
                                    <a href="{{ route('iuran.edit', $item->id) }}" class="text-yellow-600 font-bold mr-2">Edit</a>
                                    <form action="{{ route('iuran.destroy', $item->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin hapus transaksi iuran ini?')" class="text-red-600 font-bold">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border p-4 text-center text-gray-500">Belum ada transaksi iuran warga.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $iuran->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>