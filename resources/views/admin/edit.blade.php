<?php
?>
@extends('layout.master_admin')

@section('content')
<div class="edit-container">
    <div class="edit-card">
        <h2 class="edit-title">Edit Produk</h2>

        <form action="{{ route('products-admin.update', $product->id) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" name="name" id="name" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label for="category">Kategori</label>
                <input type="text" name="category" id="category" value="{{ $product->category }}" required>
            </div>

            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" name="price" id="price" value="{{ $product->price }}" required>
            </div>

            <div class="form-group">
                <label for="stock_status">Status Stok</label>
                <select name="stock_status" id="stock_status" required>
                    <option value="Tersedia" {{ $product->stock_status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Habis" {{ $product->stock_status == 'Habis' ? 'selected' : '' }}>Habis</option>
                </select>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-update">Update</button>
                <a href="{{ route('products-admin.index') }}" class="btn btn-back">Kembali</a>
            </div>
        </form>
    </div>
</div>

<style>
    /* Pusatkan form di tengah layar */
    .edit-container {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #f8f9fa;
        padding: 20px;
    }

    /* Card form */
    .edit-card {
        background: #fff;
        padding: 40px 50px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
    }

    .edit-title {
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
        font-weight: 700;
        color: #198754;
    }

    /* Form */
    .edit-form .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    label {
        font-weight: 600;
        margin-bottom: 6px;
        color: #333;
    }

    input, select {
        padding: 10px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    input:focus, select:focus {
        border-color: #198754;
        box-shadow: 0 0 6px rgba(25, 135, 84, 0.3);
        outline: none;
    }

    /* Tombol */
    .button-group {
        display: flex;
        justify-content: space-between;
        gap: 15px;
        margin-top: 20px;
    }

    .btn {
        flex: 5;
        text-align: center;
        padding: 12px;
        font-size: 16px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-update {
        background-color: #198754;
        color: #fff;
        border: none;
    }

    .btn-update:hover {
        background-color: #157347;
        transform: translateY(-2px);
    }

    .btn-back {
        background-color: #f1f1f1;
        color: #333;
        border: 1px solid #ccc;
        text-decoration: none;
        display: inline-block;
    }

    .btn-back:hover {
        background-color: #6c757d;
        color: #fff;
        transform: translateY(-2px);
    }
</style>
@endsection
