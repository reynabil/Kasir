<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class produk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produks')->insert([
            'picture' => '1715622245.jpg',
            'name' => 'Mie Gacoan',
            'price' => '10000',
        ]);
        DB::table('produks')->insert([
            'picture' => '1715645530.jpg',
            'name' => 'Ayam Geprek',
            'price' => '12000',
        ]);
    }
}
