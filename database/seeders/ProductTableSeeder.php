<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();
        $paths = ['assets/images/laptop.png', 'assets/images/product.png', 'assets/images/product2.png'];
        $folder = "faker/products/";
        for ($i = 1; $i <= 50; $i++) {
            $item = [
                'name'     => "Product " . $i,
                'price'    => rand(1, 20) * 1000,
                'status'   => $i % 2 ? 0 : 1,
                'path'     => $paths[rand(0, 2)],
            ];
            if ($file = saveFileFaker($item['path'], $folder, Str::slug($item['name']))) {
                $item['image'] = $file;
            }
            unset($item['path']);
            Product::create($item);
        }
    }
}

// php artisan db:seed --class=\\Database\\Seeders\\ProductTableSeeder