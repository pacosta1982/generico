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

<section class="content">
    
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Agregar Rubro al Proyecto</h3>
            </div>
                <form action="{{ route('proyrubro.store') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="project_id" value="{!! $project->SEOBId !!}">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('state_id') ? 'has-error' : '' }}" >
                                <label>Categoria:</label>
                                <select class="form-control required" name="state_id" >
                                    <option value="">Selecciona una Categoria</option>
                                    @foreach($statesInit as $state)
                                        <option value="{{$state->id}}"
                                        
                                        >{{ $state->name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('state_id','<span class="help-block">:message</span>') !!}
                                
                            </div>
                            <div class="form-group {{ $errors->has('rubro_id') ? 'has-error' : '' }}">
                                <label>Rubro</label>
                                <select class="form-control required" name="rubro_id" >
                                    <option value="">Selecciona un Rubro:</option>
                                    @if(isset($cities))
                                        @foreach($cities as $key=>$city)
                                            <option value="{{$key}}" 
                                            {{ old('rubro_id') == $state->id ? 'selected' : '' }} 
                                            >{{ $city }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                {!! $errors->first('rubro_id','<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('unidad_id') ? 'has-error' : '' }}">
                                <label>Unidad de Medida:</label>
                                <select class="form-control required"  name="unidad_id" id="unidad_id" >
                                    <option value="" >Selecciona una Unidad:</option>
                                    @foreach($unidades as $us)
        
                                    <option value="{{$us->id}}"
                                    {{ old('unidad_id') == $us->id ? 'selected' : '' }}    
                                    >{{$us->description}}  ({{$us->name}})</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('unidad_id','<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                                <label for="name">Cantidad:</label>
                                <input type="text" name="quantity" id="quantity" value="{{ old('quantity') }}" class="form-control"   placeholder="Ingrese Cantidad">
                                {!! $errors->first('quantity','<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('unit_price') ? 'has-error' : '' }}">
                                <label for="description">Precio Unitario:</label>
                            <input type="text" class="form-control" name="unit_price" id="unit_price" value="{{ old('unit_price') }}"  placeholder="Ingrese Precio Unitario">
                                {!! $errors->first('unit_price','<span class="help-block">:message</span>') !!}
                            </div>
                            
                        </div>
                        <!-- /.box-body -->
            
                        <div class="box-footer">
                            <button type="submit"  class="btn btn-primary">Agregar</button>
                        </div>
                </form>            
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
            <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Rubros del Proyecto {!! $project->SEOBProy !!}</h3>
                    </div>   
                    <div class="box-body">
                            <table id="example" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                          <th>Rubro</th>
                                          <th class="text-center">Un.</th>
                                          <th class="text-center">Cantidad</th>
                                          <th class="text-center">P. Unitario</th>
                                          <th class="text-center">P. Total</th>
                                          <th class="text-center">Acciones</th>
                                        </tr>
                                        </thead>
                                    <tbody>
                                        @php
                                            $aux=0;
                                            $total=0;
                                            $totalObra=0;
                                        @endphp

                                        @foreach($rubros as $ru)
                                            @if ($ru->category_id !== $aux)
                                            @if ($aux != 0)
                                            <tr class="header">
                                                <td class="total"></td>
                                                <td class="text-center total"></td>
                                                <td class="text-center total"></td>
                                                <td class="text-center total">Total:</td>
                                                <td class="text-center total">{!! number_format($total,0,'.','.') !!}</td>
                                                <td></td> 
                                            </tr>
                                            @php
                                                $total=0;
                                            @endphp
                                            @endif
                                                <tr class="header">
                                                    <td class="bg-light-blue-active color-palette">{!! $ru->category_id?$ru->state->categoria->name:"" !!}</td>
                                                    <td class="text-center bg-light-blue-active color-palette"></td>
                                                    <td class="text-center bg-light-blue-active color-palette"></td>
                                                    <td class="text-center bg-light-blue-active color-palette"></td>
                                                    <td class="text-center bg-light-blue-active color-palette"></td>
                                                    <td class="text-center bg-light-blue-active color-palette"></td>
                                                </tr>
                                                @php
                                                    $aux=$ru->category_id;
                                                @endphp
                                            @endif
                                              <tr>
                                                <td>{!! $ru->rubro_id?$ru->state->name:"" !!}</td>
                                                <td class="text-center">{!! $ru->unidad_id?$ru->unidad->name:"" !!}</td>
                                                <td class="text-center">{!! $ru->quantity !!}</td>
                                                <td class="text-center">{!! number_format($ru->unit_price,0,'.','.') !!}</td>
                                                <td class="text-center">{!! number_format(($ru->unit_price * $ru->quantity),0,'.','.') !!}</td>
                                                <td><button type="button" class="btn btn-block btn-danger btn-xs">Eliminar</button></td>
                                            </tr>
                                          @php
                                              $total+=$ru->unit_price * $ru->quantity;
                                              $totalObra+=$ru->unit_price * $ru->quantity;
                                          @endphp
                                          
                                     @endforeach
                                     <tr class="header">
                                        <td class="total"></td>
                                        <td class="text-center total"></td>
                                        <td class="text-center total"></td>
                                        <td class="text-center total">Total:</td>
                                        <td class="text-center total">{!! number_format($total,0,'.','.') !!}</td>
                                        <td></td> 
                                    </tr>
                                    <tr class="header">
                                        <td class="totalobra"></td>
                                        <td class="text-center totalobra"></td>
                                        <td class="text-center totalobra"></td>
                                        <td class="text-center totalobra">Total Obra:</td>
                                        <td class="text-center totalobra">{!! number_format($totalObra,0,'.','.') !!}</td>
                                        <td></td> 
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                            
                                    </tfoot>
                                </table>
                        
                    </div>  
                </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>

@endsection

@section('css')

<style>

.total{
    font-weight: bold;
    
}

.totalobra{
    font-weight: bold;
    background-color: azure;  
}

</style>
    
@endsection

@section('js')
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/jquery.numeric.js')}}"></script>

<script>
$(document).ready(function() {
  //Fixing jQuery Click Events for the iPad
  var ua = navigator.userAgent,
    event = (ua.match(/iPad/i)) ? "touchstart" : "click";
  if ($('.table').length > 0) {
    $('.table .header').on(event, function() {
      $(this).toggleClass("active", "").nextUntil('.header').css('display', function(i, v) {
        return this.style.display === 'table-row' ? 'none' : 'table-row';
      });
    });
  }
})
</script>

<script type="text/javascript">
$("#quantity").numeric({ decimalPlaces: 2 });
$("#unit_price").numeric();
$(document).ready(function() {
            $('select[name="state_id"]').on('change', function() {
                var stateID = $(this).val();
                if(stateID) {
                    $.ajax({
                        url: '{{URL::to('/proyrubro')}}/ajax/'+stateID+"/cities",
                        type: "GET",
                        dataType: "json",
                        success:function(data) {

                            $('select[name="rubro_id"]').empty();
                            $('select[name="rubro_id"]').append('<option value="">Selecciona un Rubro:</option>');

                            $.each(data, function(key, value) {
                                $('select[name="rubro_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });

                        }
                    });
                }else{
                    $('select[name="city_id"]').empty();
                }
            });
        });
</script>
    
@endsection
