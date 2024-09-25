<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Buscar el usuario en la base de datos
        $user = Login::where('username', $request->username)->first();

        // Validar credenciales
        if ($user && Hash::check($request->password, $user->password)) {
            // Autenticar al usuario
            Auth::login($user);
            return redirect()->route('dashboard'); // Cambia 'dashboard' por la ruta a donde quieras redirigir
        }
        // Si las credenciales son incorrectas, redirigir con un mensaje de error
        return back()->withErrors(['username' => 'Las credenciales no son correctas.']);

        // Usando Eloquent para obtener todos los empleados
        //$empleados = Login::all();
        // Imprimir los datos y detener la ejecución
        //dd($empleados);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // Cambia 'login' por la ruta de tu formulario de login
    }

    public function obtenerEmpleados()
    {
        // Usando Eloquent para obtener todos los empleados
        $empleados = Empleado::all();

        // Imprimir los datos y detener la ejecución
        dd($empleados);
    }

}


