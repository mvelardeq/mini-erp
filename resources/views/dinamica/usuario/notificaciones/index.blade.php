@php
    use Carbon\Carbon;
@endphp
@extends("theme.$theme.layout")
@section('titulo')
Ot
@endsection

@section("script")
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('dinamica.includes.mensaje')
        <div class="card card-outline card-info">
            <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                    @foreach ($ots_supervisor as $ot_supervisor)
                        <tbody>
                            <tr>
                                <td>
                                <div class="icheck-primary">
                                    <input type="checkbox" value="" id="check1">
                                    <label for="check1"></label>
                                </div>
                                </td>
                                <td class="mailbox-star"><a href="#">{{$ot_supervisor->trabajador->primer_nombre.' '.$ot_supervisor->trabajador->primer_apellido}}</a></td>
                                <td class="mailbox-name">{{Carbon::parse($ot_supervisor->fecha)->diffForHumans()}}</td>
                                <td class="mailbox-subject">
                                    @foreach ($ot_supervisor->actividades as $ot_supervisor->actividad)
                                        {{$ot_supervisor->actividad->nombre.': '.$ot_supervisor->actividad->pivot->horas.' hrs'}}<br>
                                    @endforeach
                                </td>
                                {{-- {{dd($ot_supervisor->actividades[0]->pivot->horas)}} --}}
                                <td class="mailbox-attachment"></td>
                                <td class="mailbox-date">5 mins ago</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
