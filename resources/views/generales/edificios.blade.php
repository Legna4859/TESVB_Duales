@extends('layouts.app')
@section('title', 'Edificios')
@section('content')

<main class="col-md-12">

   <?php $jefe_division=session()->has('jefe_division')?session()->has('jefe_division'):false;
 $directivo=session()->has('directivo')?session()->has('directivo'):false; 
 $consultas=session()->has('consultas')?session()->has('consultas'):false;?>

<div class="row">
	<div class="col-md-5 col-md-offset-3">
     @if (session()->has('flash_notification.message'))
            <div class="alert alert-{{ session('flash_notification.level') }}">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!! session('flash_notification.message') !!}
            </div>
          @endif
		<div class="panel panel-info">
	  		<div class="panel-heading">
	    		<h3 class="panel-title text-center">EDIFICIOS</h3>
	  		</div>
		</div>	
	</div>
  <div class="col-md-5 col-md-offset-3">
    <table class="table table-bordered " >
                          <thead>
                            <tr>
                                <th class="text-center">Descripcion</th>
                                @if($directivo!=null || $consultas!=null)
                                <th>Editar</th>
                                <th>Eliminar</th>
                                @endif
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($edificios as $edificio)
                            <tr>
                              <td>{{$edificio->nombre}}</td>
                              @if($directivo!=null || $consultas!=null)
                              <td class="text-center">
                                <a href="/generales/edificios/{{ $edificio->id_edificio }}/edit"><span class="glyphicon glyphicon-cog em2" aria-hidden="true"></span></a>
                              </td>
                              <td class="text-center">
                                <a class="elimina" id="{{ $edificio->id_edificio }}"><span class="glyphicon glyphicon-trash em2" aria-hidden="true"></span></a>
                              </td>
                              @endif
                            </tr>
                            @endforeach
                          </tbody>
                        </table>  
  </div>
</div>	
@if($directivo!=null || $consultas!=null)
                <div>
            <button data-toggle="modal"  data-tooltip="true" data-placement="left" title="AGREGA NUEVO EDIFICIO" data-target="#modal_crea" type="button" class="btn btn-success btn-lg flotante">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
      </div>
      @endif

@if(isset($edit))
      @section('modifica_edificio')
      @include('generales.partialsg.partial_mo_edificio')
      @show
@endif
</main>

<!-- MODAL PARA ELIMINAR -->
<div id="modal_elimina" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
<form action="" method="POST" role="form" id="form_delete">
 {{method_field('DELETE') }}
  {{ csrf_field() }}
        ¿Realmente deseas eliminar éste elemento?
      </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input id="confirma_elimina" type="button" class="btn btn-danger" value="Aceptar"></input>
      </div>
</form>
      </div>
    </div>
  </div>
</div>

<!-- Modal para crear-->
<form id="form_edificio_crea" class="form" role="form" method="POST" >
<div class="modal fade" id="modal_crea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar Edificio</h4>
      </div>
      <div class="modal-body">
        <form>
          {{ csrf_field() }}
          <div clas="row">
            <div class="col-md-10 col-md-offset-1">
                   <div class="form-group">
                      <label for="nombre_edificio">Nombre del Edificio</label>
                      <input type="text" class="form-control" id="caja-error" name="nombre_edificio" placeholder="Nombre..." style="text-transform:uppercase">
                      @if($errors -> has ('nombre_edificio'))
                          <span style="color:red;">{{ $errors -> first('nombre_edificio') }}</span>
                         <style>
                          #caja-error
                          {
                            border:solid 1px red;
                          }
                          </style>
                      @endif
                    </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button id="guarda_edificio" type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>
<script>
$(document).ready(function() {

       $(".elimina").click(function(){
            var id=$(this).attr('id');
            $('#confirma_elimina').data('id',id);
            //alert(id);
            $('#modal_elimina').modal('show');
        });

   $("#guarda_edificio").click(function(event){
            $("#form_edificio_crea").submit();
    });

          $("#form_edificio_crea").validate({
            rules: {
           nombre_edificio: {
            required: true,
          },     
        },            
          });


    $("#modifica_edificio").click(function(event){
            $("#form_edificio_mo").submit();
            });

          $("#form_edificio_mo").validate({
            rules: {
           nombre_edificio: {
            required: true
          },      
        },            
          highlight: function(element) {
                $(element).closest('.control-group').removeClass('success').addClass('error');
            },
            success: function(element) {
                element
                .text('OK!').addClass('valid')
                .closest('.control-group').removeClass('error').addClass('success');
            },
          });

      $("#confirma_elimina").click(function(event){
          var id_edi=($(this).data('id'));
          $("#form_delete").attr("action","/generales/edificios/"+id_edi)      
          $("#form_delete").submit();
          });
});
        </script>
@endsection
