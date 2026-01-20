<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<x-guest-layout>

    <style>
        body {
    background-color: #f4f6f8;
   
    }

.login-card {
    background: #ffffff;
    padding: 48px 44px;
    border-radius: 14px;
    box-shadow:
        0 10px 25px rgba(0,0,0,0.06),
        0 2px 8px rgba(0,0,0,0.04);
    max-width: 420px;
    margin: 0 auto;
}
body {
    font-family: 'Inter', sans-serif !important;
    background-color: #f4f6f8;
}

.uleam-logo {
    display: block;
    margin: 0 auto 24px;
    height: 90px;
    width: auto;
}

.login-title {
    font-family: 'Inter', sans-serif;
    font-size: 1.45rem;
    font-weight: 600;
    color: #111827;
    text-align: center;
    margin-bottom: 24px;
    letter-spacing: 0.2px;
    position: relative;
}

.login-title::after {
    content: "";
    display: block;
    width: 48px;
    height: 3px;
    background: #b91c1c;
    margin: 12px auto 0;
    border-radius: 2px;
}


/* Inputs más agradables */
input[type="email"],
input[type="password"] {
    padding: 10px 12px;
    border-radius: 8px;
}

/* Checkbox */
input[type="checkbox"] {
    accent-color: #b91c1c;
}

/* Botón principal */
.btn-primary {
    background-color: #b91c1c !important;
    border-color: #b91c1c !important;
    padding: 10px 22px;
    border-radius: 8px;
    font-weight: 500;
}

.btn-primary:hover {
    background-color: #991b1b !important;
}

/* Volver */
.back-link {
    display: inline-block;
    margin-bottom: 16px;
    font-size: 0.9rem;
    color: #b91c1c;
    text-decoration: none;
    font-weight: 500;
}

.back-link:hover {
    text-decoration: underline;
}

    </style>

    <div class="login-card">
        <!-- Volver -->
        <a href="{{ url('/') }}" class="back-link">
    ← Volver al inicio
</a>


        <!-- Logo ULEAM -->
        <img
            src="https://aulavirtualmoodle.uleam.edu.ec/pluginfile.php/1/core_admin/logo/0x200/1767816587/logo_ULEAM_2017_vertical.png"
            alt="Logo ULEAM"
            class="uleam-logo"
        >

        

        <h1 class="login-title">INICIAR SESIÓN</h1>
        <!-- Estado de sesión -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Correo -->
            <div>
                <x-input-label for="email" value="Correo electrónico" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Contraseña -->
            <div class="mt-4">
                <x-input-label for="password" value="Contraseña" />
                <x-text-input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Recordarme -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="rounded border-gray-300 text-red-700 shadow-sm focus:ring-red-700"
                        name="remember"
                    >
                    <span class="ms-2 text-sm text-gray-600">
                        Mantener sesión iniciada
                    </span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a
                        class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('password.request') }}"
                    >
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif

                <x-primary-button class="btn-primary">
                    Ingresar
                </x-primary-button>
            </div>
        </form>
    </div>

</x-guest-layout>
