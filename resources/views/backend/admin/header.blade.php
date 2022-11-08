 <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-danger navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
        <!-- <h4 style="text-align: center; margin:0 auto; color: white;">Welcome Mazid Cavel TV Connection</h4> -->
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
                @csrf
          <a class="nav-link text-light" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                          this.closest('form').submit();">
                         <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
          </a>
        </form>
      </li>
    </ul>
</nav>
<!-- /.navbar -->