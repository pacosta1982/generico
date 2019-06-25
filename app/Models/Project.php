<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    protected $table = 'SEGOBRA';

    protected $connection = 'sqlsrv';

    protected $primaryKey = 'SEOBId';

    public function distrito() {
        return $this->hasOne('App\Models\Distrito','CiuId','CiuId');
    }

    public function departamento() {
        return $this->hasOne('App\Models\Departamento','DptoId','DptoId');
    }

    public function estado() {
        return $this->hasOne('App\Models\Estado','value','SEOBEst');
    }

    public function terreno() {
        return $this->hasOne('App\Models\Terreno','ident','SEOBTerr');
    }
}
