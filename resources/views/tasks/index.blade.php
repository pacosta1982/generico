{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Calendario de Visitas</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Filtrar Visitas</h3>
            </div>
                      
        </div>

    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <div id='calendar' class="fc fc-unthemed fc-ltr"></div>
            </div>
        </div>
    </div>
</div>    

@stop

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

   

<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            locale: 'es',
            allDay: 'false',
            header: {
                    left: 'prev,next today myCustomButton',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
            events : [
                @foreach($tasks as $task)
                {
                    title : '{{ $task->name }}',
                    start : '{{ $task->task_date  }}'+'T'+'{{ $task->task_time  }}',
                    //url : '{{ route('tasks.edit', $task->id) }}'
                },
                @endforeach
            ]
        })
    });

</script>
<script src="{{asset('js/bootstrap-datepicker.es.min.js')}}" charset="UTF-8"></script>
<script type="text/javascript">

    $('.date').datepicker({  
       format: 'yyyy-mm-dd',
       autoclose: 'true',
       languaje: 'es'
     });
     
     $('.timepicker').timepicker({
        showMeridian: false,
        //defaultTime: false
    })

</script> 


@stop




