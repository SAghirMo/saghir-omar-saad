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

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="section-title">Nos Produits</h2>
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Ajouter un Produit
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($products as $product)
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <div class="product-item">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid product-thumbnail" alt="{{ $product->name }}">
                        @else
                            <div class="no-image-placeholder">
                                <i class="fas fa-image"></i>
                                <span>Pas d'Image Disponible</span>
                            </div>
                        @endif
                        
                        <div class="product-details">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <strong class="product-price">{{ number_format($product->price, 2) }}€</strong>
                            <p class="product-category">
                                <i class="fas fa-tag"></i> {{ $product->category }}
                            </p>
                            <p class="product-stock {{ $product->stock <= 5 ? 'low-stock' : '' }}">
                                <i class="fas fa-box"></i> Stock: {{ $product->stock }}
                            </p>
                            
                            <div class="product-actions">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        Aucun produit disponible. <a href="{{ route('products.create') }}" class="alert-link">Ajouter un produit</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
.product-item {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.product-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}

.product-thumbnail {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 4px;
    margin-bottom: 15px;
}

.no-image-placeholder {
    width: 100%;
    height: 200px;
    background: #f8f9fa;
    border-radius: 4px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    margin-bottom: 15px;
}

.no-image-placeholder i {
    font-size: 3rem;
    margin-bottom: 10px;
}

.product-details {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.product-title {
    font-size: 1.2rem;
    margin-bottom: 10px;
    color: #2f2f2f;
}

.product-price {
    color: #2f2f2f;
    font-size: 1.1rem;
    margin-bottom: 10px;
}

.product-category, .product-stock {
    color: #6c757d;
    font-size: 0.9rem;
    margin-bottom: 5px;
}

.product-stock.low-stock {
    color: #dc3545;
    font-weight: bold;
}

.product-actions {
    margin-top: auto;
    display: flex;
    gap: 10px;
    justify-content: center;
    padding-top: 15px;
}

.btn-sm {
    padding: 5px 10px;
    font-size: 0.875rem;
    display: flex;
    align-items: center;
    gap: 5px;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.alert-info {
    color: #0c5460;
    background-color: #d1ecf1;
    border-color: #bee5eb;
}

.alert-link {
    color: #0c5460;
    text-decoration: underline;
}

.alert-link:hover {
    color: #062c33;
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
