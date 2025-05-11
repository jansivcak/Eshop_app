<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        Brand::insert([
            ['name' => 'Specialized'],
            ['name' => 'Ghost'],
            ['name' => 'Trek'],
            ['name' => 'Rossignol'],
            ['name' => 'Salomon'],
            ['name' => 'Head'],
        ]);
    }
}
