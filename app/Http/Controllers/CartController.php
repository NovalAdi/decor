<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        // Ambil cart dari session atau buat default kalau belum ada
        $cartItems = $request->session()->get('cartItems', [
            ['id' => 1, 'nama' => 'Sofa', 'quantity' => 2, 'harga' => 2000000],
            ['id' => 2, 'nama' => 'Sofa Bed', 'quantity' => 1, 'harga' => 3500000],
            ['id' => 3, 'nama' => 'Meja Makan', 'quantity' => 1, 'harga' => 1500000],
        ]);

        // Hitung total
        $totalHargaCart = 0;
        foreach ($cartItems as &$item) {
            $item['total_harga'] = $item['harga'] * $item['quantity'];
            $totalHargaCart += $item['total_harga'];
        }

        // Simpan lagi ke session (update)
        $request->session()->put('cartItems', $cartItems);

        return view('page.cart', compact('cartItems', 'totalHargaCart'));
    }

    public function update(Request $request, $type, $id)
    {
        $cartItems = $request->session()->get('cartItems', []);

        foreach ($cartItems as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] += ($type === 'plus') ? 1 : -1;
                if ($item['quantity'] < 1) {
                    $item['quantity'] = 1;
                }
                $item['total_harga'] = $item['harga'] * $item['quantity'];
                break;
            }
        }

        $request->session()->put('cartItems', $cartItems);

        return redirect()->route('cart.index');
    }

    public function remove(Request $request, $id)
    {
        $cartItems = $request->session()->get('cartItems', []);

        $cartItems = array_filter($cartItems, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        $request->session()->put('cartItems', $cartItems);

        return redirect()->route('cart.index');
    }

    public function store(Request $request)
    {
        $cartItems = $request->session()->get('cartItems', [
            ['id' => 1, 'nama' => 'Sofa', 'quantity' => 2, 'harga' => 2000000],
            ['id' => 2, 'nama' => 'Sofa Bed', 'quantity' => 1, 'harga' => 3500000],
            ['id' => 3, 'nama' => 'Meja Makan', 'quantity' => 1, 'harga' => 1500000],
        ]);

        $lastId = !empty($cartItems) ? end($cartItems)['id'] : 0;
        $newId = $lastId + 1;

        $nama = $request->input('nama');
        $harga = $request->input('harga');

        $cartItems[] = [
            'id' => $newId,
            'nama' => $nama,
            'harga' => $harga,
            'quantity' => 1,
        ];

        $request->session()->put('cartItems', $cartItems);

        return redirect()->route('cart.index');
    }
}
