<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Type;


class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        Type::insert([
            ['name' => 'Horské bicykle',   'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cestné bicykle',   'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Freeridove lyže',   'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Retro bicykle',    'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Zjazdové lyže','created_at' => $now, 'updated_at' => $now],
            ['name' => 'Skialpové lyže','created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
