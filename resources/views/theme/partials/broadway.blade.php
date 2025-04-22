<!-- Broadway Section -->
<section class="broadway-section py-12 bg-gradient-to-r from-blue-500 to-purple-600">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8">
            <h2 class="text-4xl font-bold text-white mb-4">Featured Products</h2>
            <p class="text-white text-lg">Discover our most popular items</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProducts as $product)
                <div class="bg-white rounded-lg shadow-xl overflow-hidden transform hover:scale-105 transition duration-300">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-64 object-cover">
                        <div class="absolute top-2 right-2">
                            @auth
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
                                            class="bg-white p-2 rounded-full shadow-lg hover:bg-red-500 hover:text-white transition duration-300"
                                            data-bs-toggle="tooltip" 
                                            data-bs-placement="top" 
                                            title="{{ $inWishlist ? 'Remove from wishlist' : 'Add to wishlist' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="{{ $inWishlist ? 'red' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="font-semibold text-xl text-gray-800 mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->description }}</p>
                        <div class="flex justify-between items-center">
                            <div class="text-2xl font-bold text-blue-600">
                                ${{ number_format($product->price, 2) }}
                            </div>
                            @auth
                                <form action="{{ route('cart.store', $product->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" 
                                            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                                    Login to Purchase
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section> 