<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create some categories
        Category::create([
            'category_name' => 'Books',
            'description' => 'All kinds of books and literature'
        ]);
        Category::create([
            'category_name' => 'Clothing',
            'description' => 'Apparel and fashion items'
        ]);
    }
}
