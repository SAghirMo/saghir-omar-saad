@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="md:flex">
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-full object-cover">
                </div>
                <div class="p-8 md:w-1/2">
                    <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                    <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                    <div class="text-2xl font-bold text-blue-600 mb-6">
                        {{ number_format($product->price, 2) }} DHS
                    </div>
                    
                    <div class="space-y-4">
                        @auth
                            <form action="{{ route('cart.store', $product->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" 
                                        class="w-full bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 transition duration-300">
                                    Add to Cart
                                </button>
                            </form>

                            @php
                                $inWishlist = \App\Models\Wishlist::where('user_id', auth()->id())
                                    ->where('product_id', $product->id)
                                    ->exists();
                            @endphp

                            <form action="{{ route($inWishlist ? 'wishlist.destroy' : 'wishlist.store', $product->id) }}" method="POST">
                                @csrf
                                @if($inWishlist)
                                    @method('DELETE')
                                @endif
                                <button type="submit" 
                                        class="w-full bg-gray-200 text-gray-800 px-6 py-3 rounded hover:bg-gray-300 transition duration-300 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="{{ $inWishlist ? 'red' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    {{ $inWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" 
                               class="block w-full text-center bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 transition duration-300">
                                Login to Add to Cart
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 