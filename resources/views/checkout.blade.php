<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <h3 class="text-center mb-4">🛒 Checkout</h3>

            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Produk</th>
                        <th class="text-end">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{ $item['nama'] }}</td>
                            <td class="text-end">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr class="table-secondary fw-bold">
                        <td>Total</td>
                        <td class="text-end">Rp {{ number_format($total, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>

            <form method="POST" action="{{ route('checkout.store') }}" class="mt-4">
                @csrf
                <div class="mb-3">
                    <label for="alamat" class="form-label fw-semibold">Alamat Pengiriman</label>
                    <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap..." required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success px-4 py-2 rounded-pill">
                        Konfirmasi Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
