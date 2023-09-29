@extends('index')

@section('contenido')

<div class="container">
  <div class="row">
    <div class="col">
    <h2>Modificar empleado</h2>
    <form action="{{route('guardarcambios')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field() }}
    <label for='ide'>Identificador : </label> <br>
    @if($errors->first('identificador'))
    <p class ='text-danger'>{{$errors->first('identificador')}}</p>
    @endif
    <input type="text" name='ide' id='ide ' value= "{{$consulta->id}}" readonly='readonly'>
    <p></p>
    <label for='nombre'>Ingrese su nombre : </label> <br>
    @if($errors->first('nombre'))
    <p class ='text-danger'>{{$errors->first('nombre')}}</p>
    @endif
    <input type="text" name='nombre' id='nombre' value= "{{$consulta->nombre_empleado}}" >
    <p></p>
    <label for='edad'>Ingrese su edad : </label> <br>
    @if($errors->first('edad'))
    <p class ='text-danger'>{{$errors->first('edad')}}</p>
    @endif
    <input type="text" name='edad' id='edad'value="{{$consulta->edad}}">
    <p></p>
    <label for= 'apellido '>Ingrese su apellido : </label> <br>
    @if($errors->first('apellido'))
    <p class ='text-danger'>{{$errors->first('apellido')}}</p>
    @endif
    <input type="text" name='apellido' id='apellido' value="{{$consulta->apellido_ep}}">
   <p></p>
    <label for='telefono'>Ingrese su numero de telefono :</label><br>
    @if($errors->first('telefono'))
    <p class ='text-danger'>{{$errors->first('telefono')}}</p>
    @endif
    <input type="number" name='telefono' id='telefono' value="{{$consulta->telefono}}" >
    <p></p>
    <label for='email'>Ingrese su correo electronico :</label><br>
    @if($errors->first('email'))
    <p class ='text-danger'>{{$errors->first('email')}}</p>
    @endif
    <input type="email"  name='email' id='email' value="{{$consulta->email}}">
    <p></p> 
    <label for="dep">Departamento:</label>
    @if($errors->first('dep'))
    <p class ='text-danger'>{{$errors->first('dep')}}</p>
    @endif
    <select name="dep" id="dep">
        <option value="{{$consulta->nombre}}" disabled selected>{{$consulta->nombre}}</option> 
        @foreach($departamentos as $depa)
        <option value="{{$depa->id}}">{{$depa->nombre}}</option>
        @endforeach  
    <p></p>   
    <label for="inf">Informacion</label>
    @if($errors->first('inf'))
    <p class ='text-danger'>{{$errors->first('inf')}}</p>
    @endif
    <textarea class="form-control" rows="5" value=""id="inf" name="inf" >{{$consulta->inf}}</textarea> 
    
    <p></p>  <label for="dni">Foto De perfil :</label> 
    <td ><img src ="{{asset('archivos/'. $consulta->img)}}" height=150 width=150 style="border-radius: 50px;" > </td>
    @if($errors->first('img'))  
    <p class ='text-danger'>{{$errors->first('img')}}</p>
    @endif 
    <input type="file" name='img' id='img' class='form-control' tabindex="6"> 
    <button type="submit" class="btn btn-primary">Editar  datos</button>
    </form>
    </div>
    <div class="col">
      Column
    </div>
    <div class="col">
      Column
    </div>
  </div>
</div>
@stop