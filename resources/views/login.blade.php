@extends('index')

@section('contenido')
<div class='container'>  


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Iniciar sesión
                </div>
                <div class="card-body">
                    <form action="{{route('validar')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                           <label for="usuario">Usuario</label>
                            @if($errors->first('usuario'))
                            <p class ='text-danger'>{{$errors->first('usuario')}}</p>
                            @endif
                            <input type="email" class="form-control"  name="usuario" placeholder="Correo">
                        </div>
                        <div class="form-group">
                            <label for="pasw">Contraseña</label>
                            @if($errors->first('pasw'))
                            <p class ='text-danger'>{{$errors->first('pasw')}}</p>
                            @endif
                            <input type="password" class="form-control"  name="pasw" placeholder="password"><br>

                        </div>
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-3">
    <p>¿No tienes una cuenta? <a href="{{ route('registro') }}">Regístrate</a></p>
</div>
</div>
<br>
<br>
@if(Session::has('mensaje'))
<div class="alert alert-danger">{{Session::get('mensaje')}}</div>
@endif
@stop

<!-- Agrega los enlaces a los scripts de Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
