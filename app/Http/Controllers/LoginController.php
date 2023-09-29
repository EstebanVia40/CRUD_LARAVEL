<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\usuarios;
use Session;

class LoginController extends Controller
{
    public function login(){        
        
     return view ('login');

    }
    public function registro(){       
        

        $consulta=usuarios::orderBy('idu','DESC')
        ->take(1)->get();

            //return $consulta;        
            $cuantos = count($consulta);
            if($cuantos==0)
            {
            $idesigue=1;
            }
            else{
            $idesigue= $consulta[0]->idu + 1;
            }
            //return $departamentos;

            //return $idesigue;
            //return view ('vista');
            return view ('registro')
            ->with('idesigue',$idesigue);
        //return view ('registro');
   
    }
    public function validar_user(Request $request){       
       
        $this->validate($request,[            
   
            'nombre' => 'required',
            'apellido' => 'required',
            'user' => 'required', 
            'pasw' => 'required',  
            'tipo' => 'required',
            'activo'=>'required'           
        ]);
        
        $usuarios = new usuarios;
        $usuarios->idu = $request->idu;
        $usuarios->nombre = $request->nombre;
        $usuarios->apellido = $request->apellido;
        $usuarios->user = $request->user;
        //$usuarios->pasw = $request->pasw;
        $usuarios->pasw = Hash::make($request->pasw);
        $usuarios->tipo = $request->tipo;
        $usuarios->activo= $request->activo;
        $usuarios->save(); 
        
        Session::flash('mensaje',"El usuario $request->nombre  $request->apellido a sido guardado");
        return redirect()->route('login');
        
   
    }
       
    
    public function principal(){
 
        $sessionidu= session('sessionidu');
        if($sessionidu<>""){
        return view ('index');
        }
        else{
            Session ::flash('mensaje',"Inicia session");
            return redirect()->route('login');
        }
    }

    public function cerrarsesion(){
        
        Session::forget('sessionusuario');
        Session::forget('sessiontipo');
        Session::forget('sessionidu');
        Session::flush();
        Session ::flash('mensaje',"Session Cerrada");
        return redirect()->route('login');

    }   
    public function validar(Request $request){
    
    
        $this->validate($request,[            
   
            'usuario' => 'required',
            'pasw' => 'required',
                
        ]);
        //$paswordEncriptado = Hash::make($request->pasw);
        //echo  $paswordEncriptado;
        //dd($request->pasw,$request->usuario);
        
        $consulta = usuarios::where('user', $request->usuario)->first();

        if ($consulta) {
        // Se encontró un usuario con el nombre de usuario proporcionado
        if ($consulta->activo == 'Si' && Hash::check($request->pasw, $consulta->pasw)) {
            // Las credenciales son válidas y el usuario está activo
            Session::put('sessionusuario', $consulta->nombre . ' ' . $consulta->apellido);
            Session::put('sessiontipo', $consulta->tipo);
            Session::put('sessionidu', $consulta->idu);

                return redirect()->route('principal');
            } elseif ($consulta->activo != 'Si') {
                // El usuario está desactivado
                Session::flash('mensaje', "El usuario está desactivado. Contacta al administrador.");
            } else {
                // Las credenciales son inválidas
                Session::flash('mensaje', "El usuario o contraseña no son correctos.");
            }
            } else {
            // No se encontró un usuario con el nombre de usuario proporcionado
            Session::flash('mensaje', "El usuario no existe.");
            }

            return redirect()->route('login');

                //dd($cuantos);
                //dd($cuantos);
                
            }
            
       
}
