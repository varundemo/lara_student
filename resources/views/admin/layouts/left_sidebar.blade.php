  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{url('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{url('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p class="text">Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Student Section
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
          <!-- </li> -->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('addstudent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('liststudent') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Student</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Faculty
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('/faculty_type') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Faculty Types</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('facultytypelist') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faculty Type List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('addfaculty') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Faculty</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('listfaculty') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faculty List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Class
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('/add_sec') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('/list_sec') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Section</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('/addclass') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Class</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('listclass') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Class</p>
                </a>
              </li>
              
              
             
            </ul>
          </li>
            <li>
                  <a href="{{ URL::to('/login') }}" class="nav-link">
                  <i class="nav-icon fas fa-tree"></i>
                  <p>
                    Login
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
              </li>
          
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>