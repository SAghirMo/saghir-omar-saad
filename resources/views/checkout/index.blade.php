@extends('theme.master')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title mb-4">Détails de la commande</h2>
                    
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <h4 class="mb-3">Informations de livraison</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Adresse</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">Ville</label>
                                    <input type="text" class="form-control" id="city" name="city" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="postal_code" class="form-label">Code postal</label>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h4 class="mb-3">Méthode de paiement</h4>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="cash_on_delivery" value="cash_on_delivery" checked>
                                <label class="form-check-label" for="cash_on_delivery">
                                    Paiement à la livraison
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card">
                                <label class="form-check-label" for="credit_card">
                                    Carte de crédit
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-credit-card me-2"></i>Passer la commande
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4">Récapitulatif de la commande</h3>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach($cartItems as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $item->product->image) }}" 
                                                     alt="{{ $item->product->name }}" 
                                                     class="img-fluid rounded" 
                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                                <div class="ms-3">
                                                    <h6 class="mb-0">{{ $item->product->name }}</h6>
                                                    <small class="text-muted">x{{ $item->quantity }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            {{ number_format($item->product->price * $item->quantity, 2) }}DHS
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th class="text-end">{{ number_format($total, 2) }}DHS</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border-radius: 10px;
}

.form-control:focus {
    border-color: #3b5d50;
    box-shadow: 0 0 0 0.2rem rgba(59, 93, 80, 0.25);
}

.btn-primary {
    background-color: #3b5d50;
    border-color: #3b5d50;
    padding: 0.75rem 1.5rem;
}

.btn-primary:hover {
    background-color: #2d473d;
    border-color: #2d473d;
}

.form-check-input:checked {
    background-color: #3b5d50;
    border-color: #3b5d50;
}
</style>
@endsection 