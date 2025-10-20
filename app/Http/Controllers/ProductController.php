<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            ['id' => 1, 'nama' => 'Kursi Minimalis', 'harga' => 750000,  'rating' => 4.8, 'review' => 120],
            ['id' => 2, 'nama' => 'Meja Kayu', 'harga' => 1250000, 'rating' => 4.6, 'review' => 85],
            // tambahkan produk lain...
        ];
        return view('page.product', ['products' => $products]);
    }

    public function show($id)
    {
        // Contoh data dummy (bisa diganti dari database nanti)
        $products = [
            1 => [
                'id' => 1,
                'nama' => 'Kursi Minimalis',
                'harga' => 750000,
                'deskripsi' => 'Kursi bergaya minimalis dengan bahan kayu jati dan dudukan empuk. Cocok untuk ruang tamu atau kantor.',
                'gambar' => 'kursi1.jpg'
            ],
            2 => [
                'id' => 2,
                'nama' => 'Meja Kayu',
                'harga' => 1250000,
                'deskripsi' => 'Meja kerja modern dengan desain elegan dan banyak ruang penyimpanan.',
                'gambar' => 'meja1.jpg'
            ]
        ];

        // Ambil produk berdasarkan ID
        $product = $products[$id] ?? null;

        return view('page.detail_product', compact('product'));
    }
}
