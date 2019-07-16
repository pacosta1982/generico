<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Informe;
use App\Models\ImageGallery;
use App\Models\ProjectRubro;
use App\Models\InformeEvaluacion;

class ViviendaController extends Controller
{

    public function index($id,$idinforme,$idvivienda)
    {
        
        $project = Project::find($id);
        $title="Lista de Informes de Obra del Proyecto ".$project->name;
        $images = ImageGallery::get();
        $informe = Informe::where('project_id', $id)->get();
        $rubros = ProjectRubro::join('rubros', 'project_rubro.rubro_id', '=', 'rubros.id')
        ->where('project_id', $id)
        ->orderby('category_id')
        ->get();

        //var_dump($rubros);

        return view('projects.tabs.informes.vivienda.index',compact('project','title','informe','images','rubros','idinforme','idvivienda'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $input = $request->except(['_token','informe_id','vivienda_id','user_id']);

        foreach ($input as $key => $value) {
            $inf = InformeEvaluacion::where('rubro_id',$key)
            ->where('informe_id',$request->informe_id)
            ->where('vivienda_id',$request->vivienda_id)
            ->first();

            if (!$inf) {
                $evaluacion = new InformeEvaluacion;
                $evaluacion->rubro_id = $key;
                $evaluacion->informe_id = $request->informe_id;
                $evaluacion->vivienda_id = $request->vivienda_id;
                $evaluacion->user_id = $request->user_id;
                $evaluacion->value = $value;
                $evaluacion->save();
            } else {
                echo 'Hule';
                InformeEvaluacion::where('rubro_id',$key)
                ->where('informe_id',$request->informe_id)
                ->where('vivienda_id',$request->vivienda_id)
                ->update(['value'=>$value]);
            }
            
            echo $key.' = '.$value.'<br>';
        }

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
