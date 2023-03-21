<ul class="sidebar navbar-nav">
   <li class="nav-item {{ Request::url() == url('/dashboard') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/dashboard') }}">
       <i class="fas fa-fw fa-home"></i>
       <span>Dashboard</span>
       </a>
   </li>
   <li class="nav-item {{ Request::url() == url('/account/varify') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/account/varify') }}">
          <i class="fas fa-check"></i>
       <span>Verify Now</span>
       </a>
   </li>
   <li class="nav-item {{ Request::url() == url('/post/job') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/post/job') }}">
          <i class="fas fa-plus-circle"></i>
       <span>Job Post</span>
       </a>
   </li>
   <li class="nav-item {{ Request::url() == url('/my/task') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/my/task') }}">
        <i class="fas fa-tasks"></i>
       <span>My Task</span>
       </a>
   </li>
   <li class="nav-item {{ Request::url() == url('/accepted/task') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/accepted/task') }}">
        <i class="fas fa-check-double"></i>
       <span>Accepted Task</span>
       </a>
   </li>
   <li class="nav-item {{ Request::url() == url('/instant/deposit') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/instant/deposit') }}">
        <i class="far fa-credit-card"></i>
       <span>Deposit</span>
       </a>
   </li>
   <li class="nav-item {{ Request::url() == url('/link') ? 'active' : '' }}">
       <a class="nav-link" href="history-page.html">
        <i class="fas fa-money-bill"></i>
       <span>Payments</span>
       </a>
   </li>
 </ul>
