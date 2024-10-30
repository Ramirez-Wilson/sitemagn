

@if(Session::has('mensaje'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
        {{ Session::get('mensaje') }}
    </div>
@endif

<!-- Botón para Ingresar nuevo empleado -->
<a href="{{ url('empleado/create') }}"
   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
    Ingresar nuevo empleado
</a>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<body>
<!-- Tabla responsiva -->
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
        <thead>
        <tr class="bg-gray-100 border-b border-gray-200">
            <th class="py-2 px-4 text-left font-medium text-gray-600">#</th>
            <th class="py-2 px-4 text-left font-medium text-gray-600">Nombre</th>
            <th class="py-2 px-4 text-left font-medium text-gray-600">Apellido</th>
            <th class="py-2 px-4 text-left font-medium text-gray-600">Fecha de creación</th>
            <th class="py-2 px-4 text-left font-medium text-gray-600">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($empleados as $empleado)
            <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="py-2 px-4">{{ $loop->iteration }}</td>
                <td class="py-2 px-4">{{ $empleado-> nombre }}</td>
                <td class="py-2 px-4">{{ $empleado-> apellido }}</td>
                <td class="py-2 px-4">{{ $empleado-> fecha_contratacion }}</td>
                <td class="py-2 px-4 flex flex-col sm:flex-row">
                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}"
                       class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 px-4 rounded mr-2 text-center sm:w-auto">
                       Editar
                    </a>

                    <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Yellow</button>

                    <form action="{{ url('/empleado/'.$empleado->id) }}" method="post" class="inline-block">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('Quieres eliminar un empleado de la lista')"
                               value="Borrar"
                               class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 w-full sm:w-auto text-center rounded">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
<!-- Paginación responsiva -->
<div class="flex justify-between items-center mt-4">
    <!-- Botón "Anterior" -->
    @if ($empleados->onFirstPage())
        <span class="text-gray-500">Anterior</span>
    @else
        <a href="{{ $empleados->previousPageUrl() }}"
           class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            Anterior
        </a>
    @endif

    <!-- Botón "Siguiente" -->
    @if ($empleados->hasMorePages())
        <a href="{{ $empleados->nextPageUrl() }}"
           class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            Siguiente
        </a>
    @else
        <span class="text-gray-500">Siguiente</span>
    @endif
</div>
