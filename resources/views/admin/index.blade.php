@extends('layout.master')

@section('content')

<style>
    /* Mengimpor font dari Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    body {
        background-color: #ffffff; 
        font-family: 'Inter', Arial, sans-serif;
        color: #374151;
        margin: 0;
    }

    .container {
        /* PERUBAHAN: max-width dihapus agar container bisa memanjang */
        /* PERUBAHAN: margin diatur agar tidak ada jarak di kiri dan kanan */
        margin: 10px 0; 
        /* PERUBAHAN: padding disesuaikan untuk memberi ruang napas di sisi halaman */
        padding: 10px 20px; 
        box-sizing: border-box; /* Memastikan padding tidak menambah lebar total */
    }

    .header {
        margin-bottom: 50px;
    }

    .header h1 {
        font-size: 28px;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 25px;
    }

    .btn-tambah {
        background-color: #3b82f6;
        color: white;
        padding: 10px 18px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: background-color 0.3s, transform 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-tambah:hover {
        background-color: #2563eb;
        transform: translateY(-2px);
    }
    
    .search-bar input {
        padding: 10px 16px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        width: 280px;
        font-size: 14px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .search-bar input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    /* Header Tabel */
    th {
        background-color: #f9fafb;
        color: #6b7280;
        text-align: left;
        padding: 14px 16px;
        font-weight: 600;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        /* PERUBAHAN: Garis bawah pada header dihapus agar tidak double */
        border-bottom: 1px solid #e5e7eb; 
    }

    /* Sel Tabel (data) */
    td {
        padding: 16px;
        font-size: 14px;
        color: #374151;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: middle;
    }

    tr:last-child td {
        border-bottom: none;
    }
    
    tr:hover {
        background-color: #f9fafb;
    }
    
    img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
    }

    .badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 9999px;
        font-size: 12px;
        font-weight: 600;
        text-align: center;
    }

    .badge.tersedia {
        background-color: #dcfce7;
        color: #166534;
    }

    .badge.habis {
        background-color: #fee2e2;
        color: #b91c1c;
    }

    .actions {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .btn-aksi {
        padding: 7px 14px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        color: white;
        transition: opacity 0.3s;
    }
    .btn-aksi:hover {
        opacity: 0.85;
    }

    .btn-edit {
        color: #92400e;
        background-color: #fef3c7;
    }

    .btn-delete {
        color: #b91c1c;
        background-color: #fee2e2;
    }
</style>
<div class="container">
    <div class="header">
        <h1>Kelola Produk</h1>
    </div>

    <div class="top-bar">
        <a href="{{ route('products.create') }}" class="btn-tambah">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
            Tambah Produk
        </a>
        <div class="search-bar">
            <input type="text" placeholder="Cari produk...">
        </div>
    </div>

    <div style="margin-top: 25px; overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['category'] }}</td>
                    <td>Rp{{ number_format($product['price'], 0, ',', '.') }}</td>
                    <td>
                        @if($product['stock_status'] == 'Tersedia')
                            <span class="badge tersedia">Tersedia</span>
                        @else
                            <span class="badge habis">Stok Habis</span>
                        @endif
                    </td>
                    <td class="actions">
                        <a href="{{ route('products.edit', $product['id']) }}" class="btn-aksi btn-edit">Edit</a>
                        <form action="{{ route('products.destroy', $product['id']) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-aksi btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection