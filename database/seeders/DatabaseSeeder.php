<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Naplnenie základných tabuliek
        $this->call([
            CategoriesSeeder::class,
            BrandSeeder::class,
            GroupSeeder::class,
            TypeSeeder::class,
            ProductSeeder::class, // zatiaľ vynechaj
            PhotoSeeder::class,
        ]);
    }
}
