@extends('theme.master')

@section('content')
<div class="edit-product-section my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="section-title">Modifier le Produit</h2>
                        <p class="text-muted">Mettez à jour les informations du produit</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nom du Produit</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="price" class="form-label">Prix (€)</label>
                                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $product->description }}</textarea>
                                <small class="text-muted">Décrivez les caractéristiques principales du produit</small>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category" class="form-label">Catégorie</label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="">Sélectionner une catégorie</option>
                                        <option value="Furniture" {{ $product->category == 'Furniture' ? 'selected' : '' }}>Meubles</option>
                                        <option value="Lighting" {{ $product->category == 'Lighting' ? 'selected' : '' }}>Éclairage</option>
                                        <option value="Decoration" {{ $product->category == 'Decoration' ? 'selected' : '' }}>Décoration</option>
                                        <option value="Curtains" {{ $product->category == 'Curtains' ? 'selected' : '' }}>Rideaux</option>
                                        <option value="Flooring" {{ $product->category == 'Flooring' ? 'selected' : '' }}>Revêtements de Sol</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label for="image" class="form-label">Image du Produit</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <div class="mt-2">
                                    <small class="text-muted">Image actuelle:</small>
                                    <div class="current-image mt-2">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('theme.shop') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Retour
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Enregistrer les Modifications
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.edit-product-section {
    background-color: #f8f9fa;
    padding: 40px 0;
}

.card {
    border: none;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    border-radius: 10px;
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #eee;
    padding: 25px;
}

.card-header .section-title {
    margin-bottom: 5px;
    color: #2f2f2f;
}

.card-body {
    padding: 30px;
}

.form-label {
    font-weight: 500;
    color: #2f2f2f;
    margin-bottom: 8px;
}

.form-control, .form-select {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 12px;
    font-size: 0.95rem;
}

.form-control:focus, .form-select:focus {
    border-color: #3b5d50;
    box-shadow: 0 0 0 0.2rem rgba(59, 93, 80, 0.15);
}

.text-muted {
    font-size: 0.85rem;
}

.current-image {
    max-width: 200px;
    border-radius: 8px;
    overflow: hidden;
}

.current-image img {
    width: 100%;
    height: auto;
}

.btn {
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-primary {
    background-color: #3b5d50;
    border-color: #3b5d50;
}

.btn-primary:hover {
    background-color: #2f4a40;
    border-color: #2f4a40;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
}

textarea {
    resize: vertical;
    min-height: 100px;
}
</style>
@endsection 