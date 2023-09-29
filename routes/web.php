<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\LoginController;

// llamamos al controlador de la funciones
Route:: get("mensaje",[EmpleadosController:: class,'mensaje']);
Route:: get("controlpago",[EmpleadosController:: class,'pago']);
Route:: get("nomina/{diast}/{pago}",[EmpleadosController:: class,'nomina']);
Route:: get('muestrasaludo/{nombre}/{dias}',[EmpleadosController:: class,'saludo']);
Route:: get('salir',[EmpleadosController:: class,'salir']) ->name('salir');
Route:: get('index',[EmpleadosController:: class,'index']);
Route:: get('vista',[EmpleadosController:: class,'vista'])->name('vista');;
Route:: POST('resultados',[EmpleadosController:: class,'resultados'])->name('resultados');
Route:: get('eloquen',[EmpleadosController:: class,'eloquen'])->name('eloquen');
Route:: get('mensaje',[EmpleadosController:: class,'mensaje'])->name('mensaje');
Route:: get('reporteempleados',[EmpleadosController:: class,'reporteempleados'])->name('reporteempleados');
Route:: get('eliminarempleados/{id}',[EmpleadosController:: class,'eliminarempleados'])->name('eliminarempleados');
Route::get('modificaempleados/{id}', [EmpleadosController::class, 'modificaempleados'])->name('modificaempleados');
Route:: POST('guardarcambios',[EmpleadosController:: class,'guardarcambios'])->name('guardarcambios');
Route:: get('login',[LoginController:: class,'login'])->name('login');
Route:: POST('validar',[LoginController:: class,'validar'])->name('validar');
Route:: get('registro',[LoginController:: class,'registro'])->name('registro');
Route:: POST('validar_user',[LoginController:: class,'validar_user'])->name('validar_user');
Route:: get('principal',[LoginController:: class,'principal'])->name('principal');
Route:: get('cerrarsesion',[LoginController:: class,'cerrarsesion'])->name('cerrarsesion');
//llamado al controlador

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ruta1', function () {
    return "Hola Mundo";
});
Route::get('/area', function () {
    
    $base= 5;
    $altura= 4;
    $area= $base*$altura;
    return "El area del retangulo es: .$area con basse $base y altura $altura "; 
});

Route::get('/area1', function () {
    
    $base= 20;
    $altura= 30;
    $area= $base*$altura;
    return "El area del retangulo es: .$area con basse $base y altura $altura "; 
});
// redireciona las pantallas 
Route::get('/atras', function () {
    return redirect ('ruta1');

});
// redirecionamiento 
Route:: redirect('atras1','ruta1');


// redirecionamiento 

