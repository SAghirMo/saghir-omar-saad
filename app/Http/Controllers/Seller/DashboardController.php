<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Check if the user_id column exists
        if (Schema::hasColumn('products', 'user_id')) {
            $products = Product::where('user_id', auth()->id())->latest()->paginate(10);
        } else {
            // If the column doesn't exist, show all products (temporary)
            $products = Product::latest()->paginate(10);
        }

        return view('seller.dashboard', compact('products'));
    }
} 