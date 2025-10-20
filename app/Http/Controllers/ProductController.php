<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = [
            ['id' => 1, 'nama' => 'Kursi Minimalis', 'harga' => 750000,  'rating' => 4.8, 'review' => 120],
            ['id' => 2, 'nama' => 'Meja Kayu kur', 'harga' => 1250000, 'rating' => 4.6, 'review' => 85],
            ['id' => 3, 'nama' => 'Lemari Pakaian', 'harga' => 1850000, 'rating' => 4.7, 'review' => 60],
            ['id' => 4, 'nama' => 'Sofa Bed', 'harga' => 3500000, 'rating' => 4.9, 'review' => 150],
        ];

        return view('page.product', [
            'products' => $products,
            'keyword' => '',
        ]);
    }

    public function search(Request $request)
    {
        $keyword = strtolower(trim($request->input('search_query', '')));

        $products = [
            ['id' => 1, 'nama' => 'Kursi Minimalis', 'harga' => 750000,  'rating' => 4.8, 'review' => 120],
            ['id' => 2, 'nama' => 'Meja Kayu kur', 'harga' => 1250000, 'rating' => 4.6, 'review' => 85],
            ['id' => 3, 'nama' => 'Lemari Pakaian', 'harga' => 1850000, 'rating' => 4.7, 'review' => 60],
            ['id' => 4, 'nama' => 'Sofa Bed', 'harga' => 3500000, 'rating' => 4.9, 'review' => 150],
        ];

        if (empty($keyword)) {
            return redirect()->route('product.index');
        }

        $filtered = array_filter($products, function ($product) use ($keyword) {
            return str_contains(strtolower($product['nama']), $keyword);
        });

        return view('page.product', [
            'products' => $filtered,
            'keyword' => $keyword,
        ]);
    }


    public function show($id)
    {
        // Contoh data dummy (bisa diganti dari database nanti)
        $products = [
            [
                'id' => 1,
                'nama' => 'Kursi Minimalis',
                'harga' => 750000,
                'rating' => 4.8,
                'review' => 120,
                'deskripsi' => 'Kursi bergaya minimalis dengan rangka kayu solid dan bantalan empuk, cocok untuk ruang tamu modern.'
            ],
            [
                'id' => 2,
                'nama' => 'Meja Kayu kur',
                'harga' => 1250000,
                'rating' => 4.6,
                'review' => 85,
                'deskripsi' => 'Meja kayu serbaguna dengan desain klasik dan permukaan halus, ideal untuk ruang makan atau kerja.'
            ],
            [
                'id' => 3,
                'nama' => 'Lemari Pakaian',
                'harga' => 1850000,
                'rating' => 4.7,
                'review' => 60,
                'deskripsi' => 'Lemari pakaian dua pintu dengan rak dan gantungan luas, terbuat dari bahan berkualitas tinggi.'
            ],
            [
                'id' => 4,
                'nama' => 'Sofa Bed',
                'harga' => 3500000,
                'rating' => 4.9,
                'review' => 150,
                'deskripsi' => 'Sofa multifungsi yang dapat dijadikan tempat tidur, dirancang untuk kenyamanan maksimal dan ruang minimal.'
            ],
        ];


        // Ambil produk berdasarkan ID
        $product = $products[$id-1] ?? null;

        return view('page.detail_product', compact('product'));
    }
}
