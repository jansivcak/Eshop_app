<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    public function run(): void
    {
        Group::insert([
            ['name' => 'Ostatné'],
            ['name' => 'Novinky'],
            ['name' => 'Akcie'],
        ]);
    }
}
