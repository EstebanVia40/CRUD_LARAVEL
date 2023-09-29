<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class empleados extends Model
{
    use HasFactory;
    //use SoftDeletes;

    protected $primaryKey = 'ide'; // Debe ser 'primaryKey', no 'primarykey'
    protected $fillable = ['ide', 'edad','nombre', 'apellido', 'email', 'inf','img', 'id_dep',]; // Agrega una coma entre 'inf' y 'id_dep'
}
