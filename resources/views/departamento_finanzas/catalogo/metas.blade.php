@extends('layouts.app')
@section('title', 'Metas del Proyecto')
@section('content')
    <div class="row">
        <div class="col-md-10 col-xs-10 col-md-offset-1">
            <p>
                <span class="glyphicon glyphicon-arrow-right"></span>
                <a href="{{url("/presupuesto_anteproyecto/proyectos_metas")}}">Proyectos registrados</a>
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span>Metas del proyecto</span>

            </p>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center"> Metas del proyecto {{ $proyecto->nombre_proyecto }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-1 col-md-offset-2">
            <button data-toggle="modal"  data-tooltip="true" data-placement="left" title="Agregar nueva meta" data-target="#modal_crear_meta" type="button" class="btn btn-success btn-lg flotante">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <p><br></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-bordered" id="registros_metas">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre de la meta</th>
                    <th>Modificar</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($metas as $meta)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $meta->meta }}</td>
                        <td>
                            <button data-toggle="tooltip" data-placement="top" id="{{$meta->id_meta }}" title="Modificar meta" class="btn btn btn-primary h-primary_m pl-5 pr-5 modificar_meta">Modificar meta</button>
                        </td>

                    </tr>
                @endforeach



                </tbody>
            </table>
        </div>
    </div>

    {{-- modal crear proyecto--}}

    <div class="modal fade" id="modal_crear_meta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Agregar meta</h4>
                </div>
                <div class="modal-body">

                    <form id="form_agregar" class="form" action="{{url("/presupuesto_anteproyecto/guardar_meta/".$proyecto->id_proyecto)}}" role="form" method="POST" >
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <label>Agregar nombre de la meta</label>
                                    <textarea class="form-control" id="nombre_meta" name="nombre_meta" rows="3" onkeyup="javascript:this.value=this.value.toUpperCase();" required></textarea>
                                </div>
                            </div>
                        </div>

                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="guardar_meta"  class="btn btn-primary" >Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal modificar proyecto--}}

    <div class="modal fade" id="modal_modificacion_meta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Modificar meta</h4>
                </div>
                <div class="modal-body">
                    <div id="contenedor_modificacion_meta">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="guardar_modificacion_meta"  class="btn btn-primary" >Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready( function() {

            $("#guardar_meta").click(function (){
                var nombre_meta = $('#nombre_meta').val();

                if( nombre_meta != ''){

                    $("#form_agregar").submit();
                    $("#guardar_meta").attr("disabled", true);
                }else{
                    swal({
                        position: "top",
                        type: "error",
                        title: "El campo nombre de la meta no debe ser vacio",
                        showConfirmButton: false,
                        timer: 3500
                    });
                }
            });
            $("#registros_metas").on('click','.modificar_meta',function(){
                var id_meta =$(this).attr('id');

                $.get("/presupuesto_anteproyecto/modificar_meta/"+id_meta,function (request) {
                    $("#contenedor_modificacion_meta").html(request);
                    $("#modal_modificacion_meta").modal('show');
                });
            });

            $("#registros_periodos").on('click','.modificar_periodo',function(){
                var id_periodo =$(this).attr('id');

                $.get("/presupuesto_anteproyecto/modificar_periodos_anteproyecto/"+id_periodo,function (request) {
                    $("#contenedor_modificacion").html(request);
                    $("#modal_modificacion").modal('show');
                });
            });
            $("#guardar_modificacion_meta").click(function (){
                $("#form_modificar_meta").submit();
                $("#guardar_modificacion_meta").attr("disabled", true);
            });


        });
    </script>
@endsection