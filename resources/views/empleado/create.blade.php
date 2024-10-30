Formulario de cración de empleado
<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
    @csrf
<body>


@include('empleado.form', ['modo'=>'Crear'])
</body>
</form>
