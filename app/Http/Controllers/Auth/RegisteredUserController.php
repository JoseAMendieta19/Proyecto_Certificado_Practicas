<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Institucion;
use App\Models\Carrera;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    /**
     * Mostrar formulario de registro
     */
    public function create(): View
    {
        // 👉 ENVIAMOS LAS INSTITUCIONES AL BLADE
        $instituciones = Institucion::orderBy('nombre')->get();

        return view('auth.register', compact('instituciones'));
    }

    /**
     * Registro final
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
            'institucion_id' => [
                'required',
                'exists:instituciones,id'
            ],

            'carrera_id' => [
                'required',
                Rule::exists('carreras', 'id')->where(function ($query) use ($request) {
                    $query->where('institucion_id', $request->institucion_id);
                }),
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],
        ],
            [
                'institucion_id.required' => 'Debe seleccionar una institución.',
                'institucion_id.exists' => 'La institución seleccionada no es válida.',
                'carrera_id.required' => 'Debe seleccionar una carrera.',
                'carrera_id.exists' => 'La carrera no pertenece a la institución seleccionada.',
        ]
        );

        $user = User::create([
            'nombres' => strtoupper($request->nombres),
            'apellidos' => strtoupper($request->apellidos),
            'cedula' => $request->cedula,
            'email' => strtolower($request->email),
            'institucion_id' => $request->institucion_id,
            'carrera_id' => $request->carrera_id,
            'password' => Hash::make($request->password),
            'rol' => 'estudiante',
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect('/dashboard-estudiante');
    }


    /*
    |--------------------------------------------------------------------------
    | VALIDACIONES AJAX
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

    /**
     * Validación de cédula ecuatoriana
     */
    private function validarCedulaEcuatoriana(string $cedula): bool
    {
        if (!ctype_digit($cedula) || strlen($cedula) !== 10) {
            return false;
        }

        $provincia = intval(substr($cedula, 0, 2));
        if ($provincia < 1 || $provincia > 24) {
            return false;
        }

        if (intval($cedula[2]) >= 6) {
            return false;
        }

        $digitos = array_map('intval', str_split($cedula));
        $verificador = array_pop($digitos);

        $suma = 0;
        foreach ($digitos as $i => $digito) {
            if ($i % 2 === 0) {
                $digito *= 2;
                if ($digito > 9) {
                    $digito -= 9;
                }
            }
            $suma += $digito;
        }

        $resultado = (10 - ($suma % 10)) % 10;

        return $resultado === $verificador;
    }

/*
|--------------------------------------------------------------------------
| CARRERAS POR INSTITUCIÓN (AJAX)
|--------------------------------------------------------------------------
*/
    public function carrerasPorInstitucion($institucionId)
    {
        $carreras = Carrera::where('institucion_id', $institucionId)
            ->orderBy('nombre')
            ->get(['id', 'nombre']);

        return response()->json($carreras);
    }


}
