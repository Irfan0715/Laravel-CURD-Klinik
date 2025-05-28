@extends('layouts.app')

@section('content')
<div class="auth-wrapper">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-8">
                <div class="card auth-card">
                    <div class="row g-0">
                        <div class="col-md-6 bg-info text-white d-flex align-items-center">
                            <div class="p-4 p-md-5">
                                <h2 class="fw-bold mb-3">Create New Password</h2>
                                <p class="mb-4">Please enter your new password to secure your account.</p>
                                <div class="d-none d-md-block">
                                    <i class="fas fa-lock fa-5x opacity-50"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="card-title text-center mb-4">{{ __('Reset Password') }}</h3>

                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-floating mb-3">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                                        <label for="email">{{ __('Email Address') }}</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                        <label for="password">{{ __('Password') }}</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-floating mb-4">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                    </div>

                                    <div class="d-grid mb-4">
                                        <button type="submit" class="btn btn-info btn-lg text-white">
                                            <i class="fas fa-save me-2"></i>{{ __('Reset Password') }}
                                        </button>
                                    </div>

                                    <div class="text-center">
                                        <a href="{{ route('login') }}" class="text-info">
                                            <i class="fas fa-arrow-left me-2"></i>Back to Login
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.auth-wrapper {
    height: calc(100vh - 72px);
    margin-top: -24px;
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1538108149393-fbbd81895907?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    overflow: hidden;
    display: flex;
    align-items: center;
    position: relative;
    z-index: 1;
}

.auth-card {
    border: none;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.25);
    backdrop-filter: blur(10px);
    background: rgba(255, 255, 255, 0.95);
    transform: translateY(0);
    transition: all 0.3s ease;
    margin-top: -2rem;
}

.auth-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
}

.auth-card .bg-info {
    background: linear-gradient(135deg, #36b9cc 0%, #258391 100%) !important;
    position: relative;
    overflow: hidden;
}

.auth-card .bg-info::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
    opacity: 0.1;
}

.form-floating > .form-control:focus,
.form-floating > .form-control:not(:placeholder-shown) {
    padding-top: 1.625rem;
    padding-bottom: 0.625rem;
}

.form-floating > .form-control:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label {
    opacity: .65;
    transform: scale(.85) translateY(-0.5rem) translateX(0.15rem);
}

.btn-info {
    background: linear-gradient(135deg, #36b9cc 0%, #258391 100%);
    border: none;
    transition: all 0.3s ease;
}

.btn-info:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(54, 185, 204, 0.3);
}

.form-control {
    border-radius: 0.5rem;
}

.form-control:focus {
    box-shadow: 0 0 0 0.25rem rgba(54, 185, 204, 0.25);
}

.text-info {
    color: #36b9cc !important;
    text-decoration: none;
    transition: all 0.3s ease;
}

.text-info:hover {
    color: #258391 !important;
    text-decoration: none;
}
</style>
@endsection
