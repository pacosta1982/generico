<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\InformeEvaluacion;

class ProjectRubro extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'project_rubro';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['project_id','rubro_id','unidad_id','quantity','unit_price'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function getValue($key,$informe,$vivienda){

                $value = InformeEvaluacion::where('rubro_id',$key)
                ->where('informe_id',$informe)
                ->where('vivienda_id',$vivienda)
                ->first();
                if ($value) {
                    return $value->value;
                } else {
                    return '0-2';
                }
                
    } 

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function state() {
        return $this->hasOne('App\Models\Rubros','id','rubro_id');
    }

    public function unidad() {
        return $this->hasOne('App\Models\Units','id','unidad_id');
    }

    

    public function project() {
        return $this->hasOne('App\Models\Project','id','project_id');
    }
    

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
