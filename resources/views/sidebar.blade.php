<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/images/doctor.jpeg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-flex justify-content-center">Patient Management System</a>
        </div>
      </div>
     <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
        <div class="info">
          <a href="#" class="d-flex "> Hello {{ Session::get('name') }} ! </a>
        </div>
      </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         @if(session('role_id') === 1)
          <li class="nav-item">
            <a href="/admindashboard" class="nav-link navbar-brand"> 
            
              <i class="fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          @endif
          @if(session('role_id') === 2)
          <li class="nav-item">
            <a href="/doctordashboard" class="nav-link navbar-brand"> 
            
              <i class="fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          @endif
          @if(session('role_id') === 3)
          <li class="nav-item">
            <a href="/staffdashboard" class="nav-link navbar-brand"> 
            
              <i class="fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          @endif
<!--
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> 
-->
          @if(session('role_id') === 1)
          <li class="nav-item">
            <a href="/doctor" class="nav-link navbar-brand">
              <i class="nav-icon fas fa-user-md"></i>
              <p>
                Doctor
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/staff" class="nav-link navbar-brand">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Staff
                
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="/patient" class="nav-link navbar-brand">
              <i class="nav-icon fas fa-wheelchair"></i>
              <p>
                Patient
                
              </p>
            </a>
          </li>
		  @if(Session::get('name') && Session::get('email'))
          <li class="nav-item">
            <a href="/profile" class="nav-link navbar-brand">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Profile
                
              </p>
            </a>
          </li>
		  @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>