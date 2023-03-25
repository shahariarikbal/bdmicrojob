<ul class="sidebar navbar-nav{{ Route::is('dashboard') ? 'toggled' : '' }}">
    <li class="nav-item {{ Request::url() == url('admin/dashboard') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/admin/dashboard') }}">
       <i class="fas fa-fw fa-home"></i>
       <span>Home</span>
       </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/categories') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/categories') }}">
        <i class="fa fa-tasks"></i>
        <span>Categories</span>
        </a>
     </li>
    <li class="nav-item {{ Request::url() == url('admin/jobs') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/jobs') }}">
        <i class="fa fa-tasks"></i>
        <span>Jobs</span>
        </a>
     </li>
     <li class="nav-item {{ Request::url() == url('admin/advertisements') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/advertisements') }}">
        <i class="fa fa-tasks"></i>
        <span>Advertisements</span>
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
    <li class="nav-item {{ Request::url() == url('admin/deposit/request') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('admin/deposit/request') }}">
        <i class="fas fa-money-bill"></i>
       <span>Deposit Requests</span>
       </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/nid_verification/request') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/nid_verification/request') }}">
         <i class="fas fa-money-bill"></i>
        <span>NID Verification</span>
        </a>
     </li>
    <li class="nav-item {{ Request::url() == url('admin/help-support') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/help-support') }}">
         <i class="fas fa-money-bill"></i>
        <span>Help & Support</span>
        </a>
     </li>
    <li class="nav-item {{ Request::url() == url('admin/link') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/settings') }}">
         <i class="fas fa-cog"></i>
        <span>Settings</span>
        </a>
     </li>
 </ul>
