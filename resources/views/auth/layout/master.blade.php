<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Login</title>
    @vite(['resources/sass/auth-app.scss', 'resources/js/auth-app.js'])
    <link rel="shortcut icon" href="https://cdn.worldvectorlogo.com/logos/laravel-2.svg" type="image/x-icon">
</head>
<body>
    <main class="login">
    @yield('login')
      {{-- <div class="login-card">
        <header class="login-header"><h1>Iniciar sesión</h1></header>
        <form action="" class="login-form">
          <div class="form-field">
            <label for="email">Email</label>
            <input type="email" name="email">
          </div>
          <div class="form-field">
            <label for="password">Contraseña</label>
            <input type="password" name="password">
          </div>
          <div class="form-row">
            <a class="forgot-password" href="">¿Olvidaste la contraseña?</a>
            <button class="login-button">Iniciar sesión</button>
          </div>
        </form>
      </div> --}}
    </main>
</body>
</html>