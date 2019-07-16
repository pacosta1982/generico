<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Informe;
use App\Models\Viviendas;
use App\Models\ProjectRubro;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $project = Project::find($id);
        $title="Lista de Informes de Obra del Proyecto ".$project->name;
        //$projects = Project::all();
        $informe = Informe::where('project_id', $id)->get();
        //Mapper::map(-24.3697635, -56.5912129, ['zoom' => 6, 'type' => 'ROADMAP']);
        return view('projects.informes.index',compact('project','title','informe'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $project = Project::find($id);
        $title="Lista de Informes de Obra del Proyecto ".$project->name;
        //$projects = Project::all();
        $informe = Informe::where('project_id', $id)->count();
        return view('projects.informes.create',compact('project','title','informe'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Informe::create($request->all());
        $project = Project::find($request->project_id);
        $casas = Viviendas::where('project_id',$request->project_id)->get();

        if ($casas->count() == 0) {
            for ($i=1; $i <= $project->SEOBViv ; $i++) { 
                //var_dump($i);
                $vivienda = new Viviendas;
                $vivienda->name = $i;
                $vivienda->status = true;
                $vivienda->project_id = $project->SEOBId;
                $vivienda->save();
            }
        }

        return redirect('projects/'.$request->project_id)->with('status', 'Se ha agregado un nuevo Informe!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $idvisita)
    {
        $title = "Resumen Visita";
        $project = Project::find($id);
        $informe = Informe::find($idvisita);
        $informecasa = Viviendas::where('project_id', $id)->get();
        //var_dump($informecasa);
        //$informecasa = Informe::find($idvisita);
        //$project = Project::find($id);
        //$informecasa = Informe::where('project_id', $id)->get();

        
        return view('projects.tabs.informes.show',compact('project', 'title','informe', 'informecasa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
