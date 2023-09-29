@extends('index')

@section('contenido')

<div class="container">
  
  <div class="row">
    <div class="col">
      
      <h2>Ingreso de datos</h2>
    <form action="{{route('resultados')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field() }}
    <label for='identificador'>Identificador : </label> <br>
    @if($errors->first('identificador'))
    <p class ='text-danger'>{{$errors->first('identificador')}}</p>
    @endif
    <input type="text" name='identificador' class="form-control"  id='identificador ' value="{{$idesigue}}" readonly='readonly'>
    <p></p>
    <label for='nombre'>Ingrese su nombre : </label> <br>
    @if($errors->first('nombre'))
    <p class ='text-danger'>{{$errors->first('nombre')}}</p>
    @endif
    <input type="text" name='nombre' class="form-control"  id='nombre '>
    <p></p>
    <label for='edad'>Ingrese su edad : </label> <br>
    @if($errors->first('edad'))
    <p class ='text-danger'>{{$errors->first('edad')}}</p>
    @endif
    <input type="text" name='edad' id='edad' class="form-control" >
    <p></p>
    <label for= 'apellido '>Ingrese su apellido : </label> <br>
    @if($errors->first('apellido'))
    <p class ='text-danger'>{{$errors->first('apellido')}}</p>
    @endif
    <input type="text" name='apellido' id='apellido' class="form-control"  >
   <p></p>
    <label for='telefono'>Ingrese su numero de telefono :</label><br>
    @if($errors->first('telefono'))
    <p class ='text-danger'>{{$errors->first('telefono')}}</p>
    @endif
    <input type="number" name='telefono' id='telefono' class="form-control"  >
    <p></p>
    <label for='email'>Ingrese su correo electronico :</label><br>
    @if($errors->first('email'))
    <p class ='text-danger'>{{$errors->first('email')}}</p>
    @endif
    <input type="email"  name='email' id='email' class="form-control" >
    <p></p> 
    <label for="inf">Informacion</label>
    @if($errors->first('inf'))
    <p class ='text-danger'>{{$errors->first('inf')}}</p>
    @endif
       <select name="dep" id="dep" class="form-control" >
        <option value="" disabled selected>Selecciona un departamento</option>
        @foreach($departamentos as $depa)
        <option value="{{$depa->id}}">{{$depa->nombre}}</option>
        @endforeach       
    </select>
    <p></p>
    <label for="dep">Departamento:</label>
    @if($errors->first('dep'))
    <p class ='text-danger'>{{$errors->first('dep')}}</p>
    @endif
    <textarea class="form-control" rows="5" id="inf" name="inf" class="form-control" ></textarea>  
    <p></p>  
    <label for="dni">Foto De perfil :</label> 
    @if($errors->first('img'))  
    <p class ='text-danger'>{{$errors->first('img')}}</p>
    @endif 
    <input type="file" class="form-control"  name='img' id='img' class='form-control' tabindex="6"> 
    <br>
    
    <label for="p"></label>
    <button type="submit" class="btn btn-primary" class="form-control" >Guardar datos</button>
    </form>
    </div>
    <div class="col">
    <b>Column</b>      
    
    </div>
    <div class="col">
      Column
    </div>
  </div>
</div>

@stop