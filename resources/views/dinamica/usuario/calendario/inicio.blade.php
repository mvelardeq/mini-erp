@php
    use Carbon\Carbon;
@endphp
@extends("theme.$theme.layout")
@section("script")
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.2/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.2/locales-all.js"></script>
<script src="{{asset('assets/pages/scripts/usuario/calendar/calendar.js')}}"></script>
@endsection
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.2/main.css">
@endsection

@section('contenido')

<div class="container-fluid">
    <div id="calendar">
        Calendario
    </div>
</div>

{{-- Modal calendario --}}
<div class="modal fade" id="modalEvent" tabindex="-1" role="dialog" aria-labelledby="modalProductopLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modalTitle"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0 m-0" id="modalDescription">

            </div>
            {{-- <div class="modal-footer">
            </div> --}}
        </div>
    </div>
</div>

@endsection

