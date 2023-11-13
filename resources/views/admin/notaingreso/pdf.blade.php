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
    <h1>Notas de Ingreso Articulos</h1>
    <table>
        <thead>
            <tr>

                <th style="background-color: lightblue;">Fecha</th>
                <th style="background-color: lightblue;">Total</th>
                <th style="background-color: lightblue;">Proveedor</th>


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
                    <td>{{ $nota->fecha }}</td>
                    <td>{{ $nota->costototal }}</td>
                    <td>{{ $nota->provedor->nombre }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <p style="text-align: right;">Costo Total: {{ $totalCompras }}</p>
</body>

</html>
