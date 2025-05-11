<?php


namespace Database\Seeders;
use App\Models\Photo;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    public function run(): void
    {
        $bikeImages = [
            'item/bike_item.jpg',
            'item/Bike_2.png',
        ];

        $skiImages = [
            'item/Ski_1_main.png',
            'item/Ski_2.png',
        ];

        // Produkty 1 až 6 – bicykle
        for ($id = 1; $id <= 6; $id++) {
            Photo::create([
                'product_id' => $id,
                'image_URL' => $bikeImages[0],
                'main' => true
            ]);
        }

        for ($id = 1; $id <= 6; $id++) {
            Photo::create([
                'product_id' => $id,
                'image_URL' => $bikeImages[1],
                'main' => false
            ]);
        }

        // Produkty 7 až 15 – lyže
        for ($id = 7; $id <= 15; $id++) {
            Photo::create([
                'product_id' => $id,
                'image_URL' => $skiImages[0],
                'main' => true
            ]);
        }

        for ($id = 7; $id <= 15; $id++) {
            Photo::create([
                'product_id' => $id,
                'image_URL' => $skiImages[1],
                'main' => false
            ]);
        }
    }
}
