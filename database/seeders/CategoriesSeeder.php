<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['name' => 'Bicykle'],
            ['name' => 'Lyže'],
        ]);
    }
}
