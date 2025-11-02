<?php
?>
@extends('layout.master_admin')

@section('content')
<div class="card p-4">
    <h2 class="mb-4">Kelola Produk</h2>

    <div class="d-flex justify-content-between mb-3 flex-wrap gap-2">
        <a href="{{ route('products-admin.create') }}" class="btn btn-success">+ Tambah Produk</a>
        <input type="text" class="form-control w-auto" placeholder="Cari produk...">
    </div>

    <table class="table table-bordered table-hover align-middle text-center">
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
            @foreach($products as $p)
            <tr>
                <td>{{ $p->name }}</td>
                <td>{{ $p->category }}</td>
                <td>Rp{{ number_format($p->price, 0, ',', '.') }}</td>
                <td>{{ $p->stock_status }}</td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('products-admin.edit', $p->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('products-admin.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
