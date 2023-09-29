@extends('index')

@section('contenido')
<div class='container'> 

<h1>Bienvenido aqui puedes regristrarte al sistema</h1>
<br>
<b><p>Ingresa Tus datos segun las intruciones del formulario</p></b>
<div class="card-body">
    <form action="{{route('validar_user')}}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <label for='identificador'>Identificador : </label> <br>
            @if($errors->first('identificador'))
            <p class ='text-danger'>{{$errors->first('identificador')}}</p>
            @endif
            <input type="text" name='identificador' class="form-control"  id='identificador ' value="{{$idesigue}}" readonly='readonly'>
            <p></p>
           <label for="nombre">Nombre</label>
            @if($errors->first('nombre'))
            <p class ='text-danger'>{{$errors->first('nombre')}}</p>
            @endif
            <input type="text" class="form-control"  name="nombre" placeholder="nombre">
            <label for="apellido">Apellido</label>
            @if($errors->first('apellido'))
            <p class ='text-danger'>{{$errors->first('apellido')}}</p>
            @endif
            <input type="text" class="form-control"  name="apellido" placeholder="apellido">
            <label for="user">Correo electronico</label>
            @if($errors->first('user'))
            <p class ='text-danger'>{{$errors->first('user')}}</p>
            @endif
            <input type="text" class="form-control"  name="user" placeholder="correo electronico">         
       
           <label for="pasw">Contraseña</label>
            @if($errors->first('pasw'))
            <p class ='text-danger'>{{$errors->first('pasw')}}</p>
            @endif
            <input type="password" class="form-control"  name="pasw" placeholder="password">
            <label for="tipo">Tipo Usuario</label>
            @if($errors->first('tipo'))
            <p class ='text-danger'>{{$errors->first('tipo')}}</p>
            @endif
               <select name="tipo" id="tipo" class="form-control" >
                <option value="" disabled selected>Selecciona un departamento</option>               
                <option value="admi">Administrador</option>
                <option value="use">Usuario</option>                 
            </select>
       <br>
       <label for="activo">Actividad Usuario</label>
       @if($errors->first('activo'))
       <p class="text-danger">{{$errors->first('activo')}}</p>
       @endif
       <select name="activo" id="activo" class="form-control">
        <option value="Si">Si</option>
        <option value="No">No</option>
       </select>
       <br>
        <button type="submit" class="btn btn-danger">Registra Usuario Nuevo</button>
    </form>
</div>


@stop
</div>   