@extends('index')
@section('contenido')
<div class='container'>
    
<h1>Resultados empleados  </h1>
<br>
<br>
<a href="{{route('vista')}}">
<button type="button" class="btn btn-dark">Alta empleados</button> </a>
<br>
<br>
@if(Session::has('mensaje'))
<div class="alert alert-info">
    <strong>Info!</strong> {{Session::get('mensaje')}}
</div>
@endif
<table class="table table-striped">
    <thead>
      <tr>
        <th>Foto</th>
        <th>Ide</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
        <th>Departamento</th>
        <th>Operacion</th>
      </tr>
    </thead>
    <tbody>
    @foreach( $consulta as $cl)
        <tr>
            <td><img src ="{{asset('archivos/'. $cl->img)}}" height=50 width=50 style="border-radius: 50px;"> </td>
        
            <td>{{$cl->id}}</td>            
            <td>{{$cl->nombre_empleado}}</td>
            <td>{{$cl->apellido_ep}}</td>
            <td>{{$cl->edad}}</td>
            <td>{{$cl->nombre}}</td>
            <td>
              @if($sessiontipo=="admi")
            <a href="{{route('modificaempleados',['id'=>$cl->id])}}"> 
            <button type="button" class="btn btn-success">Modificar</button>
            </a>
            <a href="{{route('eliminarempleados',['id'=>$cl->id])}}"> 
            <button type="button" class="btn btn-warning">Eliminar</button>  
            </a>
            @endif
          </td>
        </tr>
    @endforeach
</tbody>

  </table>
</div>
</div>
@stop