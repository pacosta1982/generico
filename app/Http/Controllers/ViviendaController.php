<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Informe;
use App\Models\ImageGallery;
use App\Models\ProjectRubro;
use App\Models\InformeEvaluacion;
use App\Models\Viviendas;

class ViviendaController extends Controller
{

    public function index($id,$idinforme,$idvivienda)
    {

        $project = Project::find($id);
        $casa = Viviendas::find($idvivienda);
        $title="Informe N° ".$idinforme." del Proyecto ".'<strong>'.$project->SEOBProy.'</strong>'.' - '.'Vivienda '.$casa->name;
        $images = ImageGallery::where('informe_id',$idinforme)
                                ->where('vivienda_id',$idvivienda)
                                ->get();
        $informe = Informe::where('project_id', $id)->get();
        $rubros = ProjectRubro::join('rubros', 'project_rubro.rubro_id', '=', 'rubros.id')
        ->where('project_id', $id)
        ->orderby('category_id')
        ->get();

        return view('projects.tabs.informes.vivienda.index',compact('project','title','informe','images','rubros','idinforme','idvivienda','casa'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $input = $request->except(['_token','informe_id','vivienda_id','user_id','project_id']);

        //return $request->all();

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
                //echo 'Hule';
                InformeEvaluacion::where('rubro_id',$key)
                ->where('informe_id',$request->informe_id)
                ->where('vivienda_id',$request->vivienda_id)
                ->update(['value'=>$value]);
            }



            //echo $key.' = '.$value.'<br>';
        }

        return redirect()->action(
                'ViviendaController@index', ['id' => $request->project_id,'idinforme' => $request->informe_id,'idvivienda' => $request->vivienda_id]
            )->with('success', 'Se ha actualizado el Informe!');

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
