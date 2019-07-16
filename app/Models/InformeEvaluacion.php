<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformeEvaluacion extends Model
{
    protected $table = 'informes_evaluacion';
    
    protected $fillable = ['rubro_id', 'informe_id','vivienda_id','user_id','value'];

    //protected $dates = ['fecha_visita'];
}
