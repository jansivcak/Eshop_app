<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Item;
use Illuminate\Console\Command;

class ClearExpiredCartItems extends Command
{
    protected $signature = 'cart:clear-expired';
    protected $description = 'Odstráni expirované položky z košíka a vráti ich do skladu';

    public function handle()
    {
        $expirationLimit = now()->subMinutes(30);

        Item::where('created_at', '<', $expirationLimit)->each(function ($item) {
            $product = $item->product;
            $sizeKey = 'has_' . strtolower(trim($item->size));

            if ($product && isset($product->$sizeKey)) {
                $product->$sizeKey += $item->quantity;
                $product->save();
            }

            $item->delete();
        });

        $this->info('Expirované položky boli vyčistené.');
    }
}
