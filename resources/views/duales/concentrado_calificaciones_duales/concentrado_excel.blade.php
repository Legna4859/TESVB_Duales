<table border="1" style="border-collapse: collapse; width: 100%;">
    <thead>
    <tr>
        <th colspan="7"></th><th colspan="15" style="border: 1px solid black; padding: 8px; background: #a8daef;
        text-align: center;font-family: 'Times New Roman', serif;font-size:12pt">CONCENTRADO DE CALIFICACIONES DUALES</th>
    </tr>
    <tr>
        <th colspan="7"></th><th colspan="15" style="border: 1px solid black; padding: 8px; background: #a8daef;
        text-align: center;font-family: 'Times New Roman', serif;font-size:12pt">MATERIA: {{ $materia_seleccionada[0]->materias }}</th>
    </tr>
    <tr>
        <th colspan="7"></th><th colspan="15" style="border: 1px solid black; padding: 8px; background: #a8daef;
        text-align: center;font-family: 'Times New Roman', serif;font-size:12pt">CLAVE DE LA MATERIA: {{ $materia_seleccionada[0]->clave }}</th>
    </tr>
    <tr></tr>
    <th colspan="7"></th><th colspan="15" style="border: 1px solid black; padding: 8px; background: #dff0d8;
     text-align: center;font-family: 'Times New Roman', serif;font-size:12pt">Concentrado de Calificaciones Completo</th>
    <tr>

    </tr>
    <tr>

    </tr>
    <tr>
        <th colspan="7"></th><th colspan="15"  style="border: 1px solid black; padding: 8px; background: #a8daef; text-align: center;font-family: 'Times New Roman', serif;font-size:12pt">PROFESOR</th>
    </tr>
    </thead>
    <tbody>
    @foreach($datos as $dato)
        <tr>
            <td colspan="7"></td><td style="border: 1px solid black; padding: 8px; text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="15">{{ $dato->titulo . " " . $dato->profesor }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<table border="1" style="border-collapse: collapse; width: 100%;">
    <thead>
    <tr>
        <th colspan="2"></th><th style="border: 1px solid black; padding: 8px; background: #a8daef; text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">NP.</th>
        <th style="border: 1px solid black; padding: 8px; background: #a8daef; text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">No. CTA</th>
        <th style="border: 1px solid black; padding: 8px; background: #a8daef; text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">ALUMNO</th>
        <th style="border: 1px solid black; padding: 8px; background: #a8daef; text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">PROMEDIO MATERIA</th>
        <th style="border: 1px solid black; padding: 8px; background: #a8daef; text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="1">TE</th>
        <th style="border: 1px solid black; padding: 8px; background: #a8daef; text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">PROMEDIO GENERAL</th>
    </tr>
    </thead>
    <tbody>
    @foreach($materias_calificaciones as $alumno)
        <tr>
            <th colspan="2"></th><td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">{{$alumno['numero']}}</td>
            <td style="background: {{ $alumno['estado_alumno'] == 2 ? '#ffee62' : ($alumno['estado_alumno'] == 3 ? '#a94442' : 'none') }};color: {{ $alumno['estado_alumno'] == 3 ? 'white' : 'black' }};
                border: 1px solid black;padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size: 12pt;" colspan="5">{{$alumno['cuenta']}}</td>
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">{{$alumno['nombre']}}</td>
            @foreach($alumno['l'] as $calificacion)
                @if($calificacion['estado'] == 1)
                    <td style="font-family: 'Times New Roman', serif;font-size:12pt;border: 1px solid black; padding: 8px;background: black; color: white; text-align: center;" colspan="5">NO cursa</td>
                    <td style="font-family: 'Times New Roman', serif;font-size:12pt;border: 1px solid black; padding: 8px;background: black; color: white;text-align: center;" colspan="5"></td>
                @else
                    @if($calificacion['promedio'] < 70)
                        <td style="font-family: 'Times New Roman', serif;font-size:12pt;border: 1px solid black; padding: 8px;text-align: center;background: red; color: white;" colspan="5">N.A.</td>
                    @else
                        <td style="font-family: 'Times New Roman', serif;font-size:12pt;border: 1px solid black; padding: 8px;text-align: center;" colspan="5">{{$calificacion['promedio']}}</td>
                    @endif
                    <td style="font-family: 'Times New Roman', serif;font-size:12pt;border: 1px solid black; padding: 8px;text-align: center;" colspan="1">{{$calificacion['te']}}</td>
                @endif
            @endforeach
            @if($alumno['estado_validacion'] == 10)
                <td style="background: red; color:black;text-align: center;" colspan="5">BAJA</td>
            @else
                @if($alumno['promedio_f'] < 70)
                    <td style="background: red; color:black;font-family: 'Times New Roman', serif;font-size:12pt;border: 1px solid black; padding: 8px;text-align: center;" colspan="5">
                        {{ $alumno['promedio_f']  }}
                    </td>
                @else
                    <td style="font-family: 'Times New Roman', serif;font-size:12pt;border: 1px solid black; padding: 8px;text-align: center;" colspan="5">{{$alumno['promedio_f']}}</td>
                @endif
            @endif
        </tr>
    @endforeach
    <?php
    $numero_materia=0;
    $creditos_finales=0;
    $total_creditos_grupo=0;
    $total_aprobados_grupo=0;
    ?>
    <tr>
        <th colspan="2"></th><td colspan="15" style="border: 1px solid black; padding: 8px;text-align: right;font-family: 'Times New Roman', serif;font-size:12pt">
            Meta Real
        </td>
        @foreach($com as $califi)
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">
                    <?php
                    $numero_materia++;
                    $creditos_finales+=$califi['creditos'];
                    ?>
                @if($califi['aprobados']==0)
                    0%
                @else
                        <?php
                        $meta_real=($califi['aprobados']*100)/$califi['total'];
                        $meta_real=number_format($meta_real, 2, '.', ' ');
                        ?>
                    {{ $meta_real }}%
                @endif
            </td>
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="1"></td>
        @endforeach

        <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">
            @if($numero_alumno != 0)
                    <?php
                    $indice_final_aprobacion = ($numero_promedio_aprobado * 100) / $numero_alumno;
                    $indice_final_aprobacion = number_format($indice_final_aprobacion, 2, '.', ' ');
                    ?>
                {{ $indice_final_aprobacion }}%
            @else
                0%
            @endif
        </td>
    </tr>
    <tr>
        <th colspan="2"></th><td colspan="15" style="border: 1px solid black; padding: 8px;text-align: right;font-family: 'Times New Roman', serif;font-size:12pt">Alumnos Que Cursan La Materia</td>
        @foreach($com as $califi)
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">{{$califi['total']}}</td>
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="1"></td>
        @endforeach
        <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">{{ $numero_alumno }}</td>
    </tr>
    <tr>
        <th colspan="2"></th><td colspan="15" style="border: 1px solid black; padding: 8px;text-align: right;font-family: 'Times New Roman', serif;font-size:12pt">Alumnos Aprobados</td>
        @foreach($com as $califi)
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">{{$califi['aprobados']}}</td>
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="1"></td>
        @endforeach
        <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">{{ $numero_promedio_aprobado }}</td>
    </tr>
    <tr>
        <th colspan="2"></th><td colspan="15" style="border: 1px solid black; padding: 8px;text-align: right;font-family: 'Times New Roman', serif;font-size:12pt">Alumnos Reprobados</td>
        @foreach($com as $califi)
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">{{$califi['reprobados']}}</td>
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="1"></td>
        @endforeach
        <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">{{ $numero_promedio_reprobado }}</td>
    </tr>
    <tr>
        <th colspan="2"></th><td colspan="15" style="border: 1px solid black; padding: 8px;text-align: right;font-family: 'Times New Roman', serif;font-size:12pt">Indice de Reprobación</td>
        @foreach($com as $califi)
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">
                @if($califi['reprobados']==0)
                    0%
                @else
                        <?php
                        $indice_r=($califi['reprobados']*100)/$califi['total'];
                        $indice_r=number_format($indice_r, 2, '.', ' ');
                        ?>
                    {{ $indice_r }}%
                @endif
            </td>
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="1"></td>
        @endforeach
        <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">
            @if($numero_alumno != 0)
                    <?php
                    $indice_final_reprobacion = ($numero_promedio_reprobado * 100) / $numero_alumno;
                    $indice_final_reprobacion = number_format($indice_final_reprobacion, 2, '.', ' ');
                    ?>
                {{ $indice_final_reprobacion }}%
            @else
                0%
            @endif
        </td>
    </tr>
    <tr>
        <th colspan="2"></th><td colspan="15" style="border: 1px solid black; padding: 8px;text-align: right;font-family: 'Times New Roman', serif;font-size:12pt">Promedio De La Materia</td>
        @foreach($com as $califi)
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">
                @if($califi['total']==0)
                    0.00
                @else
                        <?php
                        $promedio=($califi['suma_promedios'])/$califi['total'];
                        $promedio=number_format($promedio, 2, '.', ' ');
                        ?>
                    {{ $promedio }}
                @endif
            </td>
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="1"></td>
        @endforeach
        <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">
            @if($promedio==0)
                0.00
            @else
                    <?php  $pro_f=$promedio;
                    $pro_f=number_format($pro_f, 2, '.', ' ');?>
                {{$pro_f}}
            @endif
        </td>
    </tr>
    <tr>
        <th colspan="2"></th><td colspan="15" style="border: 1px solid black; padding: 8px;text-align: right;font-family: 'Times New Roman', serif;font-size:12pt">Alumnos Baja</td>
        @foreach($com as $califi)
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">
                {{$califi['bajas']}}
            </td>
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="1"></td>
        @endforeach
        <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">{{ $bajas }}</td>
    </tr>
    <tr>
        <th colspan="2"></th><td colspan="15" style="border: 1px solid black; padding: 8px;text-align: right;font-family: 'Times New Roman', serif;font-size:12pt">Indice de Deserción</td>
        @foreach($com as $califi)
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">
                @if($califi['bajas']==0)
                    0%
                @else
                        <?php
                        $indice_desercion=($califi['bajas']*100)/($califi['total']+$califi['bajas']);
                        $indice_desercion=number_format($indice_desercion, 2, '.', ' ');
                        ?>
                    {{ $indice_desercion }}%
                @endif
            </td>
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="1"></td>
        @endforeach
        <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">
            @if($bajas ==0)
                0.00 %
            @else
                    <?php
                    $total_al=$numero_alumno+$bajas;
                    $indice_desercion_final=($bajas*100)/$total_al;
                    $indice_desercion_final=number_format($indice_desercion_final, 2, '.', ' ');
                    ?>
                {{ $indice_desercion_final }} %
            @endif
        </td>
    </tr>
    <tr>
        <th colspan="2"></th><td colspan="15" style="border: 1px solid black; padding: 8px;text-align: right;font-family: 'Times New Roman', serif;font-size:12pt">Créditos por Materia</td>
        @foreach($com as $califi)
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">
                @if(is_numeric($califi['creditos']))
                    {{ $califi['creditos'] }}
                @else
                    <!-- Manejo del caso en que la variable no es numérica -->
                    {{ $califi['creditos'] }}
                @endif
            </td>
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="1"></td>
        @endforeach
        <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">{{ is_numeric($creditos_finales) ? $creditos_finales : '' }}</td>
    </tr>
    <tr>
        <th colspan="2"></th><td colspan="15" style="border: 1px solid black; padding: 8px;text-align: right;font-family: 'Times New Roman', serif;font-size:12pt">Total De Créditos Cursados En La Materia</td>
        @foreach($com as $califi)
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">
                @php
                    $total_creditos = is_numeric($califi['creditos']) ? $califi['creditos'] * $califi['total'] : 0;
                    $total_creditos_grupo += $total_creditos;
                @endphp
                {{ $total_creditos }}
            </td>
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="1"></td>
        @endforeach
        <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">{{ $total_creditos_grupo }}</td>
    </tr>
    <tr>
        <th colspan="2"></th><td colspan="15" style="border: 1px solid black; padding: 8px;text-align: right;font-family: 'Times New Roman', serif;font-size:12pt">Total De Créditos Aprobados</td>
        @foreach($com as $califi)
            <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">
                @php
                    $total_creditos_a = is_numeric($califi['creditos']) ? $califi['creditos'] * $califi['aprobados'] : 0;
                    $total_aprobados_grupo += $total_creditos_a;
                @endphp
                {{ $total_creditos_a }}
            </td>
        @endforeach
        <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="1"></td>
        <td style="border: 1px solid black; padding: 8px;text-align: center;font-family: 'Times New Roman', serif;font-size:12pt" colspan="5">{{ $total_aprobados_grupo }}</td>
    </tr>
    <!-- ... Resto de tu código ... -->

    </tbody>
</table>