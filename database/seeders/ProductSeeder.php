<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Group;
use App\Models\Type;

//1 - bicykle
//2 - lyze

//1 - ostatne
//2 - novinky
//3 - akcíe

//1 - Specialized
//2 - Ghost
//3 - Trek
//4 - Rossignol
//5 - Salomon
//6 - Head

//1 - Horske
//2 - retro
//3 - cestne
//4 - Freeridove
//5 - Zjazdove
//6 - Skialpove

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $bicykle_titles = [
            'Retro klasik', 'Street lady',
        ];

        $bicykle_titles2 = [
            'Fast road', 'Asvalt 6',
        ];

        $bicykle_titles3 = [
            'Treking XM', 'X5 M-packed',
        ];

        $lyze_titles = [
            'FREEEE', 'Freeride heli', 'Alpen Matterhorn'
        ];

        $lyze_titles2 = [
            'Zjazdový drak', 'Hannenkam', 'Hans Knases'
        ];

        $lyze_titles3 = [
            'To the TOP', 'SKIALP PRO', 'SKIALP PRO 2'
        ];


        $bike_description = 'Ideálny spoločník na každodenné jazdy aj víkendové výlety. Tento bicykel kombinuje komfort, odolnosť a moderný dizajn pre všetky typy cyklistov.';
        $ski_description = 'Výkonné a spoľahlivé lyže pre náročné zjazdy aj jemný prašan. Skvelá voľba pre aktívnych lyžiarov, ktorí hľadajú stabilitu a precízne ovládanie.';


        // 6 bicyklov (kategória 1, typ 1-3, značka 1-3)
        foreach ($bicykle_titles as $title) {
            Product::create([
                'title' => $title,
                'short_descr' => $bike_description,
                'long_descr' => $bike_description,
                'price' => rand(300, 1500),
                'pohlavie' => ['muž', 'žena'][rand(0, 1)],
                'has_s' => rand(0, 5),
                'has_m' => rand(0, 5),
                'has_l' => rand(0, 5),
                'has_xl' => rand(0, 5),
                'category_id' => 1, // Bicykle
                'group_id' => rand(1, 3),
                'brand_id' => rand(1, 3), // Specialized, Ghost, Trek
                'type_id' => 2  // Horské, Retro, Cestné
            ]);
        }

        foreach ($bicykle_titles2 as $title) {
            Product::create([
                'title' => 'Bicykel: ' .  $title,
                'short_descr' => $bike_description,
                'long_descr' => $bike_description,
                'price' => rand(300, 1500),
                'pohlavie' => ['muž', 'žena'][rand(0, 1)],
                'has_s' => rand(0, 5),
                'has_m' => rand(0, 5),
                'has_l' => rand(0, 5),
                'has_xl' => rand(0, 5),
                'category_id' => 1, // Bicykle
                'group_id' => rand(1, 3),
                'brand_id' => rand(1, 3), // Specialized, Ghost, Trek
                'type_id' => 3  // Horské, Retro, Cestné
            ]);
        }

        foreach ($bicykle_titles3 as $title) {
            Product::create([
                'title' => 'Bicykel: ' .  $title,
                'short_descr' => $bike_description,
                'long_descr' => $bike_description,
                'price' => rand(300, 1500),
                'pohlavie' => ['muž', 'žena'][rand(0, 1)],
                'has_s' => rand(0, 5),
                'has_m' => rand(0, 5),
                'has_l' => rand(0, 5),
                'has_xl' => rand(0, 5),
                'category_id' => 1, // Bicykle
                'group_id' => rand(1, 3),
                'brand_id' => rand(1, 3), // Specialized, Ghost, Trek
                'type_id' => 1  // Horské, Retro, Cestné
            ]);
        }

        // 6 lyží (kategória 2, typ 4-6, značka 4-6)
        foreach ($lyze_titles as $title) {
            Product::create([
                'title' => 'Lyže: ' . $title,
                'short_descr' => $ski_description,
                'long_descr' => $ski_description,
                'price' => rand(250, 1200),
                'pohlavie' => ['muž', 'žena'][rand(0, 1)],
                'has_s' => rand(0, 5),
                'has_m' => rand(0, 5),
                'has_l' => rand(0, 5),
                'has_xl' => rand(0, 5),
                'category_id' => 2, // Lyže
                'group_id' => rand(1, 3),
                'brand_id' => rand(4, 6), // Rossignol, Salomon, Head
                'type_id' => 4,  // Freeridové, Zjazdové, Skialpové
            ]);
        }

        foreach ($lyze_titles2 as $title) {
            Product::create([
                'title' => 'Lyže: ' . $title,
                'short_descr' => $ski_description,
                'long_descr' => $ski_description,
                'price' => rand(250, 1200),
                'pohlavie' => ['muž', 'žena'][rand(0, 1)],
                'has_s' => rand(0, 5),
                'has_m' => rand(0, 5),
                'has_l' => rand(0, 5),
                'has_xl' => rand(0, 5),
                'category_id' => 2, // Lyže
                'group_id' => rand(1, 3),
                'brand_id' => rand(4, 6), // Rossignol, Salomon, Head
                'type_id' => 5,  // Freeridové, Zjazdové, Skialpové
            ]);
        }

        foreach ($lyze_titles3 as $title) {
            Product::create([
                'title' => 'Lyže: ' . $title,
                'short_descr' => $ski_description,
                'long_descr' => $ski_description,
                'price' => rand(250, 1200),
                'pohlavie' => ['muž', 'žena'][rand(0, 1)],
                'has_s' => rand(0, 5),
                'has_m' => rand(0, 5),
                'has_l' => rand(0, 5),
                'has_xl' => rand(0, 5),
                'category_id' => 2, // Lyže
                'group_id' => rand(1, 3),
                'brand_id' => rand(4, 6), // Rossignol, Salomon, Head
                'type_id' => 6,  // Freeridové, Zjazdové, Skialpové
            ]);
        }
    }
}
