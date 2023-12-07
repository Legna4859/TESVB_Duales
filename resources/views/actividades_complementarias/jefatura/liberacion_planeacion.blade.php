@extends('layouts.app')
@section('title', 'LiberacionPlaneacion')
@section('content')

<main class="col-md-12">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-info">
        <div class="panel-heading">Planeaciones de Docentes</div>
      </div>
    </div>
  </div>

<div class="row ">
  <div class="row col-md-10 col-md-offset-1">
    <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tres" aria-controls="home" role="tab" data-toggle="tab">No Liberados</a></li>
        <li role="presentation"><a href="#cuatro" aria-controls="cuatro" role="tab" data-toggle="tab">Liberados</a></li>
      </ul>
  <!-- Tab panes -->
    <div class="tab-content ">
      <div role="tabpanel" class="tab-pane active" id="tres">
        <div class=" col-md-12">
            <div class="col-md-8 col-md-offset-5">
            </br></br></br>
               <div class="col-md-4 col-md-offset-4" style="text-align:right;">
                <label>Seleccionar Todos</label></div>
                  <div class="col-md-4">
                    <label class="switch">
                      <input type="checkbox" id="checktodos">
                        <div class="slider round"></div>
                    </label>
                  </div>
          </div>      
               
      <table class="table table-bordered tabla-grande2 ">
        <thead>
          <tr>
            <th>Docente</th>
            <th>Actividad</th>
            <th>Número Evidencias</th>
            <th>Rúbrica</th>
            <th>Aprobación</th>
          </tr>
        </thead>
        <tbody>
          @foreach($evidencias_no as $evidencias_no)
          <tr>
            <td>{{$evidencias_no->titulo}} {{$evidencias_no->nombre}}</td>
            <td>{{$evidencias_no->descripcion}}</td>
            <td>{{$evidencias_no->no_evidencias}}</td>
            <td>{{$evidencias_no->rubrica}}</td>
            <td><a href="{{url("/ArchivosDocentes",$evidencias_no->rubrica)}}" target="_blank"><span class="glyphicon glyphicon-file em"  aria-hidden="true"></span></a></td>            <td>
              <input class="checkbox" name="orderbox[]"  type="checkbox" value="1" id="liberacion_jefe" data-registro="{{$evidencias_no->id_reg_coordinador}}">
            </td>
          </tr>
          @endforeach
        </tbody>
      </table> 
       </div>
      </div>
    <div role="tabpanel" class="tab-pane" id="cuatro">
    </br></br></br>

  
           
      <table class="table table-bordered tabla-grande2 ">
        <thead>
          <tr>
            <th>Docente</th>
            <th>Actividad</th>
            <th>Número Evidencias</th>
            <th>Rúbrica</th>
          </tr>
        </thead>
        <tbody>
          @foreach($evidencias_si as $evidencias_si)
          <tr>
            <td>{{$evidencias_si->titulo}} {{$evidencias_si->nombre}}</td>
            <td>{{$evidencias_si->descripcion}}</td>
            <td>{{$evidencias_si->no_evidencias}}</td>
            <td>{{$evidencias_si->rubrica}}</td>
            <td><a href="{{url("/ArchivosDocentes",$evidencias_si->rubrica)}}" target="_blank"><span class="glyphicon glyphicon-file em"  aria-hidden="true"></span></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>           
         </div>
      </div>
  </div>
</div>
<?php
  $direccion=Session::get('ip');
?>

  <button type="button" class="btn btn-primary btn-lg flotante" data-placement="left" id="insertar">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  </button>     

<div id="mensaje_actividad" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body text-warning">
        <p style="font-weight: bold; color:#BA0000; text-align:center;">NO HAS SELECCIONADO DATOS A LIBERAR</p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</main>

<script>
    $(document).ready(function(){

    var direccion="{{$direccion}}";

      $("#checktodos").change(function(){

          $('input[name="orderbox[]"]').prop('checked',$(this).prop("checked"));
      });

         $("#checktodoss").change(function(){

          $('input[name="orderboxx[]"]').prop('checked',$(this).prop("checked"));
      });

      
      $('#insertar').click(function(){
          var checkboxValues=[];
          var registro=[];


            $('input[name="orderbox[]"]:checked').each(function(){
            checkboxValues[checkboxValues.length]=$(this).val();
            registro[registro.length]=$(this).data('registro'); 

            });
            
          var $marcados=$('input[name="orderbox[]"]:checked');
          var numero=$marcados.length;
          if(numero==0)
          {
              $('#mensaje_actividad').modal('show');
                setTimeout(myFunction, 2000); 

                function myFunction(){
                $('#mensaje_actividad').modal('hide');
                }
          }
          else
          {
          var suma=numero+numero;
          var arreglo=[];
          var j=0;

          for(var i=0;i<numero;i++){

            arreglo[i]=checkboxValues[i];
          }
          for(var e=numero;e<suma;e++){

            arreglo[e]=registro[j];
            j++;
          }

              window.location.href=direccion+"/edita_planeacion/"+arreglo;
        }
      });


     $('#remover').click(function(){
          var checkboxValues=[];
         var registro=[];

         
          
            $('input[name="orderboxx[]"]:checked').each(function(){
            checkboxValues[checkboxValues.length]=$(this).val();
            registro[registro.length]=$(this).data('registroo'); 

            });
            
          var $marcados=$('input[name="orderboxx[]"]:checked');
          var numero=$marcados.length;

          var suma=numero+numero;
          var arreglo=[];
          var j=0;

          for(var i=0;i<numero;i++){

            arreglo[i]=checkboxValues[i];
          }
          for(var e=numero;e<suma;e++){

            arreglo[e]=registro[j];
            j++;
          }

              window.location.href="{{url("planeacion_si/")}}"+arreglo;
          });
          
});
</script>



@endsection