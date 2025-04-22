@extends('theme.master')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Ma Liste de Souhaits</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($wishlistItems->isEmpty())
        <div class="text-center py-5">
            <i class="fas fa-heart text-muted mb-3" style="font-size: 4rem;"></i>
            <h3 class="text-muted">Votre liste de souhaits est vide</h3>
            <p class="text-muted">Continuez vos achats pour ajouter des articles à votre liste de souhaits.</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">
                <i class="fas fa-shopping-bag me-2"></i>Continuer les achats
            </a>
        </div>
    @else
        <div class="row">
            @foreach($wishlistItems as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 product-card">
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $item->product->image) }}" class="card-img-top" alt="{{ $item->product->name }}">
                            <div class="position-absolute top-0 end-0 p-2">
                                <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light delete-button" title="Supprimer">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product->name }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($item->product->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0 text-primary">{{ number_format($item->product->price, 2) }} DHS</span>
                                <form action="{{ route('cart.store', $item->product->id) }}" method="POST" class="d-inline">
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
            @endforeach
        </div>
    @endif
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

.delete-button {
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

.delete-button:hover {
    background-color: #fff;
    transform: scale(1.1);
}

.delete-button i {
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

.alert {
    border-radius: 10px;
    padding: 1rem;
}

.alert i {
    margin-right: 8px;
}

.empty-wishlist {
    text-align: center;
    padding: 3rem;
}

.empty-wishlist i {
    font-size: 4rem;
    color: #6c757d;
    margin-bottom: 1rem;
}

.empty-wishlist h3 {
    color: #6c757d;
    margin-bottom: 1rem;
}

.empty-wishlist p {
    color: #6c757d;
    margin-bottom: 1.5rem;
}
</style>
@endsection 