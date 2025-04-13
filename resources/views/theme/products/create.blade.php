@extends('theme.master')

@section('content')
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="section-title">Ajouter un Nouveau Produit</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom du Produit</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Prix (€)</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Catégorie</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="">Sélectionner une catégorie</option>
                                    <option value="Furniture">Meubles</option>
                                    <option value="Lighting">Éclairage</option>
                                    <option value="Decoration">Décoration</option>
                                    <option value="Curtains">Rideaux</option>
                                    <option value="Flooring">Revêtements de Sol</option>
                                    <option value="Kitchen">Cuisine</option>
                                    <option value="Bathroom">Salle de Bain</option>
                                    <option value="Outdoor">Extérieur</option>
                                    <option value="Accessories">Accessoires</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Quantité en Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image du Produit</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                <small class="text-muted">Taille max: 2MB. Formats acceptés: JPEG, PNG, JPG, GIF</small>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('theme.shop') }}" class="btn btn-secondary">Annuler</a>
                                <button type="submit" class="btn btn-primary">Ajouter le Produit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-radius: 8px;
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #eee;
    padding: 20px;
}

.card-body {
    padding: 30px;
}

.form-label {
    font-weight: 500;
    color: #2f2f2f;
}

.form-control, .form-select {
    border-radius: 4px;
    border: 1px solid #ddd;
    padding: 10px;
}

.form-control:focus, .form-select:focus {
    border-color: #2f2f2f;
    box-shadow: none;
}

.btn {
    padding: 10px 20px;
    border-radius: 4px;
    font-weight: 500;
}

.btn-primary {
    background-color: #2f2f2f;
    border-color: #2f2f2f;
}

.btn-primary:hover {
    background-color: #1a1a1a;
    border-color: #1a1a1a;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
}

.text-muted {
    font-size: 0.875rem;
    margin-top: 5px;
    display: block;
}
</style>
@endsection 