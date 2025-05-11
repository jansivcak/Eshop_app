<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function ReturnHome(){
        $expirationLimit = now()->subMinutes(45);


        $expiredItems = Item::where('created_at', '<', $expirationLimit)
            ->whereHas('shopping_cart', function ($query) {
                $query->where('paied', false);
            })
            ->get();


        foreach ($expiredItems as $item) {
            $product = $item->product;
            $sizeKey = 'has_' . strtolower($item->size);

            if ($product && isset($product->$sizeKey)) {
                $product->$sizeKey += $item->quantity;
                $product->save();
            }

            $item->delete();
        }


        $novinky = Product::where('group_id', 2)
            ->latest()
            ->take(4)
            ->get();

        $akcie = Product::where('group_id', 3)
            ->latest()
            ->take(4)
            ->get();

        return view('pages.home', compact('novinky', 'akcie'));
    }


    public function logout(Request $request){
        Auth::logout();


        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect()->back();
    }

}
