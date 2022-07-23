 <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/inicio" class="brand-link">
      {{-- <img src="{{asset("assets/$theme/dist/img/AdminLTELogo.png")}}" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <img src="{{asset("assets/sb/assets/img/logo2png.png")}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Company Name</span>
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
            {{-- {{dd($menusComposer)}} --}}
            @foreach ($menusComposer as $key => $item)
                @if ($item["menu_id"] != 0)
                    @break
                @endif

                @include("theme.$theme.menu-item", ["item" => $item])
            @endforeach

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
