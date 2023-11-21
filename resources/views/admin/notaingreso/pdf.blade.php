<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Notas de Compra</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h1>Notas de Compra</h1>
    <h3>Reporte de Ingreso de Articulos</h3>
    <p>Fecha Inicial : {{ $fechaInicio }}</p>
    <p>Fecha Final : {{ $fechaFin }}</p>


    <table>
        <thead>
            <tr>
                <th style="background-color: lightblue;">Nro Documento</th>
                <th style="background-color: lightblue;">Fecha</th>
                <th style="background-color: lightblue;">Proveedor</th>
                <th style="background-color: lightblue;">Total</th>

            </tr>
        </thead>
        <tbody>
            @php
                $totalCompras = 0;
            @endphp
            @foreach ($notadecompras as $nota)
                @php
                    $totalCompras += $nota->costototal;
                @endphp
                <tr>
                    <td>{{ $nota->id }}</td>
                    <td>{{ $nota->fecha }}</td>
                    <td>
                        @foreach ($proveedores as $proveedor)
                            @if ($nota->id_proveedor == $proveedor->id)
                                <h5><span>{{ $proveedor->nombre }}</span></h5>
                            @endif
                        @endforeach


                    </td>
                    <td>{{ $nota->costototal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p style="text-align: right;">Costo Total: {{ $totalCompras }}</p>
</body>

</html>
