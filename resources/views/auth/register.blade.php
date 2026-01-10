<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" id="formRegistro">
        @csrf

        <!-- Cédula -->
        <div class="mt-4">
            <x-input-label for="cedula" value="Cédula" />
            <x-text-input
                id="cedula"
                class="block mt-1 w-full"
                type="text"
                name="cedula"
                required
                maxlength="10"
                inputmode="numeric"
                autocomplete="off"
                autofocus
                oninput="this.value=this.value.replace(/[^0-9]/g,'')"
            />
            <p id="cedula-msg" class="mt-2 text-sm"></p>
            <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
        </div>

        <!-- Apellidos -->
        <div class="mt-4">
            <x-input-label for="apellidos" value="Apellidos completos" />
            <x-text-input
                id="apellidos"
                class="block mt-1 w-full"
                type="text"
                name="apellidos"
                required
                autocomplete="off"
                oninput="this.value=this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g,'').toUpperCase()"
            />
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>

        <!-- Nombres -->
        <div class="mt-4">
            <x-input-label for="nombres" value="Nombres completos" />
            <x-text-input
                id="nombres"
                class="block mt-1 w-full"
                type="text"
                name="nombres"
                required
                autocomplete="off"
                oninput="this.value=this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g,'').toUpperCase()"
            />
            <x-input-error :messages="$errors->get('nombres')" class="mt-2" />
        </div>

        <!-- Institución -->
        <div class="mt-4">
            <x-input-label for="institucion" value="Institución" />
            <x-text-input id="institucion" class="block mt-1 w-full" type="text" name="institucion" required />
            <x-input-error :messages="$errors->get('institucion')" class="mt-2" />
        </div>

        <!-- Carrera -->
        <div class="mt-4">
            <x-input-label for="carrera" value="Carrera" />
            <x-text-input id="carrera" class="block mt-1 w-full" type="text" name="carrera" required />
            <x-input-error :messages="$errors->get('carrera')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" value="Correo electrónico" />
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                required
                autocomplete="off"
            />
            <p id="email-msg" class="mt-2 text-sm"></p>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" value="Contraseña" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirmar contraseña" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                ¿Ya estás registrado?
            </a>

            <x-primary-button class="ms-4" id="btnRegistrar" disabled>
                Registrarse
            </x-primary-button>
        </div>
    </form>

    <!-- VALIDACIÓN EN TIEMPO REAL -->
    <script>
        const cedula = document.getElementById('cedula');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');
        const btn = document.getElementById('btnRegistrar');

        let cedulaOK = false;
        let emailOK = false;
        let passwordOK = false;
        let confirmOK = false;

        function actualizarBoton() {
            btn.disabled = !(cedulaOK && emailOK && passwordOK && confirmOK);
        }

        /* ===============================
        VALIDACIÓN CÉDULA
        =============================== */
        cedula.addEventListener('blur', async () => {
            if (cedula.value.length !== 10) return;

            const res = await fetch("{{ route('validar.cedula') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ cedula: cedula.value })
            });

            const data = await res.json();
            const msg = document.getElementById('cedula-msg');

            msg.textContent = data.mensaje;
            msg.className = data.valido ? 'text-green-600 text-sm' : 'text-red-600 text-sm';
            cedulaOK = data.valido;
            actualizarBoton();
        });

        /* ===============================
        VALIDACIÓN EMAIL
        =============================== */
        email.addEventListener('blur', async () => {
            const res = await fetch("{{ route('validar.email') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email: email.value })
            });

            const data = await res.json();
            const msg = document.getElementById('email-msg');

            msg.textContent = data.mensaje;
            msg.className = data.valido ? 'text-green-600 text-sm' : 'text-red-600 text-sm';
            emailOK = data.valido;
            actualizarBoton();
        });

        /* ===============================
        VALIDACIÓN CONTRASEÑA
        =============================== */
        password.addEventListener('input', () => {
            let msg = password.nextElementSibling;
            const value = password.value;

            const valida =
                value.length >= 8 &&
                /[A-Za-z]/.test(value) &&
                /[0-9]/.test(value);

            if (!valida) {
                msg.textContent = 'Debe tener mínimo 8 caracteres, letras y números';
                msg.className = 'text-red-600 text-sm';
                passwordOK = false;
            } else {
                msg.textContent = 'Contraseña válida';
                msg.className = 'text-green-600 text-sm';
                passwordOK = true;
            }

            // Forzar revalidación de confirmación
            confirmPassword.dispatchEvent(new Event('input'));
            actualizarBoton();
        });

        /* ===============================
        CONFIRMAR CONTRASEÑA
        =============================== */
        confirmPassword.addEventListener('input', () => {
            let msg = confirmPassword.nextElementSibling;

            if (confirmPassword.value === '') {
                msg.textContent = '';
                confirmOK = false;
            } else if (confirmPassword.value !== password.value) {
                msg.textContent = 'Las contraseñas no coinciden';
                msg.className = 'text-red-600 text-sm';
                confirmOK = false;
            } else {
                msg.textContent = 'Las contraseñas coinciden';
                msg.className = 'text-green-600 text-sm';
                confirmOK = true;
            }

            actualizarBoton();
        });

        /* ===============================
        ENTER → SIGUIENTE CAMPO
        =============================== */
        const inputs = document.querySelectorAll('input');

        inputs.forEach((input, index) => {
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    if (inputs[index + 1]) {
                        inputs[index + 1].focus();
                    } else if (!btn.disabled) {
                        document.getElementById('formRegistro').submit();
                    }
                }
            });
        });
    </script>


</x-guest-layout>
