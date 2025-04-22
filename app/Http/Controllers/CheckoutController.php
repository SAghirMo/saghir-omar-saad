<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Votre panier est vide. Veuillez ajouter des produits avant de passer à la caisse.');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Votre panier est vide. Veuillez ajouter des produits avant de passer à la caisse.');
        }

        // Here you would typically:
        // 1. Create an order
        // 2. Process payment
        // 3. Clear the cart
        // 4. Send confirmation email

        // For now, we'll just clear the cart and redirect
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('products.index')
            ->with('success', 'Votre commande a été passée avec succès!');
    }
} 