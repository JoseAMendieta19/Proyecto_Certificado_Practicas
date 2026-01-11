<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" id="formRegistro">
        @csrf

        <!-- CÉDULA -->
        <div class="mt-4">
            <x-input-label for="cedula" value="Cédula" />
            <x-text-input
                id="cedula"
                class="block mt-1 w-full"
                type="text"
                name="cedula"
                maxlength="10"
                inputmode="numeric"
                autocomplete="off"
                autofocus
                required
                oninput="this.value=this.value.replace(/[^0-9]/g,'')"
            />
            <p id="cedula-msg" class="mt-2 text-sm"></p>
            <x-input-error :messages="$errors->get('cedula')" class="mt-2" />
        </div>

        <!-- APELLIDOS -->
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

        <!-- NOMBRES -->
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

        <!-- INSTITUCIÓN -->
        <div class="mt-4">
            <x-input-label for="institucion_id" value="Institución" />
            <select
                id="institucion_id"
                name="institucion_id"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
            >
                <option value="">Seleccione una institución</option>
                @foreach ($instituciones as $institucion)
                    <option value="{{ $institucion->id }}">
                        {{ $institucion->nombre }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('institucion_id')" class="mt-2" />
        </div>

        <!-- CARRERA -->
        <div class="mt-4">
            <x-input-label for="carrera_id" value="Carrera" />
            <select
                id="carrera_id"
                name="carrera_id"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
                disabled
            >
                <option value="">Seleccione primero una institución</option>
            </select>
            <x-input-error :messages="$errors->get('carrera_id')" class="mt-2" />
        </div>


        <!-- EMAIL -->
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

        <!-- CONTRASEÑA -->
        <div class="mt-4">
            <x-input-label for="password" value="Contraseña" />
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
            />
            <p id="password-msg" class="mt-2 text-sm"></p>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- CONFIRMAR CONTRASEÑA -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirmar contraseña" />
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
            />
            <p id="confirm-password-msg" class="mt-2 text-sm"></p>
        </div>

        <!-- BOTÓN -->
        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                ¿Ya estás registrado?
            </a>

            <x-primary-button class="ms-4" id="btnRegistrar" disabled>
                Registrarse
            </x-primary-button>
        </div>
    </form>

    <!-- CARGA DINÁMICA DE CARRERAS -->
    <script>
        const institucionSelect = document.getElementById('institucion_id');
        const carreraSelect = document.getElementById('carrera_id');

        institucionSelect.addEventListener('change', async () => {
            const institucionId = institucionSelect.value;

            carreraSelect.innerHTML = '';
            carreraSelect.disabled = true;

            if (!institucionId) {
                carreraSelect.innerHTML = '<option value="">Seleccione primero una institución</option>';
                return;
            }

            carreraSelect.innerHTML = '<option value="">Cargando carreras...</option>';

            const res = await fetch(`/instituciones/${institucionId}/carreras`);
            const carreras = await res.json();

            carreraSelect.innerHTML = '<option value="">Seleccione una carrera</option>';

            carreras.forEach(carrera => {
                const option = document.createElement('option');
                option.value = carrera.id;
                option.textContent = carrera.nombre;
                carreraSelect.appendChild(option);
            });

            carreraSelect.disabled = false;
        });
    </script>



    <!-- VALIDACIÓN EN TIEMPO REAL -->
    <script>
        const cedula = document.getElementById('cedula');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');
        const btn = document.getElementById('btnRegistrar');
        const institucion = document.getElementById('institucion_id');
        const carrera = document.getElementById('carrera_id');

        let institucionOK = false;
        let carreraOK = false;

        let cedulaOK = false;
        let emailOK = false;
        let passwordOK = false;
        let confirmOK = false;

        function actualizarBoton() {
            btn.disabled = !(
                cedulaOK &&
                emailOK &&
                passwordOK &&
                confirmOK &&
                institucionOK &&
                carreraOK
            );
        }

        /* CÉDULA */
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
            msg.className = data.valido ? 'text-green-600' : 'text-red-600';
            cedulaOK = data.valido;
            actualizarBoton();
        });

        /* EMAIL */
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
            msg.className = data.valido ? 'text-green-600' : 'text-red-600';
            emailOK = data.valido;
            actualizarBoton();
        });

        /* CONTRASEÑA */
        password.addEventListener('input', () => {
            const msg = document.getElementById('password-msg');
            const value = password.value;

            const valida = value.length >= 8 && /[A-Za-z]/.test(value) && /[0-9]/.test(value);

            if (!valida) {
                msg.textContent = 'Mínimo 8 caracteres, letras y números';
                msg.className = 'text-red-600';
                passwordOK = false;
            } else {
                msg.textContent = 'Contraseña válida';
                msg.className = 'text-green-600';
                passwordOK = true;
            }

            confirmPassword.dispatchEvent(new Event('input'));
            actualizarBoton();
        });

        /* CONFIRMAR CONTRASEÑA */
        confirmPassword.addEventListener('input', () => {
            const msg = document.getElementById('confirm-password-msg');

            if (confirmPassword.value === '') {
                msg.textContent = '';
                confirmOK = false;
            } else if (confirmPassword.value !== password.value) {
                msg.textContent = 'Las contraseñas no coinciden';
                msg.className = 'text-red-600';
                confirmOK = false;
            } else {
                msg.textContent = 'Las contraseñas coinciden';
                msg.className = 'text-green-600';
                confirmOK = true;
            }

            actualizarBoton();
        });

        /* ENTER → SIGUIENTE CAMPO */
        const inputs = document.querySelectorAll('input');

        inputs.forEach((input, index) => {
            input.addEventListener('keydown', e => {
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
        
        /* INSTITUCIÓN */
        institucion.addEventListener('change', () => {
            institucionOK = institucion.value !== '';
            carreraOK = false; // reset cuando cambia institución
            actualizarBoton();
        });

        /* CARRERA */
        carrera.addEventListener('change', () => {
            carreraOK = carrera.value !== '';
            actualizarBoton();
        });

    </script>
</x-guest-layout>
