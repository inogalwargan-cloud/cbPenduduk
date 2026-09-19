<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Transaksi Iuran</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('iuran.update', $iuran->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700">Nama Penduduk</label>
                        <select name="penduduk_id" class="w-full border rounded p-2">
                            @foreach ($penduduk as $p)
                                <option value="{{ $p->id }}" {{ old('penduduk_id', $iuran->penduduk_id) == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }} (NIK: {{ $p->nik }})
                                </option>
                            @endforeach
                        </select>
                        @error('penduduk_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Bulan Pembayaran</label>
                        <input type="text" name="bulan" value="{{ old('bulan', $iuran->bulan) }}" class="w-full border rounded p-2">
                        @error('bulan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Jumlah Pembayaran (Rp)</label>
                        <input type="number" name="jumlah" value="{{ old('jumlah', $iuran->jumlah) }}" class="w-full border rounded p-2">
                        @error('jumlah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Tanggal Pembayaran</label>
                        <input type="date" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran', $iuran->tanggal_pembayaran) }}" class="w-full border rounded p-2">
                        @error('tanggal_pembayaran') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update Transaksi</button>
                    <a href="{{ route('iuran.index') }}" class="text-gray-600 ml-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>