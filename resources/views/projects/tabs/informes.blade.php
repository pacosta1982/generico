<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-default">
<i class="fa fa-plus-circle"></i> Nuevo Informe
</button>
<table id="example" class="table" style="width:100%">
    <thead>
        <tr>
        <th>Informe</th>
        <th>Fecha</th>
        <th class="dt-center">Acciones</th>
        </tr>
        </thead>
    <tbody>
        @foreach($informe as $inf)
      <tr>
        <td>Informe de Obra N° {!! $inf->num_visita !!}</td>

        <td>{!! $inf->fecha_visita->format('d/m/Y') !!}</td>
        <td class="dt-center">
            <a href="{!! action('ReportController@show', ['id'=>$inf->project_id,'idvisita'=>$inf->id]) !!}" class="announce">
                <button class="btn btn-primary" type="button"> Ver</button>
            </a>
        </td>
      </tr>
     @endforeach
    </tbody>
    <tfoot>
        <tr>
        <th>Informe</th>

        <th>Fecha</th>
        <th class="dt-center">Acciones</th>
        </tr>
    </tfoot>
</table>

<div class="modal fade" id="modal-default" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Generar Informe</h4>
        </div>
        <div class="modal-body">
            <form action="{{ action('ReportController@store') }}" method="post">
                {{ csrf_field() }}
                <input type="text" name="project_id" value="{{$project->SEOBId}}" hidden>
                <input type="text" name="num_visita"  value="{{$informe->count() + 1 }}" hidden>
                <div class="form-group">
                    <label for="name">Visita N°</label>
                <input type="text" name="vista" class="form-control"   disabled value="{{$informe->count() + 1}}">
                </div>
                <div class="form-group">
                    <label for="task_date">Fecha:</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="fecha_visita" required class="form-control date"  placeholder="Ingrese Fecha Visita">
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
            </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

@section('css')
<link href="{{asset('fullcalendar/fullcalendar.min.css')}}" rel="stylesheet">
<link href="{{asset('bootstrap-timepicker/css/bootstrap-timepicker.css')}}" rel="stylesheet">
<link href="{{asset('css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
@stop

@section('js')

    <script src="{{asset('fullcalendar/lib/jquery-ui.custom.min.js')}}"></script>
    <script src="{{asset('fullcalendar/lib/moment.min.js')}}"></script>
    <script src="{{asset('fullcalendar/fullcalendar.js')}}"></script>
    <script src="{{asset('fullcalendar/lang-all.js')}}"></script>
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('js/locale-all.js')}}" charset="UTF-8"></script>
    <script src="{{asset('bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>




<script src="{{asset('js/bootstrap-datepicker.es.min.js')}}" charset="UTF-8"></script>
<script type="text/javascript">

    $('.date').datepicker({
       format: 'yyyy-mm-dd',
       autoclose: 'true',
       languaje: 'es'
     });

</script>

@stop
