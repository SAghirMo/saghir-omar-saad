<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->get();
            
        return view('wishlist.index', compact('wishlistItems'));
    }

    public function store(Product $product)
    {
        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $product->id
        ]);

        return redirect()->back()->with('success', 'Produit ajouté à la liste de souhaits avec succès!');
    }

    public function destroy(Wishlist $wishlistItem)
    {
        // Check if the wishlist item belongs to the authenticated user
        if ($wishlistItem->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à supprimer cet élément.');
        }

        $wishlistItem->delete();
        return redirect()->back()->with('success', 'Élément supprimé de la liste de souhaits avec succès!');
    }
} 