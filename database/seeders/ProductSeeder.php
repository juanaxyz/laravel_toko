<?php

namespace Database\Seeders;


use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([

            "product_name" => "Laptop Rog",
            'description' => 'Laptop gaming dengan performa tinggi dan desain yang stylish.',
            'price' => 15000000,
            'stock' => random_int(1, 100),
            'category_id' => random_int(1, 2)
        ]);
        Product::create(
            [
                "product_name" => "Baju Kemeja",
                'description' => 'Baju kemeja pria dengan bahan berkualitas dan desain modern.',
                'price' => 250000,
                'stock' => random_int(1, 100),
                'category_id' => random_int(1, 2)
            ]
        );
    }
}
