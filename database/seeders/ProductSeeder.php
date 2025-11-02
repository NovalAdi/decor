<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            ['name' => 'Meja Kayu', 'category' => 'Furniture', 'price' => 500000, 'stock_status' => 'Tersedia'],
            ['name' => 'Kursi Putar', 'category' => 'Furniture', 'price' => 300000, 'stock_status' => 'Tersedia'],
            ['name' => 'Lemari Pakaian', 'category' => 'Furniture', 'price' => 1200000, 'stock_status' => 'Tersedia'],
        ]);
    }
}
