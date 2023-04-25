<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $products = [
            [
                'name' =>json_encode([
                    'en'=>"clothes",
                    'ar'=>"ملابس",
                ],JSON_UNESCAPED_UNICODE),
                'content' => json_encode([
                    'en'=>"tittititit",
                    'ar'=>"قتتتتتتتق24ق4ق2ق",
                ],JSON_UNESCAPED_UNICODE),
                'image' => 'tshirt.jpg',
                'salary' => 25.0,
                'sale_price' => 20.0,
                'quantity' => 10,
                'category_id' => 11,
            ],
            [
                'name' =>json_encode([
                    'en'=>"T-shirt",
                    'ar'=>"ملابس",
                ],JSON_UNESCAPED_UNICODE),
                'content' => json_encode([
                    'en'=>"tittititit",
                    'ar'=>"قتتتتتتتق24ق4ق2ق",
                ],JSON_UNESCAPED_UNICODE),
                'image' => 'tshirt.jpg',
                'salary' => 25.0,
                'sale_price' => 20.0,
                'quantity' => 10,
                'category_id' => 11,
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert([
                'name' => $product['name'],
                'content' => $product['content'],
                'image' => $product['image'],
                'salary' => $product['salary'],
                'sale_price' => $product['sale_price'],
                'quantity' => $product['quantity'],
                'category_id' => $product['category_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }




    }
}
