@extends('layout.master_admin')

@section('content')
<style>
    /* Mengatur dasar halaman */
    body {
        background-color: #f3f4f6;
        font-family: 'Inter', Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    /* Kotak form utama */
    .form-container {
        width: 100%;
        max-width: 500px;
        background: #fff;
        padding: 40px;
        border-radius: 12px;
        border: 1px solid #d1d5db;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    /* Judul Form */
    .form-container h1 {
        text-align: center;
        color: #1f2937;
        font-size: 24px;
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 30px;
    }

    /* Grup untuk setiap label dan input */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #374151;
        font-size: 14px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        color: #374151;
        background-color: #f9fafb;
        transition: border-color 0.3s, box-shadow 0.3s;
        box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }

    /* Tombol Simpan */
    .btn-submit {
        width: 100%;
        margin-top: 15px;
        padding: 12px;
        background-color: #f59e0b; /* Warna kuning untuk update */
        border: none;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background-color: #d97706;
    }
</style>

<div class="form-container">
    <h1>Edit Produk</h1>

    <form action="{{ route('products.update', $product['id']) }}" method="POST">
        @csrf
        @method('PUT') {{-- PENTING: Method untuk update adalah PUT --}}

        <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" id="name" name="name" value="{{ $product['name'] }}" required>
        </div>

        <div class="form-group">
            <label for="category">Kategori:</label>
            <input type="text" id="category" name="category" value="{{ $product['category'] }}" required>
        </div>

        <div class="form-group">
            <label for="price">Harga:</label>
            <input type="number" id="price" name="price" value="{{ $product['price'] }}" required>
        </div>

        <div class="form-group">
            <label for="stock_status">Status Stok:</label>
            <select id="stock_status" name="stock_status">
                <option value="Tersedia" {{ $product['stock_status'] == 'Tersedia' ? 'selected' : '' }}>
                    Tersedia
                </option>
                <option value="Habis" {{ $product['stock_status'] == 'Habis' ? 'selected' : '' }}>
                    Habis
                </option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Simpan Perubahan</button>
    </form>
</div>
@endsection
