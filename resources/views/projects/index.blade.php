@extends('adminlte::page')

@section('title', 'Seguimiento')

@section('content_header')
    <h1>Proyectos</h1>
@stop

@section('content')
@php


    $array = [
    "A" =>  "Compra de Terreno",
    "P" =>  "Lote Propio",
    "M" =>  "Municipal",
    "I" => "Indert",
    "C" => "Comunitario",
    "SNV" => "Senavitat",
    "G" => "Gobernación",
    "S" => "SAS (Lote Propio)",
    "SSA" => "SAS (Sin Autorización)",
    "F" => "Falta Información",
    "" => "Sin Definir",
];


@endphp
<div class="box box-primary">
    <div class="box-header with-border">

      <div class="pull-right">{{ $projects->appends(request()->except('_token'))->links() }}</div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <table class="table table-striped">
        <tbody>
        <tr>
          
          <th>Proyecto</th>
          <th>Empresa/Sat</th>
          <th style="text-align:center;">Cantidad de Viviendas</th>
          <th style="text-align:center;">Terreno</th>
          <th>Distrito</th>
          <th>Departamento</th>
          <th style="text-align:center;">Estado</th>
          <th>Avance</th>
          <th>Acciones</th>
        </tr>
        @foreach($projects as $project)
        <tr>
        
        <td>{{utf8_encode($project->SEOBProy)}}</td>
        <td>{{utf8_encode($project->SEOBEmpr)}}</td>
        
        <td style="text-align:center;">{{$project->SEOBViv}}</td>
        <td style="text-align:center;">{!! $array[rtrim($project->SEOBTerr)]!!}</td>
        <td>{!! $project->CiuId?$project->distrito->CiuNom:"" !!}</td>
        <td>{!! $project->DptoId?$project->departamento->DptoNom:"" !!}</td>
        <td style="text-align:center;">{!! (isset($project->SEOBEst))?(rtrim($project->CiuId?$project->estado->name:"")):'N/A' !!}</td>

        <td style="text-align:center;">
            @if ($project->SEOBFisAva >= 69)
                <span class="badge bg-green">
            @endif
            @if ($project->SEOBFisAva <= 40)
                <span class="badge bg-red">
            @endif
            @if ($project->SEOBFisAva >= 41 && $project->SEOBFisAva <= 69)
                <span class="badge bg-yellow">
            @endif
                {{ number_format($project->SEOBFisAva,0,'.','.') }}%
            </span>
        </td>
        <td style="text-align:center;">
            <div class="dropdown">
                <a href="#/" data-toggle="dropdown"     ><i class="fa fa-fw fa-list-ul"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{!! action('ProjectController@show', ['id'=>$project->id]) !!}">Ver</a></li>
                    <li><a href="{!! action('ProjectController@edit', ['id'=>$project->id]) !!}">Editar</a></li>
                   
                    <li><a href="">Propiedades</a></li>
                    
                </ul>
            </div>
        </td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
            <th>Proyecto</th>
            <th>Empresa/Sat</th>
            <th style="text-align:center;">Cantidad de Viviendas</th>
            <th style="text-align:center;">Terreno</th>
            <th>Distrito</th>
            <th>Departamento</th>
            <th style="text-align:center;">Estado</th>
            <th>Avance</th>
            <th>Acciones</th>
        </tr>
    </tfoot>
</table>
    </div>
    <!-- /.card-body -->
  </div>
@stop