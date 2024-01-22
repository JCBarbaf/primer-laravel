@extends('auth.layout.master')
@section('login')
  <div class="login-card">
    <header class="login-header"><h1>Iniciar sesión</h1></header>
    <form method="POST" action="{{ route('login') }}" class="login-form">
      @csrf
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
  </div>
@endsection