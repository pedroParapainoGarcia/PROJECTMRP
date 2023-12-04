<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detalle de la Compra</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Detalle de la Compra</h1>
    <p>Proveedor: {{$proveedor}}</p>
    <p>Direccion: {{$direccion}}</p>
    <p>Fecha: {{$fecha}}</p>
    <table>
        <thead>
            <tr>
                <th style="background-color: lightblue;">Nombre Articulo</th>               
                <th style="background-color: lightblue;">Cantidad</th>
                <th style="background-color: lightblue;">Precio</th>
                <th style="background-color: lightblue;">SubTotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detallecompras as $detalle)
                <tr>
                    <td>{{ $detalle->Producto->nombre}}</td>                  
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->costounitario }}</td>
                    <td>{{ $detalle->cantidad * $detalle->costounitario }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p style="text-align: right;">Costo Total: {{ $costoTotal }}</p>
</body>
</html>