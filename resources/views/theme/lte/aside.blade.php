 <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/inicio" class="brand-link">
      <img src="{{asset("assets/$theme/dist/img/AdminLTELogo.png")}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ascensores Industriales</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-header">PRINCIPAL</li>

            @foreach ($menusComposer as $key => $item)
                @if ($item["menu_id"] != 0)
                    @break
                @endif

                @include("theme.$theme.menu-item", ["item" => $item])
            @endforeach
            <li class="nav-item {{getMenuOpen('usuario')}}">
                <a href="javascript:;" class="nav-link {{getMenuActive('usuario')}}">
                  <i class="nav-icon fas fa-user"></i>
                    <p>
                      Usuario
                      <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link {{getMenuActivo('usuario/perfil')}}">
                            {{-- {{getMenuActivo($item["url"])}} --}}
                        <i class="nav-icon fas fa-address-card"></i> <p>Perfil</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('usuario_ot', ['id' => auth()->user()->id])}}" class="nav-link {{getMenuActivo('usuario/ot')}}">
                            {{-- {{getMenuActivo($item["url"])}} --}}
                        <i class="nav-icon fas fa-file-contract"></i> <p>OT</p>
                        </a>
                    </li>
                    @if (session()->get('rol_nombre') == 'supervisor')
                        <li class="nav-item">
                            <a href="{{route('usuario_notificaciones', ['id' => auth()->user()->id])}}" class="nav-link {{getMenuActivo('usuario/notificaciones')}}">
                                {{-- {{getMenuActivo($item["url"])}} --}}
                            <i class="nav-icon fas fa-bell"></i> <p>Notificaciones</p>
                            </a>
                        </li>
                    @endif

                </ul>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
      <a href="#" class="btn btn-link"><i class="fas fa-cogs"></i></a>
      <a href="#" class="btn btn-secondary hide-on-collapse pos-right">Help</a>
    </div>
    <!-- /.sidebar-custom -->
  </aside>
