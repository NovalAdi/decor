<?php
?>
@extends('layout.master_admin')

@section('content')
<div class="card p-4">
    <h2 class="mb-4 fw-bold">Tambah Produk</h2>

    <form action="{{ route('products-admin.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <input type="text" name="category" id="category" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="stock_status" class="form-label">Status Stok</label>
            <select name="stock_status" id="stock_status" class="form-select" required>
                <option value="Tersedia">Tersedia</option>
                <option value="Habis">Habis</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('products-admin.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
