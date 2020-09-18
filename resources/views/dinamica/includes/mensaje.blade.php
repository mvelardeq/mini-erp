@if (session('mensaje'))
    {{-- <div class="alert alert-success alert-dismissible"> --}}
    <div class="alert alert-success alert-dismissible" data-auto-dismiss="3000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Mensaje Sistema biblioteca</h5>
        <ul>
            <li>{{ session('mensaje') }}</li>
        </ul>
    </div>
@endif
