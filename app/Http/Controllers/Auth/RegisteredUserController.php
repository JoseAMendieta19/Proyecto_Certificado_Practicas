<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Mostrar formulario de registro
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Registro final (al presionar "Registrarse")
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombres' => [
                'required',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
                'max:255'
            ],
            'apellidos' => [
                'required',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
                'max:255'
            ],
            'cedula' => [
                'required',
                'digits:10',
                'unique:users,cedula',
                function ($attribute, $value, $fail) {
                    if (!$this->validarCedulaEcuatoriana($value)) {
                        $fail('La cédula ingresada no es válida.');
                    }
                }
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email'
            ],
            'institucion' => ['required', 'string', 'max:255'],
            'carrera' => ['required', 'string', 'max:255'],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],
        ]);

        $user = User::create([
            'nombres' => strtoupper($request->nombres),
            'apellidos' => strtoupper($request->apellidos),
            'cedula' => $request->cedula,
            'email' => strtolower($request->email),
            'institucion' => $request->institucion,
            'carrera' => $request->carrera,
            'password' => Hash::make($request->password),
            'rol' => 'estudiante',
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect('/dashboard-estudiante');
    }

    /*
    |--------------------------------------------------------------------------
    | VALIDACIONES EN TIEMPO REAL (AJAX)
    |--------------------------------------------------------------------------
    */

    public function validarCedula(Request $request)
    {
        $cedula = $request->cedula;

        if (!preg_match('/^\d{10}$/', $cedula)) {
            return response()->json([
                'valido' => false,
                'mensaje' => 'La cédula debe tener 10 dígitos.'
            ]);
        }

        if (!$this->validarCedulaEcuatoriana($cedula)) {
            return response()->json([
                'valido' => false,
                'mensaje' => 'La cédula ingresada no es válida.'
            ]);
        }

        if (User::where('cedula', $cedula)->exists()) {
            return response()->json([
                'valido' => false,
                'mensaje' => 'Ya existe una cuenta con esta cédula.'
            ]);
        }

        return response()->json([
            'valido' => true,
            'mensaje' => 'Cédula válida.'
        ]);
    }

    public function validarEmail(Request $request)
    {
        $email = strtolower($request->email);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'valido' => false,
                'mensaje' => 'Correo electrónico no válido.'
            ]);
        }

        if (User::where('email', $email)->exists()) {
            return response()->json([
                'valido' => false,
                'mensaje' => 'Este correo ya está registrado.'
            ]);
        }

        return response()->json([
            'valido' => true,
            'mensaje' => 'Correo disponible.'
        ]);
    }

    private function validarCedulaEcuatoriana(string $cedula): bool
    {
        $cedula = trim($cedula);

        if (!ctype_digit($cedula)) return false;
        if (strlen($cedula) !== 10) return false;

        $provincia = intval(substr($cedula, 0, 2));
        if ($provincia < 1 || $provincia > 24) return false;

        $tercerDigito = intval($cedula[2]);
        if ($tercerDigito >= 6) return false;

        $digitos = array_map('intval', str_split($cedula));
        $verificador = array_pop($digitos);

        $suma = 0;
        foreach ($digitos as $i => $digito) {
            if ($i % 2 === 0) {
                $digito *= 2;
                if ($digito > 9) $digito -= 9;
            }
            $suma += $digito;
        }

        $resultado = (10 - ($suma % 10)) % 10;

        return $resultado === $verificador;
    }


}
