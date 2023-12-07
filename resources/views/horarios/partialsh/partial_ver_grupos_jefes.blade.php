@section('horario_grupo')

<main>
<!-- Modal para ver horario_grupos -->
<div class="modal fade bs-example-modal-lg" id="modal_hrs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="modal_horas">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">HORARIO GRUPO: {{ $id_semestre2 }}{{ 0 }}{{ $grupo2 }}</h4>
      </div>
      <div class="modal-body">
        
     @if($imprime==1)           
        <div class="col-md-2">
  <a href="/pdf_grupos/{{$id_semestre2}}/{{$grupo2}}/{{$id_carrera}}" class="btn btn-primary crear" target="_blank"><span class="glyphicon glyphicon-print"  aria-hidden="true"></span> Imprimir</a>
                        </div>
     @endif

            <table class="table table-bordered text-center ml" style="table-layout:fixed;">
                          <thead>
                            <tr>
                                <th>Hora/Día</th>
                                <th>Lunes</th>
                                <th>Martes</th>
                                <th>Miércoles</th>
                                 <th>Jueves</th>
                                <th>Viernes</th>
                                <th>Sábado</th>
                            </tr>
                          </thead>

                          <tbody>  
                          <?php $contador=1 ?>
                            @foreach($semanas as $semanass)
                            @if($contador==1)
                              <tr>                            
                                <td class="horario">{{ $semanass->hora }}</td> 
                            @endif                        
                            <td class="horario">  
                              <?php $bandera_aula=0; ?>        
                                  @foreach($horario_grupo as $horario)          
                                  @if($horario->id_semana==$semanass->id_semana&&($bandera_aula==0)) 
                                  <?php $bandera_aula++?>
                                      <div>
                                        <div>
                                          {{ $horario->materia }}<br>{{ $horario->aula }}<br>
                                        </div>
                                      </div> 

                                  @endif    
                                @endforeach
                              </td>
                                <?php $contador++?>                  
                                  @if($contador==7)
                                  <?php $contador=1 ?>                                                
                                  </tr>
                                  @endif
                                     @endforeach                                                                                           
                          </tbody>
                        </table>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
                  <table class="table table-bordered tabla-grande2">
                    <thead>
                      <th>Materia</th>
                      <th>Profesor</th>
                      <th>Actividad</th>
                    </thead>
                          <tbody>
                            @foreach($docentes as $docente)
                            <tr>
                              <td>{{ $docente->materia }}</td>
                              <td>{{ $docente->nombre }} </td>
                              <td>{{ $docente->act }} </td>

                            </tr>
                            @endforeach
                          </tbody>
                        </table>
  </div>
</div>
      </div>
          <div class="modal-footer">
                      <button type="button" class="btn btn-primary " data-dismiss="modal">Aceptar</button>
          </div>
    </div>
  </div>
</div>
</main>

<script>
  $(document).ready(function(){

    $("#modal_hrs").modal("show");

  });

</script>

@endsection