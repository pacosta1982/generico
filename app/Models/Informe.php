<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $table = 'informe_visitas';
    
    protected $fillable = ['project_id', 'num_visita','fecha_visita'];

    protected $dates = ['fecha_visita'];
}
