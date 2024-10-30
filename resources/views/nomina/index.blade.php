@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Gestión de Nómina</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b">Empleado</th>
                    <th class="py-2 px-4 border-b">Salario</th>
                    <th class="py-2 px-4 border-b">Fecha de Pago</th>
                    <th class="py-2 px-4 border-b">Aguinaldo</th>
                    <th class="py-2 px-4 border-b">Bono 14</th>
                    <th class="py-2 px-4 border-b">Detalles de Póliza Contable</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($nominas as $nomina)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $nomina->empleado->nombre }} {{ $nomina->empleado->apellido }}</td>
                        <td class="py-2 px-4 border-b">{{ $nomina->salario }}</td>
                        <td class="py-2 px-4 border-b">{{ $nomina->fecha_pago }}</td>
                        <td class="py-2 px-4 border-b">{{ $nomina->planillaAguinaldo->monto ?? 'N/A' }}</td>
                        <td class="py-2 px-4 border-b">{{ $nomina->planillaBono14->monto ?? 'N/A' }}</td>
                        <td class="py-2 px-4 border-b">{{ $nomina->polizaContable->detalles ?? 'N/A' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
