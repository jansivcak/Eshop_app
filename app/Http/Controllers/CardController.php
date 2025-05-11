<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CardController extends Controller
{
    public function store(Request $request)
    {


        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'size'       => 'required|in:S,M,L,XL',
            'quantity'   => 'required|integer|min:1',
        ]);


        $product = Product::findOrFail($data['product_id']);
        $field   = 'has_'.strtolower($data['size']);
        $stock   = $product->$field;

        if ($data['quantity'] > $stock) {
            return back()
                ->withErrors(['quantity' => "Maximálne dostupné množstvo pre veľkosť {$data['size']} je {$stock} ks."])
                ->withInput();
        }



        if (Auth::check()) {
            $cart = ShoppingCart::firstOrCreate(
                ['customer_id' => Auth::id(), 'paied' => false],
                ['session_id' => null]
            );
        } else {
            $sid  = session()->getId();
            $cart = ShoppingCart::firstOrCreate(
                ['session_id' => $sid, 'paied' => false],
                ['customer_id'    => null]
            );
        }


        $data = $request->only(['size','quantity']);


        $item = Item::where([
            ['cart_id', $cart->id],
            ['product_id', $product->id],
            ['size',       $data['size']],
        ])->first();

        if ($item) {
            $item->increment('quantity', $data['quantity']);
        } else {
            Item::create([
                'cart_id'    => $cart->id,
                'product_id' => $product->id,
                'size'       => $data['size'],
                'quantity'   => $data['quantity'],
                'price'      => $product->price,
            ]);
        }


        $field = 'has_'.strtolower($data['size']);
        $product->decrement($field, $data['quantity']);

        return back()->with('success','Položka pridaná do košíka.');
    }




    public function index(Request $request)
    {

        if (Auth::check()) {
            $user = Auth::user();
            $cart = $user->cart()
                ->where('paied', false)
                ->first();


            if (! $cart) {
                $cart = $user->cart()->create([
                    'paied' => false,
                ]);
            }

        } else {

            $sessionId = session()->getId();
            $cart = ShoppingCart::where('session_id', $sessionId)
                ->where('paied', false)
                ->first();

            if (! $cart) {
                $cart = ShoppingCart::create([
                    'session_id' => $sessionId,
                    'paied'       => false,
                ]);
            }
        }


        $items = $cart
            ->items()
            ->with('product.mainPhoto')
            ->get();


        $total = $items->sum(fn($item) => $item->quantity * $item->product->price);


        return view('pages.cart', [
            'items' => $items,
            'total' => $total,
        ]);
    }


    public function update(Request $request)
    {
        $data = $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $item = Item::find($data['item_id']);
        $product = $item->product;

        if (!$product) {
            return redirect()->route('cart.show')->with('error', 'Produkt neexistuje.');
        }

        $sizeKey = 'has_' . strtolower(trim($item->size));
        $stock = $product->$sizeKey ?? 0;
        $diff = $data['quantity'] - $item->quantity;

        if ($diff > 0 && $diff > $stock) {
            return redirect()->route('cart.show')->with('error', 'Na sklade nie je dosť kusov veľkosti ' . $item->size . '.');
        }

        $product->$sizeKey -= $diff;
        $product->save();

        $item->quantity = $data['quantity'];
        $item->save();

        return redirect()->back()->with('success', 'Košík aktualizovaný');
    }



    public function destroy(Item $item)
    {

        $product = $item->product;

        if ($product) {
            $sizeKey = 'has_' . strtolower(trim($item->size));
            $product->$sizeKey += $item->quantity;
            $product->save();
        }


        $item->delete();

        return redirect()->back()->with('success', 'Položka bola odstránená z košíka.');
    }

    public function showPayment(){
        if (auth()->check()) {
            $cart = ShoppingCart::where('customer_id', auth()->id())
                ->where('paied', false)
                ->first();
        } else {
            $cart = ShoppingCart::where('session_id', session()->getId())
                ->where('paied', false)
                ->first();
        }


        if (!$cart) {
            return redirect()->route('cart.show')->with('error', 'Košík je prázdny.');
        }


        $items = $cart->items;


        $total = $items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('pages.payment', compact('items', 'total'));
    }

    public function preview(Request $request)
    {

        if (auth()->check()) {
            $cart = ShoppingCart::where('customer_id', auth()->id())
                ->where('paied', false)
                ->first();
        } else {
            $cart = ShoppingCart::where('session_id', session()->getId())
                ->where('paied', false)
                ->first();
        }


        $items = $cart ? $cart->items : collect();


        return view('partials.cart_view', ['items' => $items]);
    }

}
