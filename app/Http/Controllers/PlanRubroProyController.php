<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

use App\Models\Units;
use App\Models\Categoria;
use App\Models\Item;
use App\Models\Rubros;
use App\Models\ProjectRubro;

use App\Http\Requests\StoreRubroProy;

class PlanRubroProyController extends Controller
{
    
    public $statesInit;

    public function __construct()
    {
        $this->middleware('auth');

        $this->statesInit = Categoria::all()->sortBy("name");
        
    }

    public function index()
    {
        $title="Proyectos a Planificar";
        $projects = Project::paginate(15);
        return view('planrubro.index',compact('projects','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRubroProy $request)
    {

        //$this->validate;
        ProjectRubro::create($request->all());
        return redirect('proyrubro/'.$request->input("project_id"))->with('success', 'Se ha agregado un Nuevo Rubro!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $statesInit = $this->statesInit;
        $project = Project::find($id);
        $title="Creacion de Rubros del Proyecto ".$project->name;
        $unidades = Units::all();
        $rubros = ProjectRubro::join('rubros', 'project_rubro.rubro_id', '=', 'rubros.id')
        ->where('project_id', $id)
        ->orderby('category_id')
        ->get();
        return view('planrubro.show',compact('project','title','statesInit','unidades','rubros'));
    }

    public function rubros($state_id){
        $cities = Rubros::where('category_id', $state_id)->get()->sortBy("name")->pluck("name","id");
        return json_encode($cities);
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
