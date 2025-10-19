@extends('layout.master')

@section('content')
<style>
    /* Mengatur dasar halaman */
    body {
        background-color: #f3f4f6; /* Latar belakang abu-abu muda */
        font-family: 'Inter', Arial, sans-serif;
        display: flex; /* Mengaktifkan flexbox untuk centering */
        justify-content: center; /* Centering horizontal */
        align-items: center; /* Centering vertikal */
        min-height: 100vh; /* Tinggi minimal agar centering bekerja */
        margin: 0;
    }

    /* Kotak form utama */
    .form-container {
        width: 100%;
        max-width: 500px; /* Lebar maksimal form */
        background: #fff;
        padding: 40px; /* Padding lebih besar untuk ruang napas */
        border-radius: 12px; /* Sudut lebih tumpul */
        border: 1px solid #d1d5db; /* Border hitam tipis (abu-abu tua) */
        box-shadow: 0 4px 12px rgba(0,0,0,0.08); /* Bayangan lebih halus */
    }

    /* Judul Form */
    .form-container h1 {
        text-align: center;
        color: #1f2937; /* Warna teks lebih gelap */
        font-size: 24px;
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 30px; /* Jarak bawah lebih besar */
    }

    /* Grup untuk setiap label dan input */
    .form-group {
        margin-bottom: 20px; /* Memberi jarak antar field */
    }

    /* Styling untuk label */
    .form-group label {
        display: block;
        margin-bottom: 8px; /* Jarak antara label dan input */
        font-weight: 600;
        color: #374151;
        font-size: 14px;
    }

    /* Styling untuk input dan select box */
    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 14px;
        color: #374151;
        background-color: #f9fafb; /* Latar input sedikit berbeda */
        transition: border-color 0.3s, box-shadow 0.3s;
        box-sizing: border-box; /* Pastikan padding tidak menambah lebar */
    }

    /* Efek saat input di-klik (focus) */
    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #3b82f6; /* Border biru saat aktif */
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }

    /* Tombol Simpan */
    .btn-submit {
        width: 100%;
        margin-top: 15px;
        padding: 12px;
        background-color: #16a34a; /* Warna hijau yang konsisten */
        border: none;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background-color: #15803d; /* Warna lebih gelap saat disentuh mouse */
    }
</style>

<div class="form-container">
    <h1>Tambah Produk</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="category">Kategori:</label>
            <input type="text" id="category" name="category" required>
        </div>

        <div class="form-group">
            <label for="price">Harga:</label>
            <input type="number" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="stock_status">Status Stok:</label>
            <select id="stock_status" name="stock_status">
                <option value="Tersedia">Tersedia</option>
                <option value="Habis">Habis</option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Simpan</button>
    </form>
</div>
@endsection