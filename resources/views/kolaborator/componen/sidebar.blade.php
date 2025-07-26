  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('user/imgs/logoboonda.png') }}" alt="AdminLTE Logo" class="brand-image " >
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{route('kolaborator.home')}}" class="nav-link {{ request()->is('kolaborator/home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('kolaborator.event.view')}}" class="nav-link {{ request()->is('kolaborator/event/*') ? 'active' : '' }}">
              <i class="fas fa-calendar-alt"></i>
              <p>
                Event
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('kolaborator.ulasan.view')}}" class="nav-link {{ request()->is('kolaborator/ulasan/*') ? 'active' : '' }}">
              <i class="fas fa-comment-dots"></i>
              <p>
                Ulasan
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{route('admin.logout')}}" class= "nav-link bg-danger">
             <i class="fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>