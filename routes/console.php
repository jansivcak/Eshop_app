<?php

use App\Models\Item;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::call(function () {
    $expirationLimit = now()->subMinutes(30);

    Item::where('created_at', '<', $expirationLimit)->each(function ($item) {
        $product = $item->product;
        $sizeKey = 'has_'.strtolower(trim($item->size));

        if ($product && isset($product->$sizeKey)) {
            $product->$sizeKey += $item->quantity;
            $product->save();
        }

        $item->delete();
    });
})->everyFiveMinutes();
