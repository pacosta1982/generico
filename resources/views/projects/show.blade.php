@extends('adminlte::page')

@section('title', 'Seguimiento')

@section('content_header')
    
@stop

@section('content')

<section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">
              <i class="fa fa-home"></i> {{ $project->SEOBProy }}
              <small class="pull-right">Date: 2/10/2014</small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <address>
              SAT/EMPRESA:<strong> {{ $project->SEOBEmpr  }} </strong><br>
              Departamento: {!! $project->DptoId?$project->departamento->DptoNom:"" !!}<br>
              Distrito: {!! $project->CiuId?$project->distrito->CiuNom:"" !!}<br>
              Estado: {!! $project->SEOBEst !!}<br>
              Total Casas: {{$project->SEOBViv}}<br>
              Total Avance: {!! number_format($project->SEOBFisAva,0,'.','.')  !!}%<br>
              Avance: <div class="progress progress-lg" >
                @if ($project->SEOBFisAva >= 70)
                <div class="progress-bar progress-bar-green" style="width: {{ $project->SEOBFisAva}}% "></div>
                @endif

                @if ($project->SEOBFisAva <= 40)
                <div class="progress-bar progress-bar-red" style="width: {{ $project->SEOBFisAva}}%"></div>
                @endif

                @if ($project->SEOBFisAva >= 41 && $project->SEOBFisAva <= 69)
                <div class="progress-bar progress-bar-yellow" style="width: {{ $project->SEOBFisAva}}%"></div>
                @endif
              </div>
            </address>
          </div>
          <!-- /.col -->

          <!-- /.col -->
          <div class="col-sm-8 invoice-col">
            <div style="width: 100%; height: 180px;">
              {!! Mapper::render() !!}
            </div>
          </div>
          <!-- /.col -->
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item active"><a class="nav-link" href="#tab_1" data-toggle="tab" aria-expanded="true">Informes de Supervición</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab" aria-expanded="false">Documentos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Observaciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Observaciones Fonavis</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="tab_1">
                      @include('projects.tabs.informes')
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                      @if($project->SEOBPtoNro)
                        
                      @endif
        
                    </div>
                    <!-- /.tab-pane -->
        
                    <div class="tab-pane" id="tab_3">
                      
                    </div>

                    <div class="tab-pane" id="tab_4">
                      
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
      </div>
        <!-- /.row -->
  
        <!-- Table row -->
        
        <!-- /.row -->
  
        
        <!-- /.row -->
  
        <!-- this row will not appear when printing -->
        
      </section>

@stop