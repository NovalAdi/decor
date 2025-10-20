@extends('layout.master')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-24">
        {{-- Bagian Utama Produk --}}
        <div class="grid md:grid-cols-2 gap-10 bg-white rounded-2xl shadow p-6">
            {{-- Gambar Produk --}}
            <div>
                <div class="w-full h-[400px] bg-gray-300 rounded-xl flex items-center justify-center">
                    🪑
                </div>
            </div>

            {{-- Detail Produk --}}
            <div class="flex flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-3">{{ $product['nama'] }}</h1>
                    <p class="text-2xl font-semibold text-amber-700 mb-5">
                        Rp {{ number_format($product['harga'], 0, ',', '.') }}
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        {{ $product['deskripsi'] ?? 'Tidak ada deskripsi untuk produk ini.' }}
                    </p>
                </div>

                {{-- Tombol Add to Cart --}}
                <form action="{{ route('cart.add') }}" method="POST" class="mt-6">
                    @csrf
                    @csrf
                    <input type="hidden" name="nama" value="{{ $product['nama'] }}">
                    <input type="hidden" name="harga" value="{{ $product['harga'] }}">
                    <button type="submit"
                        class="w-full py-3 bg-amber-700 hover:bg-amber-800 text-white font-medium rounded-full transition">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>

        {{-- Rekomendasi Produk --}}
        @if (isset($recommendations) && count($recommendations) > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-bold mb-6">Produk Rekomendasi</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
                    @foreach ($recommendations as $item)
                        <a href="{{ route('product.show', $item['id']) }}"
                            class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                            <img src="{{ asset('img/upload/' . $item['gambar']) }}" alt="{{ $item['nama'] }}"
                                class="w-full h-48 object-cover bg-gray-100">
                            <div class="p-4">
                                <h3 class="font-semibold line-clamp-2">{{ $item['nama'] }}</h3>
                                <p class="text-amber-700 font-bold mt-2">
                                    Rp {{ number_format($item['harga'], 0, ',', '.') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
