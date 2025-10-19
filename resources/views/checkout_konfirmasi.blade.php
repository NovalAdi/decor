<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white text-center">
                ✅ Pesanan Berhasil Dibuat
            </div>
            <div class="card-body">
                <h5 class="mb-3">Alamat Pengiriman:</h5>
                <p>{{ $pesanan['alamat_pengiriman'] }}</p>

                <h5 class="mt-4">Detail Produk:</h5>
                <ul class="list-group mb-3">
                    @foreach ($pesanan['produk'] as $produk)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $produk['nama'] }} (x{{ $produk['jumlah'] }})
                            <span>Rp {{ number_format($produk['harga'] * $produk['jumlah'], 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                </ul>

                <h5 class="text-end text-success">
                    Total: Rp {{ number_format($pesanan['total_harga'], 0, ',', '.') }}
                </h5>
                
                <div class="d-flex justify-content-center mt-4 gap-3">
                    <a href="{{ route('checkout.index') }}" class="btn btn-secondary">Kembali ke Checkout</a>
                    <a href="{{ route('pesanan.list') }}" class="btn btn-success">Lihat Daftar Pesanan</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>