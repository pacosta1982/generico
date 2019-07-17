<table id="example" class="table" style="width:100%">
    <thead>
        <tr>
          <th>Rubro</th>
          <th class="text-center">Un.</th>
          <th class="text-center">Cantidad</th>
          <th class="text-center">P. Unitario</th>
          <th class="text-center">P. Total</th>
          <th class="text-center">Avance</th>
        </tr>
        </thead>
    <tbody>
        @php
            $aux=0;
        @endphp
        <form method="post" action="{{ url('save_vivienda') }}">
        {!! csrf_field() !!}
        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
        <input type="text" name="informe_id" value="{{ $idinforme }}" hidden>
        <input type="text" name="vivienda_id" value="{{ $idvivienda }}" hidden>
        <input type="text" name="project_id" value="{{ $project->SEOBId }}" hidden>
        @foreach($rubros as $ru)
            @if ($ru->category_id !== $aux)

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
              <tr >
                <td>{!! $ru->rubro_id?$ru->state->name:"" !!}</td>
                <td class="text-center">{!! $ru->unidad_id?$ru->unidad->name:"" !!}</td>
                <td class="text-center">{!! $ru->quantity !!}</td>
                <td class="text-center">{!! number_format($ru->unit_price,0,'.','.') !!}</td>
                <td class="text-center">{!! number_format(($ru->unit_price * $ru->quantity),0,'.','.') !!}</td>
                <td class="text-center">
                    <select id="wgtmsr" class="js-example-basic-single" name="{!! $ru->rubro_id !!}">
                        @for ($i = 0; $i <= 100; $i+=10)
                        <option value="{{$i}}"
                        @if (App\Models\ProjectRubro::getValue($ru->rubro_id,$idinforme,$idvivienda) == $i)
                            selected="selected"
                        @endif
                        >{{$i}}% </option>
                        @endfor
                    </select>
                </td>
              </tr>
     @endforeach

    </tbody>
    <tfoot>

    </tfoot>
</table>
<div class="form-group row">
    <div class="offset-sm-3 col-md-12">
        <button type="submit" class="btn btn-success pull-right">Guardar Datos</button>
    </div>
</div>
</form>
@section('css')
<style>
#wgtmsr{
 width:100px;
}

#wgtmsr option{
 width:80px;
}

</style>
@endsection

@section('js')

<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2({
        placeholder: "Avance",
    });
});
</script>

@endsection
