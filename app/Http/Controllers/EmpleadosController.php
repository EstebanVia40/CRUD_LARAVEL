<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\departamentos;
use App\Models\empleados;
use Session;



class EmpleadosController extends Controller
{
     
    
    public function salir()
    {
        return "salir";

    }
   
    public function eloquen()
    {
        /*ingresar datos a la DB
        $empleados = new empleados;
        $empleados->ide="5";
        $empleados->nombre="Pedro";
        $empleados->apellido="Ortiz";
        $empleados->telefono=$request->ide;
        $empleados->email="pedro@hotmail.com";
        $empleados->inf="Estoy aprediendo laravel 8";
        $empleados->id_dep="2";
        $empleados->save()*/

       /* $empleados = empleados::find(1);
        $empleados->nombre= "Pedro";
        $empleados->apellido= "uribe";
        $empleados->save();
        para actualizar datos de un solo registro
        */
        
       // $consulta=empleados::all();

        /*$consulta=empleados::where('nombre','pedro')
                             ->where('edad','>',10)
                             ->get();*/
        
         $consulta=empleados::whereBetween('edad',[10,30])                             
                             ->get(); 
        $consulta=empleados::select(['nombre','apellido','edad']) 
                            ->where('edad','>=',10)
                            ->where('apellido','like','%u%')
                            ->get();  
        $consulta=empleados::select(['nombre','apellido']) ->sum('edad');

        // CONSULTAS INNER JOIN
        //$consulta=empleados::join('departamento','empleados.id_dep','=','deparatamento.id');
        $consulta = empleados::select(
            'empleados.id AS Ide',
            'empleados.nombre AS nombre_empleado',
            'empleados.apellido AS apellido_ep',
            'empleados.edad AS edad',
            'departamentos.nombre AS nombre'
        )
        ->join('departamentos', 'empleados.id_dep', '=', 'departamentos.id')
        ->get();                    
                                                               
        return $consulta;

        //$empleados = empleados::find(1);
        //$empleados->delate();
        //return 'operacion exitosa';

    }
    
    public function modificaempleados($id)
    {
        
        $consulta = empleados::select(
            'empleados.ide AS id',
            'empleados.nombre AS nombre_empleado',
            'empleados.apellido AS apellido_ep',
            'empleados.edad AS edad',
            'empleados.telefono AS telefono', 
            'empleados.email AS email',  
            'empleados.inf AS inf',           
            'departamentos.nombre AS nombre',
            'empleados.img as img'
        )
        ->join('departamentos', 'empleados.id_dep', '=', 'departamentos.id')
        ->where('empleados.ide', $id)
        ->first(); // Obtén solo un registro
        $departamentos=departamentos::all();           
        return view('modificaempleados')
        ->with('consulta', $consulta)
        ->with('departamentos', $departamentos);
        

        //return('modificarempelados'. $id);
        
        // $consulta = empleados::all();
       
        

    }
    
