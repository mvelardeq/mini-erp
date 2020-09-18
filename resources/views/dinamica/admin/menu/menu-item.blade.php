@if ($item["submenu"] == [])
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <a href="{{route("editar_menu", ['id' => $item["id"]])}}">{{$item["nombre"] . " | Url -> " . $item["url"]}} Icono -> <i style="font-size:15px;" class="fas fa-{{isset($item["icono"]) ? $item["icono"] : ""}}"></i></a>
        <a href="{{route('eliminar_menu', ['id' => $item["id"]])}}" class="eliminar-menu float-right tooltipsC" title="Eliminar este menú"><i class="text-danger fas fa-trash"></i></a>
    </div>
</li>
@else
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <a href="{{route("editar_menu", ['id' => $item["id"]])}}">{{ $item["nombre"] . " | Url -> " . $item["url"]}} Icono -> <i style="font-size:15px;" class="fas fa-{{isset($item["icono"]) ? $item["icono"] : ""}}"></i></a>
        <a href="{{route('eliminar_menu', ['id' => $item["id"]])}}" class="eliminar-menu float-right tooltipsC" title="Eliminar este menú"><i class="text-danger fas fa-trash"></i></a>
    </div>
    <ol class="dd-list">
        @foreach ($item["submenu"] as $submenu)
        @include("dinamica.admin.menu.menu-item",["item" => $submenu])
        @endforeach
    </ol>
</li>
@endif
