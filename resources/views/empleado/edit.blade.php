formularios para editar empleado

<form action="{{ url('/empleado/' .$empleado->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Esto indica que es una actualización -->
    @include('empleado.form', ['modo'=>'Editar'])
</form>
