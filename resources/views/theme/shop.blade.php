@extends('theme.master')

@section('shop-active', 'active')

@section('content')
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-3">
                <!-- Category Filter -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Catégories</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="{{ route('theme.shop') }}" class="list-group-item list-group-item-action {{ !request('category') ? 'active' : '' }}">
                                Tous les produits
                            </a>
                            @foreach($categories as $category)
                                <a href="{{ route('theme.shop', ['category' => $category->id]) }}" 
                                   class="list-group-item list-group-item-action {{ request('category') == $category->id ? 'active' : '' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title">Nos Produits</h2>
                    @auth
                        @if(auth()->user()->role === 'seller')
                            <a href="{{ route('seller.products.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Ajouter un Produit
                            </a>
                        @endif
                    @endauth
                </div>

                <div class="row">
                    @forelse($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 product-card">
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    <div class="position-absolute top-0 end-0 p-2">
                                        @php
                                            $inWishlist = \App\Models\Wishlist::where('user_id', auth()->id())
                                                ->where('product_id', $product->id)
                                                ->exists();
                                        @endphp
                                        <form action="{{ route($inWishlist ? 'wishlist.destroy' : 'wishlist.store', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @if($inWishlist)
                                                @method('DELETE')
                                            @endif
                                            <button type="submit" class="btn btn-light wishlist-button" title="{{ $inWishlist ? 'Retirer des favoris' : 'Ajouter aux favoris' }}">
                                                <i class="fas fa-heart" style="color: {{ $inWishlist ? '#dc3545' : '#6c757d' }}"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="h5 mb-0 text-primary">{{ number_format($product->price, 2) }} DHS</span>
                                        <form action="{{ route('cart.store', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-shopping-cart me-2"></i>Ajouter
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>Aucun produit trouvé
                            </div>
                        </div>
                    @endforelse
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.product-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
    border-radius: 10px;
    overflow: hidden;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.product-card .card-img-top {
    height: 200px;
    object-fit: cover;
}

.wishlist-button {
    background-color: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.wishlist-button:hover {
    background-color: #fff;
    transform: scale(1.1);
}

.wishlist-button i {
    color: #dc3545;
    font-size: 1.2rem;
}

.btn-primary {
    background-color: #3b5d50;
    border-color: #3b5d50;
    padding: 0.5rem 1.5rem;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #2d473d;
    border-color: #2d473d;
    transform: translateY(-2px);
}

.list-group-item {
    border: none;
    padding: 0.75rem 1.25rem;
    transition: all 0.3s ease;
}

.list-group-item:hover {
    background-color: #f8f9fa;
    transform: translateX(5px);
}

.list-group-item.active {
    background-color: #3b5d50;
    border-color: #3b5d50;
}

.alert {
    border-radius: 10px;
    padding: 1rem;
}

.pagination {
    margin-bottom: 0;
}

.pagination .page-link {
    color: #3b5d50;
    border: none;
    padding: 0.5rem 1rem;
    margin: 0 0.25rem;
    border-radius: 5px;
}

.pagination .page-item.active .page-link {
    background-color: #3b5d50;
    border-color: #3b5d50;
}

.pagination .page-link:hover {
    background-color: #f8f9fa;
    color: #2d473d;
}
</style>

@push('scripts')
<script>
    // Auto-dismiss alerts after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            setTimeout(function() {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 5000);
        });
    });
</script>
@endpush
@endsection
