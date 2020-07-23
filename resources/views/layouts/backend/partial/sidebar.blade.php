<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info" class="img-fluid" style="background-image: url('https://lyrictheatre.co.uk/wp-content/uploads/2018/12/Dark-of-the-Moon-Event.png');background-size: cover">
        
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
        <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                <li><a href="">
                    <i class="material-icons">settings</i>Settings</a></li>
                    
                    <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons">input</i>Sign Out
                                    </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
           

            @if (Request::is('admin*'))
                {{-- <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li> --}}


                <li class="{{ Request::is('admin/employee*') ? 'active' : '' }}">
                    <a href="{{ route('admin.employee.index') }}">
                        <i class="material-icons">category</i>
                        <span>Employees</span>
                    </a>
                </li>

                <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}">
                        <i class="material-icons">apps</i>
                        <span>Category</span>
                    </a>
                </li>
             
               

                <li class="header">System</li>
              
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                             document.getElementById('logout-form').submit();">
                                    <i class="material-icons">input</i><span>Sign Out</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                    </form>
                </li>

            @endif


            @if (Request::is('subadmin*'))
            {{-- <li class="{{ Request::is('subadmin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('subadmin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li> --}}

            <li class="{{ Request::is('subadmin/employee*') ? 'active' : '' }}">
                <a href="{{ route('subadmin.employee.index') }}">
                    <i class="material-icons">category</i>
                    <span>Employees</span>
                </a>
            </li>

            
          
            <li class="header">System</li>
            
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                         document.getElementById('logout-form').submit();">
                                <i class="material-icons">input</i><span>Sign Out</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                </form>
            </li>
            @endif


            
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
   
    <!-- #Footer -->
</aside>