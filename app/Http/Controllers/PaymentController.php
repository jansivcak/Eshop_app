<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shipping;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function storepayment(Request $request)
    {
        $validated = $request->validate([
            'shipping' => 'required|string',
            'payment' => 'required|string',
        ]);



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
            return redirect()->route('cart.show')->with('error', 'Košík neexistuje alebo už bol zaplatený.');
        }


        $total = $cart->items->sum(fn($item) => $item->product->price * $item->quantity);

        $shipping = Shipping::create([
            'name'    => session('order.name'),
            'surname' => session('order.surname'),
            'email'   => session('order.email'),
            'phone'   => session('order.phone'),
            'adress'  => session('order.adress'),
            'town'    => session('order.town'),
            'zip'     => session('order.zip'),
        ]);


        $order = Order::create([
            'card_id'         => $cart->id,
            'user_id'         => auth()->id(),
            'shipping_id'     => $shipping->id,
            'price'           => $total,
            'shipping_method' => $validated['shipping'],
            'payment_method'  => $validated['payment'],
        ]);


        $cart->paied = true;
        $cart->save();

        return redirect()->route('show.confirmation');
    }

    public function showCheckout()
    {
        $user = auth()->user();

        return view('pages.checkout', compact('user'));
    }

    public function storeCheckout(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'surname'  => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'phone'    => 'required|string|min:10|max:15',
            'adress'   => 'required|string|max:255',
            'town'     => 'required|string|max:255',
            'zip'      => 'required|string|max:10',
        ]);

        session([
            'order.name'     => $validated['name'],
            'order.surname'  => $validated['surname'],
            'order.email'    => $validated['email'],
            'order.phone'    => $validated['phone'],
            'order.adress'   => $validated['adress'],
            'order.town'     => $validated['town'],
            'order.zip'      => $validated['zip'],
        ]);

        return redirect()->route('show.payment');
    }
}
