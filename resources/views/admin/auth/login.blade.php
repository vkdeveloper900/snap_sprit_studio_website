<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Snap Spirit Studio</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.layouts.auth-css')
</head>
<body class="auth-body">
    <div class="auth-container">
        <div class="auth-box">
            <!-- Logo/Branding -->
            <div class="auth-header">
                <h1>Snap Spirit Studio</h1>
                <p>Administration</p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('admin.login.post') }}" class="auth-form">
                @csrf

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                        autofocus
                    >
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Enter your password"
                        required
                    >
                    @error('password')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="form-group checkbox">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    <label for="remember">Remember me</label>
                </div>

                <!-- Login Button -->
                <button type="submit" class="btn btn-login">
                    Sign In
                </button>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </form>

            <!-- Footer Note -->
            <div class="auth-footer">
                <p>Contact admin to create a new account</p>
            </div>
        </div>
    </div>

    @include('admin.layouts.auth-js')
</body>
</html>

