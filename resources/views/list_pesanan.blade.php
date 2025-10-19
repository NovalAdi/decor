<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-4">
        <h2 class="mb-4 text-center">📦 Daftar Pesanan</h2>

        @if (!empty($pesananList) && count($pesananList) > 0)
            @foreach ($pesananList as $index => $pesanan)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan #{{ $index + 1 }}</h5>
                        <p><strong>Alamat:</strong> {{ $pesanan['alamat_pengiriman'] }}</p>
                        <ul>
                            @foreach ($pesanan['produk'] as $item)
                                <li>{{ $item['nama'] }} ({{ $item['jumlah'] }}x) - Rp
                                    {{ number_format($item['harga'], 0, ',', '.') }}</li>
                            @endforeach
                        </ul>
                        <p><strong>Total Harga:</strong> Rp {{ number_format($pesanan['total_harga'], 0, ',', '.') }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning text-center">Belum ada pesanan yang dibuat.</div>
        @endif

        <div class="text-center mb-4">
            <a href="{{ route('checkout.index') }}" class="btn btn-secondary">Kembali ke Checkout</a>
            <a href="{{ route('pesanan.hapus') }}" class="btn btn-danger">Hapus Semua Pesanan</a>
        </div>
    </div>
</body>

</html>