<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Catat Pembayaran Iuran</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('iuran.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Pilih Penduduk</label>
                        <select name="penduduk_id" class="w-full border rounded p-2">
                            <option value="">-- Pilih Penduduk --</option>
                            @foreach ($penduduk as $p)
                                <option value="{{ $p->id }}" {{ old('penduduk_id') == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }} (NIK: {{ $p->nik }})
                                </option>
                            @endforeach
                        </select>
                        @error('penduduk_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Bulan Pembayaran</label>
                        <input type="text" name="bulan" placeholder="Contoh: Juni 2026" value="{{ old('bulan') }}" class="w-full border rounded p-2">
                        @error('bulan') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Jumlah Pembayaran (Rp)</label>
                        <input type="number" name="jumlah" value="{{ old('jumlah', 40000) }}" class="w-full border rounded p-2">
                        @error('jumlah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Tanggal Pembayaran</label>
                        <input type="date" name="tanggal_pembayaran" value="{{ old('tanggal_pembayaran', date('Y-m-d')) }}" class="w-full border rounded p-2">
                        @error('tanggal_pembayaran') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Transaksi</button>
                    <a href="{{ route('iuran.index') }}" class="text-gray-600 ml-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>