@extends('layouts.app')
@section('content')
    <style type="text/css">

        .btn-circle {

            width: 25px;
            height: 25px;
            text-align: center;
            padding: 3px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px ;
        }
    </style>
    <div class="row">
        <div class="col-md-10  col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Anteproyecto para revisar de {{ $alumno->nombre }} {{ $alumno->apaterno }} {{ $alumno->amaterno }}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <ul class="nav nav-tabs">
                <li ><a href="{{ url('residencia/revisar_anteproyecto/'.$id_anteproyecto.'/'.$id_profesor ) }}">Portada</a></li>
                <li >
                    <a href="{{ url('/residencia/revisar_objetivos/'.$id_anteproyecto.'/'.$id_profesor ) }}" >Objetivos</a>
                </li>
                <li>
                    <a href="{{ url('/residencia/revisar_alcances/'.$id_anteproyecto.'/'.$id_profesor ) }}" >Alcances</a>
                </li>
                <li>
                    <a href="{{ url('/residencia/revisar_justificacion/'.$id_anteproyecto.'/'.$id_profesor ) }}" >Justificación</a>
                </li>
                <li>
                    <a href="{{ url('/residencia/revisar_marcoteorico/'.$id_anteproyecto.'/'.$id_profesor ) }}" >Marco teorico</a>
                </li>
                <li class="active">
                    <a href="#" >Cronograma</a>
                </li>
                @if($anteproyecto_calificado == 1)
                    <li>
                        <button type="button" id="enviar_anteproyecto" class="btn btn-success " onclick="window.location='{{ url('/residencia/enviar_anteproyecto_alumno/'.$id_anteproyecto.'/'.$id_profesor ) }}'" title="Enviar">Enviar Anteproyecto</button>
                    </li>
                @endif




            </ul>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <br>
                        <div class="col-md-8 col-md-offset-2" style="text-align: center">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title text-center">Cronograma</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <table id="table_enviado" class="table table-bordered table-resposive">
                            <thead>
                               <th>Semana</th>
                               <th>Actividad</th>
                               <th> Fecha inicial</th>
                               <th> Fecha final</th>
                            </thead>
                            <tbody>
                           @foreach($cronograma as $cronograma)
                            <tr>
                                <td style="text-align: justify">
                                    {{ $cronograma->no_semana }}
                                </td>
                                <td style="text-align: justify">
                                {{ $cronograma->actividad }}
                                </td>
                                <td style="text-align: justify">
                                    {{ $cronograma->f_inicio }}
                                </td>
                                <td style="text-align: justify">
                                    {{ $cronograma->f_termino }}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
        @if($comentario_cronograma == 0 )
            <div class="col-md-4">
                @if($autorizado_profesor == 0)
                <div class="row">
                   <div class="panel panel-success">
                    <div class="panel-heading" style="text-align: center">Evaluaciòn</div>
                    <div class="panel-body">
                        <table id="table_enviado" class="table table-bordered table-resposive">
                            <thead>
                            <tr>
                                <th>Autorizado</th>
                                <th>Autorizado con cambios</th>
                                <th>Rechazado</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-info aceptar_cronograma_anteproyecto"  title="Aceptar"><i class="glyphicon glyphicon-ok" style="font-size: 20px;"></i></button>

                                </td>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-warning cambios_cronograma_anteproyecto"  title="Aceptado con cambios"><i class=" glyphicon glyphicon-exclamation-sign " style="font-size: 20px; " ></i></button>

                                </td>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-danger rechazar_cronograma_anteproyecto"  title="Rechazar"><i class="glyphicon glyphicon-remove" style="font-size: 20px;"></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                    @else

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="alert alert-danger" role="alert" style="text-align: center;">
                                        Ya autorizaste el cronograma
                                    </div>
                                </div>
                            </div>

                    @endif
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center">COMENTARIOS

                        </div>
                    </div>
                    </div>
                </div>
                    @for ($i =$numero_evaluacion; $i >0;  $i--)
                        @if($i==$numero_evaluacion)

                            <div class="row" style="text-align: center;">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <a href="#" class="comentarios" id="{{$i}}">Ver comentarios de la evaluación {{ $i }} actual </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row" style="text-align: center;">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <a href="#" class="comentarios" id="{{$i}}">Ver comentarios de la evaluación {{ $i }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
            </div>
            </div>
        @else
            <div class="col-md-4">
                @if($autorizado_profesor == 1)
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="alert alert-danger" role="alert" style="text-align: center;">
                                Ya autorizaste el cronograma
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center">COMENTARIOS

                        </div>
                    </div>
                    </div>
                </div>
                @for ($i =$numero_evaluacion; $i >0;  $i--)
                    @if($i==$numero_evaluacion)

                        <div class="row" style="text-align: center;">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <a href="#" class="comentarios" id="{{$i}}">Ver comentarios de la evaluación {{ $i }} actual </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row" style="text-align: center;">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <a href="#" class="comentarios" id="{{$i}}">Ver comentarios de la evaluación {{ $i }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
    </div>
    @endif
    </div>
    {{-- Modal para agregar evaluación--}}
        <div class="modal fade bs-example-modal-lg" id="modal_agregar_comentario_cronograma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nuevo Comentario</h4>
                    </div>
                    <div class="modal-body">
                        <form id="form_registrar" action="{{url("/residencia/guardar_comentarios_cronograma/")}}" class="form" role="form" method="POST">

                        {{ csrf_field() }}
                        <input type="hidden" id="id_profesor" name="id_profesor" value="{{ $id_profesor }}">
                        <input type="hidden" id="comentario_cronograma" name="comentario_cronograma" value="{{ $comentario_cronograma }}">
                        <input type="hidden" id="id_anteproyecto" name="id_anteproyecto" value="{{$id_anteproyecto }}">
                        <input type="hidden" id="id_estado_evaluacion" name="id_estado_evaluacion" value="">

                        <div class="row" >
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label for="descripcion">Comentario</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Ingresa el motivo " style="" required></textarea>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-primary " id="guardar">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>


    <div class="modal fade" id="modal_mostrar_cronograma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Comentarios</h4>
                </div>
                <div id="mostrar_comentarios_cronograma">


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                </div>

            </div>

        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#guardar").click(function(event) {
                var descripcion = $("#descripcion").val();
                if (descripcion != "") {
                    $("#guardar").attr("disabled", true);
                    $("#form_registrar").submit();

                    swal({
                        position: "top",
                        type: "success",
                        title: "Registro exitoso",
                        showConfirmButton: false,
                        timer: 3500
                    });

                }
                else{
                    swal({
                        position: "top",
                        type: "warning",
                        title: "El campo se encuentra  vacío.",
                        showConfirmButton: false,
                        timer: 3500
                    });
                }
            });
            $(".aceptar_cronograma_anteproyecto").click(function(){
                var aceptado=1;
                $('#id_estado_evaluacion').val(aceptado);
                $('#modal_agregar_comentario_cronograma').modal('show');

            });
            $(".cambios_cronograma_anteproyecto").click(function(){
                var cambios=2;
                $('#id_estado_evaluacion').val(cambios);
                $('#modal_agregar_comentario_cronograma').modal('show');

            });
            $(".rechazar_cronograma_anteproyecto").click(function(){
                var rechazado=3;
                $('#id_estado_evaluacion').val(rechazado);
                $('#modal_agregar_comentario_cronograma').modal('show');

            });
            $(".comentarios").click(function(){
                var id_anteproyecto="<?php  echo $id_anteproyecto;?>";
                var id_evaluacion=$(this).attr("id");
                // alert(id_anteproyecto);
                $.get("/residencia/mostrar_comentario_cronograma/"+id_evaluacion+"/"+id_anteproyecto,function(request){
                    $("#mostrar_comentarios_cronograma").html(request);
                    $("#modal_mostrar_cronograma").modal('show');

                });


            });
            $("#enviar_anteproyecto").click(function (){
                $("#enviar_anteproyecto").attr("disabled", true);
                swal({
                    position: "top",
                    type: "success",
                    title: "Envio correctamente",
                    showConfirmButton: false,
                    timer: 3500
                });
            });

        });
    </script>

@endsection