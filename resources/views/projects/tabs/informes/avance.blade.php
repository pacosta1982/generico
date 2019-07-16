<table id="example" class="table" style="width:100%">
    <thead>
        <tr>
        <th>Vivienda</th>
        <th>Estado</th> 
        <th class="dt-center">Acciones</th>
        </tr>
        </thead>
    <tbody>
        @foreach($informecasa as $inf)  
        <tr>
        <td>Vivienda N° {!! $inf->name !!}</td>
        <td>{!! $inf->fecha_visita !!}</td>
        <td class="dt-center">
            <a href="{!! action('ViviendaController@index', ['id'=>$inf->project_id,'idvisita'=>$informe->id, 'idvivienda' => $inf->id]) !!}" class="announce"> 
                <button class="btn btn-primary" hr type="button">Verificar</button>
            </a>
        </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
        <th>Vivienda</th>
        <th>Estado</th> 
        <th class="dt-center">Acciones</th>
        </tr>
    </tfoot>
</table>