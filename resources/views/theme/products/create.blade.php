@extends('theme.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Ajouter un nouveau produit</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('seller.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom du produit</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">Prix (DHS)</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="stock" class="form-label">Quantité en stock</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', 0) }}" min="0" required>
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Catégorie</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                <option value="">Sélectionnez une catégorie</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Seules les catégories actives sont affichées. Si vous ne voyez pas la catégorie souhaitée, veuillez contacter l'administrateur.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="size" class="form-label">Taille</label>
                                <select class="form-select @error('size') is-invalid @enderror" id="size" name="size">
                                    <option value="">Sélectionnez une taille</option>
                                    <option value="XS" {{ old('size') == 'XS' ? 'selected' : '' }}>XS</option>
                                    <option value="S" {{ old('size') == 'S' ? 'selected' : '' }}>S</option>
                                    <option value="M" {{ old('size') == 'M' ? 'selected' : '' }}>M</option>
                                    <option value="L" {{ old('size') == 'L' ? 'selected' : '' }}>L</option>
                                    <option value="XL" {{ old('size') == 'XL' ? 'selected' : '' }}>XL</option>
                                    <option value="XXL" {{ old('size') == 'XXL' ? 'selected' : '' }}>XXL</option>
                                </select>
                                @error('size')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="color" class="form-label">Couleur</label>
                                <select class="form-select @error('color') is-invalid @enderror" id="color" name="color">
                                    <option value="">Sélectionnez une couleur</option>
                                    <option value="Rouge" {{ old('color') == 'Rouge' ? 'selected' : '' }}>Rouge</option>
                                    <option value="Bleu" {{ old('color') == 'Bleu' ? 'selected' : '' }}>Bleu</option>
                                    <option value="Vert" {{ old('color') == 'Vert' ? 'selected' : '' }}>Vert</option>
                                    <option value="Noir" {{ old('color') == 'Noir' ? 'selected' : '' }}>Noir</option>
                                    <option value="Blanc" {{ old('color') == 'Blanc' ? 'selected' : '' }}>Blanc</option>
                                    <option value="Gris" {{ old('color') == 'Gris' ? 'selected' : '' }}>Gris</option>
                                </select>
                                @error('color')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="material" class="form-label">Matériau</label>
                            <input type="text" class="form-control @error('material') is-invalid @enderror" id="material" name="material" value="{{ old('material') }}">
                            @error('material')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image du produit</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input @error('featured') is-invalid @enderror" type="checkbox" id="featured" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured">
                                    Mettre en vedette ce produit
                                </label>
                                @error('featured')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Enregistrer
                            </button>
                            <a href="{{ route('seller.products.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Retour
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.card-header {
    border-radius: 10px 10px 0 0 !important;
}

.form-control, .form-select {
    border-radius: 5px;
    border: 1px solid #ced4da;
    padding: 0.75rem;
}

.form-control:focus, .form-select:focus {
    border-color: #3b5d50;
    box-shadow: 0 0 0 0.25rem rgba(59, 93, 80, 0.25);
}

.btn-primary {
    background-color: #3b5d50;
    border-color: #3b5d50;
    padding: 0.75rem;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background-color: #2d473d;
    border-color: #2d473d;
    transform: translateY(-2px);
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    padding: 0.75rem;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
    transform: translateY(-2px);
}

.form-text {
    font-size: 0.875rem;
    color: #6c757d;
    margin-top: 0.25rem;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}
</style>
@endsection 