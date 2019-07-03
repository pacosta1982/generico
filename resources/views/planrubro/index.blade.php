@extends('adminlte::page')

@section('title', $title)


@section('content_header')
    <h1>{!! $title !!}</h1>
@stop

@section('breadcrumb')
    <ol class="breadcrumb breadcrumb-2">
        <li><a href="{{url('home')}}"><i class="fa fa-home"></i>Inicio</a></li>
        <li class="active"><strong>{!! $title !!}</strong></li>
    </ol>
@endsection

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

<div class="box box-info">
        <div class="box-header with-border">
            <div class="pull-right">{{ $projects->appends(request()->except('_token'))->links() }}</div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example" class="table" style="width:100%">
                <thead>
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
                    </thead>
                <tbody>
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
                                <li><a href="{!! action('PlanRubroProyController@show', ['id'=>$project->SEOBId]) !!}">Gestión Rubros</a></li>
                                <li><a href="{!! action('PlanRubroProyController@show', ['id'=>$project->SEOBId]) !!}">Calendarizar</a></li>
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
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
      </div>


@stop
@section('css')



@stop

@section('js')
    

@stop
