<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        if (!session()->has('products')) {
            // DIUBAH: Kunci 'image' dihapus dari data awal
            $initialProducts = [
                ['id' => 1, 'name' => 'Meja Kayu', 'category' => 'Furniture', 'price' => 500000,'stock_status' => 'Tersedia'],
                ['id' => 2, 'name' => 'Kursi Putar', 'category' => 'Furniture', 'price' => 300000, 'stock_status' => 'Tersedia'],
                ['id' => 3, 'name' => 'Lemari Pakaian', 'category' => 'Furniture', 'price' => 1200000, 'stock_status' => 'Tersedia'],
            ];
            session(['products' => $initialProducts]);
        }
    }

    public function index()
    {
        $products = session('products', []); 
        return view('admin.index', compact('products'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $products = session('products', []);
        $newId = count($products) > 0 ? max(array_column($products, 'id')) + 1 : 1;

        // DIUBAH: Kunci 'image' dihapus dari produk baru
        $newProduct = [
            'id' => $newId,
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'stock_status' => $request->stock_status
        ];

        $products[] = $newProduct; 
        session(['products' => $products]); 

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $products = session('products', []);
        $productToEdit = null;

        foreach ($products as $product) {
            if ($product['id'] == $id) {
                $productToEdit = $product;
                break;
            }
        }

        if ($productToEdit) {
            return view('admin.edit', ['product' => $productToEdit]);
        }
        return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan');
    }

    public function update(Request $request, $id)
    {
        $products = session('products', []);

        foreach ($products as $key => &$product) {
            if ($product['id'] == $id) {
                $product['name'] = $request->name;
                $product['category'] = $request->category;
                $product['price'] = $request->price;
                $product['stock_status'] = $request->stock_status;
                // DIUBAH: Baris untuk 'image' sudah dipastikan tidak ada
                break;
            }
        }

        session(['products' => $products]);
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id) 
    { //function ini berguna untuk menghapus produk berdasarkan id
        $products = session('products', []);
        foreach ($products as $key => $product) {
            if ($product['id'] == $id) {
                unset($products[$key]);
                break;
            }
        }
        session(['products' => $products]);
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}