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
        <span>All Jobs</span>
        </a>
     </li>
     <li class="nav-item {{ Request::url() == url('admin/pending/jobs') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/pending/jobs') }}">
        <i class="fa fa-tasks"></i>
        <span>Pending Jobs</span>
        </a>
     </li>
     <li class="nav-item {{ Request::url() == url('admin/pending-task') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/pending-task') }}">
        <i class="fa fa-tasks"></i>
        <span>Pending Task</span>
        </a>
     </li>
     <li class="nav-item {{ Request::url() == url('admin/rejected-task') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/rejected-task') }}">
        <i class="fa fa-tasks"></i>
        <span>Rejected Task</span>
        </a>
     </li>
     <li class="nav-item {{ Request::url() == url('admin/all-forum') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/all-forum') }}">
        <i class="fa fa-tasks"></i>
        <span>Forum</span>
        </a>
     </li>
     <li class="nav-item {{ Request::url() == url('admin/all-blog') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/all-blog') }}">
        <i class="fa fa-tasks"></i>
        <span>Blog</span>
        </a>
     </li>
     {{--  <li class="nav-item {{ Request::url() == url('admin/advertisements') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/advertisements') }}">
        <i class="fa fa-tasks"></i>
        <span>Advertisements</span>
        </a>
     </li>  --}}
     <li class="nav-item {{ Request::url() == url('admin/all-users') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('/admin/all-users') }}">
           <i class="fas fa-solid fa-dollar-sign"></i>
        <span>Users</span>
        </a>
     </li>
    <li class="nav-item {{ Request::url() == url('admin/users') ? 'active' : '' }} ">
       <a class="nav-link" href="{{ url('/admin/users') }}">
          <i class="fas fa-solid fa-dollar-sign"></i>
       <span>User(Tips)</span>
       </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/inactive/users/list') ? 'active' : '' }} ">
        <a class="nav-link" href="{{ url('/admin/inactive/users/list') }}">
           <i class="fas fa-solid fa-dollar-sign"></i>
        <span>InActive Users</span>
        </a>
     </li>
    {{--  <li class="nav-item {{ Request::url() == url('admin/video/index') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/admin/video/index') }}">
          <i class="fab fa-youtube"></i>
       <span>Videos</span>
       </a>
    </li>  --}}
    {{--  <li class="nav-item {{ Request::url() == url('admin/link') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/admin/membership/index') }}">
          <i class="fas fa-qrcode"></i>
       <span>Memberships</span>
       </a>
    </li>  --}}
    <li class="nav-item {{ Request::url() == url('admin/deposit/request') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('admin/deposit/request') }}">
        <i class="fas fa-money-bill"></i>
       <span>Deposit Requests</span>
       </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/withdraw/request') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/withdraw/request') }}">
         <i class="fas fa-money-bill"></i>
        <span>Withdraw Requests</span>
        </a>
     </li>
    <li class="nav-item {{ Request::url() == url('admin/nid_verification/request') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('admin/nid_verification/request') }}">
         <i class="fas fa-money-bill"></i>
        <span>NID Verification</span>
        </a>
     </li>
     <li class="nav-item {{ Request::url() == url('admin/contacts') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/contacts') }}">
         <i class="fas fa-money-bill"></i>
        <span>Contacts</span>
        </a>
     </li>
    {{--  <li class="nav-item {{ Request::url() == url('admin/help-support') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/help-support') }}">
         <i class="fas fa-money-bill"></i>
        <span>Help & Support</span>
        </a>
     </li>  --}}
     <li class="nav-item {{ Request::url() == url('admin/homepage') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/homepage') }}">
         <i class="fas fa-cog"></i>
        <span>Home Page</span>
        </a>
     </li>
    <li class="nav-item {{ Request::url() == url('admin/faqs') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/faqs') }}">
            <i class="fas fa-cog"></i>
            <span>FAQ</span>
        </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/about-us') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/about-us') }}">
            <i class="fas fa-cog"></i>
            <span>About Us</span>
        </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/term-condition') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/term-condition') }}">
            <i class="fas fa-cog"></i>
            <span>Terms & Conditions</span>
        </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/privacy-policy') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/privacy-policy') }}">
            <i class="fas fa-cog"></i>
            <span>Privacy Policy</span>
        </a>
    </li>
    <li class="nav-item {{ Request::url() == url('admin/marque-text') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/marque-text') }}">
         <i class="fas fa-cog"></i>
        <span>Marquee Text</span>
        </a>
     </li>
    <li class="nav-item {{ Request::url() == url('admin/settings') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/settings') }}">
         <i class="fas fa-cog"></i>
        <span>Settings</span>
        </a>
     </li>
 </ul>
