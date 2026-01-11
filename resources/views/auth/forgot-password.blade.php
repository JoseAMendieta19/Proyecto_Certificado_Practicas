<x-guest-layout>
    <a href="{{ route('login') }}" class="back-link">
    ← Volver al inicio de sesión
</a>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Olvidaste tu contraseña?
No te preocupes. Ingresa tu correo electrónico y te enviaremos un enlace para que puedas crear una nueva contraseña.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Enviar enlace de recuperación') }}
            </x-primary-button>
        </div>
    </form>


    <style>
/* Fondo general (igual que login) */
body {
    background: linear-gradient(
        rgba(0,0,0,0.35),
        rgba(0,0,0,0.35)
    ),
    url("https://joselias2022.com/wp-content/uploads/2024/11/fu1-frontis-uleam.jpeg?w=1024");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
}

/* Contenedor tipo tarjeta */
.x-guest-layout > div,
.x-guest-layout form {
    background: rgba(255, 255, 255, 0.95);
}

/* Caja principal */
.x-guest-layout {
    max-width: 420px;
    margin: 70px auto;
    padding: 42px 40px;
    border-radius: 18px;
    box-shadow:
        0 20px 40px rgba(0,0,0,0.15),
        0 4px 10px rgba(0,0,0,0.08);
    backdrop-filter: blur(6px);
}

/* Texto explicativo */
.text-gray-600 {
    font-family: 'Poppins', 'Segoe UI', sans-serif;
    font-size: 0.95rem;
    color: #374151 !important;
    line-height: 1.6;
    text-align: center;
    margin-bottom: 28px;
}

/* Inputs */
input[type="email"] {
    padding: 12px 14px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    transition: all 0.25s ease;
}

input[type="email"]:focus {
    border-color: #b91c1c;
    box-shadow: 0 0 0 2px rgba(185, 28, 28, 0.15);
}

/* Botón */
button,
.x-primary-button {
    background-color: #b91c1c !important;
    border-color: #b91c1c !important;
    padding: 12px 26px;
    border-radius: 10px;
    font-weight: 600;
    letter-spacing: 0.4px;
    transition: all 0.25s ease;
}

button:hover,
.x-primary-button:hover {
    background-color: #7f1d1d !important;
    transform: translateY(-1px);
}

/* Botón volver */
.back-link {
    display: inline-block;
    margin-bottom: 22px;
    font-size: 0.9rem;
    font-weight: 500;
    color: #b91c1c;
    text-decoration: none;
    font-family: 'Poppins', 'Segoe UI', sans-serif;
    transition: all 0.2s ease;
}

.back-link:hover {
    color: #7f1d1d;
    text-decoration: underline;
}

</style>

</x-guest-layout>
