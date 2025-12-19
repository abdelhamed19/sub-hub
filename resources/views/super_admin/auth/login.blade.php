<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @if (app()->getLocale() == 'ar')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    @endif
</head>

<body class="bg-light">
    <div class="container">
        <!-- Language Switcher -->
        <div class="d-flex justify-content-end p-3">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    {{ strtoupper(app()->getLocale()) }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">EN</a></li>
                    <li><a class="dropdown-item" href="{{ route('lang.switch', 'ar') }}">AR</a></li>
                </ul>
            </div>
        </div>

        <!-- Login Card -->
        <div class="row justify-content-center align-items-center" style="height: 80vh;">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">{{ __('auth.login') }}</h3>

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form method="POST" action="{{ route('super_admin.auth.login.submit') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('auth.email') }}</label>
                                <input type="email" name="email" id="email" class="form-control" required
                                    autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('auth.password') }}</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">{{ __('auth.login') }}</button>
                                <a href="{{ route('befor_auth') }}" role="button" class="btn btn-secondary mt-2">Back</a>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="">{{ __('auth.forgot_password') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
