<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    
    <title>Ejemplo laravle 8</title>
</head>
<body>
    <h1>Hola desde la pagina empleados </h1>
   
    <br>
    Nombre del elmpeado {{$nombre}} trabajo {{$dias}} dias y su pago es de {{$nomina}}  
    <br>
    @if($nombre=="Andres")
    <h1>Hola Andres</h1>
    <br>
    <img src="{{asset('fotos/Andres.PNG')}}">
    @endif
    @if($nombre=="Esteban")
    <h1>Hola Esteban</h1>
    <br>
    <img src="{{asset('fotos/Esteban.jpg')}}" style="border-radius: 70px">
    @else
    <h1>Sin foto</h1>
    @endif
    <br>
    <a href="{{route('salir')}}">Cerrar</a>
   
</body>
</html>