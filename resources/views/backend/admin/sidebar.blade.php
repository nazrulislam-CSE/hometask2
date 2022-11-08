<style type="text/css">
  .user-panel .info {
    display: inline-block;
    padding: 5px 5px 5px 51px;
  }
  [class*=sidebar-dark-] .sidebar a {
    color: white;
  }

  [class*=sidebar-dark] .user-panel {
    border-bottom: 1px solid #fff;
  }
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
    color: #fff;
  }
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
    background-color: #7c10f2ba;
    color: #f4f6f9;
    border-radius: 10px;
}
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar_common">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><span>Hellow! {{ Auth::user()->name }}</span></a></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item menu-open ">
              <a href="{{ route('admin.dashboard') }}" class="nav-link {{(request()->route()->getName()=='admin.dashboard')?'active':''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</i>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link
              {{(request()->route()->getName()=='product.index')?'active':''}}
              {{(request()->route()->getName()=='product.create')?'active':''}}
              {{(request()->route()->getName()=='product.edit')?'active':''}}
              ">
                  <i class="nav-icon fa fa-user"></i>
                  <p>Product
                    <i class="right fas fa-angle-right"></i>

                  </p>
              </a>
              <ul class="nav nav-treeview" style="background-color: #4975d6; border-radius:10px;">
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage Product <span class="badge badge-danger right">{{ DB::table('products')->count() }}</span></p>
                    </a>
                </li>
              </ul>
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                      @csrf
                <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                this.closest('form').submit();">
                               <i class="nav-icon fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}
                </a>
              </form>
            </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
