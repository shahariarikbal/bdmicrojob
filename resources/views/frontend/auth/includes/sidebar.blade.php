<ul class="sidebar navbar-nav toggled">
   <li class="nav-item {{ Request::url() == url('/dashboard') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/dashboard') }}">
       <i class="fas fa-fw fa-home"></i>
       <span>Dashboard</span>
       </a>
   </li>
   <li class="nav-item">
       <a class="nav-link" href="#">
          <i class="fas fa-solid fa-dollar-sign"></i>
       <span>Earnings</span>
       </a>
   </li>
   <li class="nav-item {{ Request::url() == url('/video-ads') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('video-ads') }}">
          <i class="fab fa-youtube"></i>
       <span>Video ads</span>
       </a>
   </li>
   <li class="nav-item {{ Request::url() == url('/my-code') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('my-code') }}">
          <i class="fas fa-qrcode"></i>
       <span>My Code</span>
       </a>
   </li>
   <li class="nav-item {{ Request::url() == url('/link') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/user/membership') }}">
        <i class="fas fa-desktop"></i>
       <span>Membership</span>
       </a>
   </li>
   <li class="nav-item {{ Request::url() == url('/link') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/user/settings') }}">
        <i class="fas fa-cog"></i>
       <span>Settings</span>
       </a>
   </li>
   <li class="nav-item {{ Request::url() == url('/link') ? 'active' : '' }}">
       <a class="nav-link" href="history-page.html">
        <i class="fas fa-money-bill"></i>
       <span>Payments</span>
       </a>
   </li>
 </ul>
