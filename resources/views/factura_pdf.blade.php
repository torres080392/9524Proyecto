<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
</head>
<body>
    <h1>Factura</h1>
    
     
    <p>Proveedor: {{ $facturas->proveedor_id ?$facturas->proveedor->name : " N/A" }}</p>   
    <p>Fecha Factura: {{ $facturas->fecha }}</p>
    <p>Fecha Limite: {{ $facturas->fecha_limite }}</p>
    <p>Descripcion: {{ $facturas->descripcion }}</p>
    <p>Iva: {{ $facturas->iva }}</p>
    <p>Sub Total: {{ $facturas->sub_total }}</p>
    <p>Total: {{ $facturas->total }}</p>
    

    <!-- Agrega más detalles de la factura según sea necesario -->
</body>
</html>
