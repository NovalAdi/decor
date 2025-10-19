<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public $cart = [
        ['nama' => 'Kursi', 'harga' => 150000, 'jumlah' => 2],
        ['nama' => 'Meja', 'harga' => 300000, 'jumlah' => 1],
        ['nama' => 'Lemari', 'harga' => 500000, 'jumlah' => 1],
    ];

    public $pesanan = [];

    public function index()
    {
        $total = array_sum(array_column($this->cart, 'harga'));

        return view('checkout', ['cart' => $this->cart, 'total' => $total]);
    }

    public function store(Request $request)
    {
        $alamat = $request->input('alamat');

        $pesanan = [
            'produk' => $this->cart,
            'total_harga' => 0,
            'alamat_pengiriman' => $alamat,
        ];

        foreach ($this->cart as $key => $value) {
            $pesanan['total_harga'] += $value['harga'] * $value['jumlah'];
        }

        $pesananList[] = $pesanan;
        session(['pesanan' => $pesananList]);

        return view('checkout_konfirmasi', ['pesanan' => $pesanan]);

    }

    public function listPesanan()
    {
        $pesananList = session('pesanan', []);
        return view('list_pesanan', ['pesananList' => $pesananList]);
    }

    public function clearPesanan()
    {
        session()->forget('pesanan');
        return redirect()->route('pesanan.list')->with('success', 'Daftar pesanan telah dikosongkan.');
    }

}