    public function guardarcambios( Request $request )
    {
        
        $this->validate($request,[            
   
            'nombre' => 'required',
            'edad' => 'required',
            'apellido' => 'required|regex:/^[A-Z].[A-Z,a-z, ]+$/',
            'telefono' => 'required',
            'email' => 'required',        
            'inf' => 'required',
            'dep' => 'required',
            'img' => 'image|mimes:gif,jpeg,png',    
        ]);

        $file=$request->file('img'); 
        if($file<>"")
        {      
        $img=$file->getClientOriginalName();
        $img2=  $request->identificador .$img;
        \Storage::disk('local')->put($img2, \File::get($file));
        //dd($img2);
        }

        $empleados = empleados::find($request->ide);
        $empleados->ide= $request->ide;
        $empleados->nombre=$request->nombre;
        $empleados->edad= $request->edad;
        $empleados->apellido=$request->apellido;
        $empleados->telefono=$request->telefono;
        $empleados->email=$request->email;
        $empleados->id_dep=$request->dep;
        $empleados->inf=$request->inf;
        if($file<>"")
        { $empleados->img = $img2;     
        }                   
        $empleados->save();
        
       /* return view('mensaje')
            ->with('proceso',"Modifica empleado")
            ->with('msj',"El empleado $request->nombre  $request->apellido a sido actualizado");
            //->with('error' 1);*/
        Session::flash('mensaje',"El empleado $request->nombre  $request->apellido a sido actualizado");
        return redirect()->route('reporteempleados');
    }
    public function eliminarempleados($id)
    {
        $empleados = empleados:: find($id);
        $empleados-> delete();
       /* return view('mensaje')
            ->with('proceso',"Eliminar Empleado")
            ->with('msj',"El empleado  se a eliminado")
            ->with('erro',0);
       //echo "el id eliminado es  $id";*/
       Session::flash('mensaje',"El empleado  se a eliminado");
        return redirect()->route('reporteempleados');


    }
    public function index()
    {
       
        return view ('index');

    }
    public function vista()
    {

        $consulta=empleados::orderBy('ide','DESC')
                            ->take(1)->get();

        //return $consulta;        
        $cuantos = count($consulta);
        if($cuantos==0)
        {
            $idesigue=1;
        }
        else{
            $idesigue= $consulta[0]->ide + 1;
        }
        $departamentos = departamentos::all();
        //return $departamentos;

        //return $idesigue;
       //return view ('vista');
       return view ('vista')
                    ->with('idesigue',$idesigue)
                    ->with('departamentos',$departamentos);
    }   
    public function resultados(Request $request)
    {
        
        //return view ('resultados');
        //Validar las cajas de texto del html
        $this->validate($request,[            
   
            'nombre' => 'required|regex:/^[A-Z].[A-Z,a-z, ]+$/',
            'edad' => 'required',
            'apellido' => 'required|regex:/^[A-Z].[A-Z,a-z, ]+$/',
            'telefono' => 'required',
            'email' => 'required',        
            'inf' => 'required',
            'dep' => 'required', 
  
            'img' => 'image|mimes:gif,jpeg,png',   
        ]);

        //se sube la imagen
        
        $file=$request->file('img'); 
        if($file<>"")
        {      
        $img=$file->getClientOriginalName();
        $img2=  $request->identificador .$img;
        \Storage::disk('local')->put($img2, \File::get($file));
        //dd($img2);
        }else{
            $img2="sinfoto.jpg";
        }
        $empleados = new empleados;
        $empleados->ide= $request->ide;
        $empleados->nombre=$request->nombre;
        $empleados->edad= $request->edad;
        $empleados->apellido=$request->apellido;
        $empleados->telefono=$request->telefono;
        $empleados->email=$request->email;       
        $empleados->id_dep=$request->dep;
        $empleados->inf=$request->inf;
        $empleados->img = $img2;               
        $empleados->save();
        
        /*return view('mensaje')
            ->with('proceso',"Alta empleado")
            ->with('msj',"El empleado $request->nombre  $request->apellido a sido guardado");
        */
       // echo "Registro se guardo exitosamente";
        //return $request;
        Session::flash('mensaje',"El empleado $request->nombre  $request->apellido a sido guardado");
        return redirect()->route('reporteempleados');

    }
    public function mensaje()
    {
       return view('mensaje');
    

    }  
    public function reporteempleados(){

        $sessionidu= session('sessionidu');
        $sessiontipo= session('sessiontipo');
        if($sessionidu<>""and $sessiontipo<>""){
        
        $consulta = empleados::select(
            'empleados.ide AS id',
            'empleados.nombre AS nombre_empleado',
            'empleados.apellido AS apellido_ep',
            'empleados.edad AS edad',
            'departamentos.nombre AS nombre',
            'empleados.img As img'
        )
        ->join('departamentos', 'empleados.id_dep', '=', 'departamentos.id')
        ->orderBy('empleados.nombre')
        ->get();         
        //return $consulta;
        return view('reporteempleados'  , ['consulta' => $consulta])
        ->with('sessiontipo',$sessiontipo);
        } else {
            Session ::flash('mensaje',"Inicia session");
            return redirect()->route('login');
        }
    }
   
   
    
    public function saludo($nombre,$dias){
             
        $pago = 100;
        $nomina = $dias * $pago;
        //return view ('empleado',compact('nombre', 'dias'));  una manera de enviar datos
        //return view ('empleado',['nombre'=>$nombre,'dias'=>$dias]);
        return view ('empleado')
        ->with('nombre',$nombre)
        ->with('dias',$dias)
        ->with('nomina',$nomina);
   
    }

    public function pago()
    {
        $dias= 7;
        $pago=100;
        $nomina = $dias*$pago;
        return "El pago de elmpleado es .$nomina";
    }

    public function nomina($diast,$pago)
    {        
        $nomina = $diast*$pago;
        // depurar las variables dd($nomina,$diast);
        return "El pago es .$nomina con dias .$diast y pago diario .$pago";
    }

   
}