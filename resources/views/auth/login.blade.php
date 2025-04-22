@extends('theme.master')

@section('content')
<div class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="auth-card">
                    <div class="text-center mb-4">
                        <h2 class="section-title">Connexion</h2>
                        <p class="text-muted">Bienvenue sur S&B Store</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" 
                                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Se souvenir de moi
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                Se connecter
                            </button>
                        </div>

                        <div class="text-center mt-4">
                            @if (Route::has('password.request'))
                                <a class="text-muted" href="{{ route('password.request') }}">
                                    Mot de passe oublié ?
                                </a>
                            @endif
                            <p class="mt-3 mb-0">
                                Pas encore de compte ? 
                                <a href="{{ route('register') }}" class="text-primary">S'inscrire</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.auth-section {
    padding: 80px 0;
    background-color: #f8f9fa;
    min-height: calc(100vh - 200px);
    display: flex;
    align-items: center;
}

.auth-card {
    background: white;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
}

.section-title {
    color: #2f2f2f;
    margin-bottom: 10px;
    font-size: 2rem;
}

.form-label {
    font-weight: 500;
    color: #2f2f2f;
}

.form-control {
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 0.95rem;
}

.form-control:focus {
    border-color: #3b5d50;
    box-shadow: 0 0 0 0.2rem rgba(59, 93, 80, 0.15);
}

.btn-primary {
    background-color: #3b5d50;
    border-color: #3b5d50;
    padding: 12px 30px;
    font-weight: 500;
    border-radius: 8px;
}

.btn-primary:hover {
    background-color: #2f4a40;
    border-color: #2f4a40;
}

.text-primary {
    color: #3b5d50 !important;
}

.text-primary:hover {
    color: #2f4a40 !important;
    text-decoration: none;
}
</style>
@endsection 