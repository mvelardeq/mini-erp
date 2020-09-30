@if ($item["submenu"] == [])
    <li class="nav-item">
        <a href="{{url($item['url'])}}" class="nav-link {{getMenuActivo($item["url"])}}">
            {{-- {{getMenuActivo($item["url"])}} --}}
        <i class="nav-icon fas fa-{{$item["icono"]}}"></i> <p>{{$item["nombre"]}}</p>
        </a>
    </li>
@else
    <li class="nav-item {{getMenuOpen($item["nombre"])}}">
        <a href="javascript:;" class="nav-link {{getMenuActive($item["nombre"])}}">
          <i class="nav-icon fas fa-{{$item["icono"]}}"></i>
            <p>
              {{$item["nombre"]}}
              <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @foreach ($item["submenu"] as $submenu)
                @include("theme.$theme.menu-item", ["item" => $submenu])
            @endforeach
        </ul>
    </li>
@endif
