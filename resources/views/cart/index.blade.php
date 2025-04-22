@extends('theme.master')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Panier d'achat</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($cartItems->isEmpty())
        <div class="text-center py-5">
            <h3 class="text-muted">Votre panier est vide</h3>
            <p class="text-muted mb-4">Commencez vos achats pour ajouter des articles à votre panier</p>
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                <i class="fas fa-shopping-bag me-2"></i>Continuer les achats
            </a>
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-0" style="width: 40%">Produit</th>
                                <th class="border-0 text-center">Prix</th>
                                <th class="border-0 text-center">Quantité</th>
                                <th class="border-0 text-center">Total</th>
                                <th class="border-0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $item->product->image) }}" 
                                                 alt="{{ $item->product->name }}" 
                                                 class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                            <div class="ms-3">
                                                <h5 class="mb-1">{{ $item->product->name }}</h5>
                                                <p class="text-muted mb-0 small">{{ $item->product->description }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ number_format($item->product->price, 2) }}DHS
                                    </td>
                                    <td class="align-middle text-center">
                                        <form action="{{ route('cart.update', $item) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" 
                                                   name="quantity" 
                                                   value="{{ $item->quantity }}" 
                                                   min="1" 
                                                   class="form-control form-control-sm d-inline-block text-center"
                                                   style="width: 70px;"
                                                   onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ number_format($item->product->price * $item->quantity, 2) }}DHS
                                    </td>
                                    <td class="align-middle text-center">
                                        <form action="{{ route('cart.destroy', $item) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="h4 mb-0">
                        Total: {{ number_format($cartItems->sum(function($item) {
                            return $item->product->price * $item->quantity;
                        }), 2) }}DHS
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-shopping-bag me-2"></i>Continuer les achats
                        </a>
                        <a href="{{ route('checkout.index') }}" class="btn btn-primary">
                            <i class="fas fa-credit-card me-2"></i>Passer à la caisse
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
.card {
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border-radius: 10px;
}

.table th {
    color: #3b5d50;
    font-weight: 600;
}

.btn-primary {
    background-color: #3b5d50;
    border-color: #3b5d50;
}

.btn-primary:hover {
    background-color: #2d473d;
    border-color: #2d473d;
}

.btn-outline-primary {
    color: #3b5d50;
    border-color: #3b5d50;
}

.btn-outline-primary:hover {
    background-color: #3b5d50;
    border-color: #3b5d50;
}

.form-control:focus {
    border-color: #3b5d50;
    box-shadow: 0 0 0 0.2rem rgba(59, 93, 80, 0.25);
}
</style>
@endsection 