<ul class="sidebar navbar-nav{{ Route::is('dashboard') ? 'toggled' : '' }}">
    <li class="nav-item {{ Request::url() == url('admin/dashboard') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/admin/dashboard') }}">
       <i class="fas fa-fw fa-home"></i>
       <span>Home</span>
       </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/link') ? 'active' : '' }} ">
       <a class="nav-link" href="{{ url('/admin/users') }}">
          <i class="fas fa-solid fa-dollar-sign"></i>
       <span>Users</span>
       </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/video/index') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/admin/video/index') }}">
          <i class="fab fa-youtube"></i>
       <span>Videos</span>
       </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/link') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/admin/membership/index') }}">
          <i class="fas fa-qrcode"></i>
       <span>Memberships</span>
       </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/link') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/admin/withdraw/request') }}">
        <i class="fas fa-money-bill"></i>
       <span>Payments request</span>
       </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/link') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/settings') }}">
         <i class="fas fa-cog"></i>
        <span>Settings</span>
        </a>
     </li>
 </ul>
