<div class="box box-solid box-primary">
    <div class="box-header">
        <h3 class="box-title">Proyecto: {!! $project->SEOBProy !!}</h3>
    </div>
    <div class="box-body">
        <div class="row invoice-info">
            <div class="col-sm-6 invoice-col">
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
            <div class="col-sm-6 invoice-col">
                <address>
                
                Estado: <br>
                Resolución: <br>
                Monto Total: {{isset($beneficiarios)?$beneficiarios->count():'0'}}<br>
                Telefono: {!! $project->state_id?$project->state->name:"" !!}<br>
                Telefono: {!! $project->city_id?$project->city->name:"" !!}<br>
                Telefono: <br> 
                Telefono: <br>
                
                </address>
            </div>
        </div>
    </div>
</div>

<div class="box box-solid box-primary">
    <div class="box-header">
        <h3 class="box-title">2. Vigencia de Pólizas</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-4">
                Fiel Cumplimineto del Contrato
            </div>
            <div class="col-sm-4">
                9/20/2018
            </div>
            <div class="col-sm-4">
                Vigente
            </div>
        </div>
        <div class="row">
                <div class="col-sm-4">
                    1er Anticipo financiero
                </div>
                <div class="col-sm-4">
                    9/20/2018
                </div>
                <div class="col-sm-4">
                    Vigente
                </div>
            </div>
            <div class="row">
                    <div class="col-sm-4">
                        2do Anticipo financiero
                    </div>
                    <div class="col-sm-4">
                        9/20/2018
                    </div>
                    <div class="col-sm-4">
                        Vigente
                    </div>
                </div>
    </div>
</div>

<div class="box box-solid box-primary">
        <div class="box-header">
            <h3 class="box-title">3. Obligaciones del Sat</h3>
        </div>
        <div class="box-body">
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>3.1 Profesionales de Obra</label>
                        <textarea class="form-control" rows="2" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Observaciones</label>
                        <textarea class="form-control" rows="2" placeholder="Enter ..."></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>3.2 Documentacion de Obra</label>
                        <textarea class="form-control" rows="2" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Observaciones</label>
                        <textarea class="form-control" rows="2" placeholder="Enter ..."></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>3.3 Materiales en Obra</label>
                        <textarea class="form-control" rows="2" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Observaciones</label>
                        <textarea class="form-control" rows="2" placeholder="Enter ..."></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>3.4 Mano de Obra</label>
                        <textarea class="form-control" rows="2" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Observaciones</label>
                        <textarea class="form-control" rows="2" placeholder="Enter ..."></textarea>
                    </div>
                </div>
            </div>

        </div>
    </div>