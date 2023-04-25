<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory()->count(10)->create();

        $categories = [
            [
                'name'=> json_encode([
                    'en'=>"clothes",
                    'ar'=>"ملابس",
                ],JSON_UNESCAPED_UNICODE),
                'image' => '13230072111682421699.png',
                'parent_id' => null,
            ],
            [
                'name'=> json_encode([
                    'en'=>"lab",
                    'ar'=>"لابتوب",
                ],JSON_UNESCAPED_UNICODE),
                'image' => '13230072111682421699.png',
                'parent_id' => 1, // Category 1
            ],
            [
                'name'=> json_encode([
                    'en'=>"mobile",
                    'ar'=>"هاتف",
                ],JSON_UNESCAPED_UNICODE),
                'image' => '13230072111682421699.png',
                'parent_id' => null,
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'image' => $category['image'],
                'parent_id' => $category['parent_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
