<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$datos['empleados']=Empleado::all();

        $datos['empleados']  = Empleado::orderBy('id', 'asc')->paginate(10);  // Ordenar por ID ascendente
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosEmpleado = request()->all();
/*        $datosEmpleado = request()->except('_token');
        Empleado::insert($datosEmpleado);
        return response()->json($datosEmpleado);*/
        // Validar los datos si es necesario

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
        ]);

        // Insertar los datos en la base de datos usando Eloquent
        Empleado::insert($validatedData);

        // Redireccionar o mostrar mensaje de éxito
        return redirect('/empleado')->with('mensaje', 'Empleado creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
        ]);
        $empleado = Empleado::findOrFail($id);
        $empleado->update($validatedData);
        //dd($empleado);
        //return response()->json($validatedData);
        // Redireccionar o mostrar mensaje de éxito
        return redirect('/empleado')->with('success', 'Empleado actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        return redirect('empleado')->with('mensaje', 'Empleado eliminado');

    }
}
