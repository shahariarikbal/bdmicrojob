<ul class="sidebar navbar-nav">
    <li class="nav-item {{ Request::url() == url('/dashboard') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/dashboard') }}">
       <i class="fas fa-fw fa-home"></i>
       <span>Dashboard</span>
       </a>
    </li>
    <li class="nav-item {{ Request::url() == url('/my-forum') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/my-forum') }}">
        <i class="far fa-credit-card"></i>
        <span>My Forum</span>
        </a>
    </li>
    @if ($verification_requested==0)
    <li class="nav-item {{ Request::url() == url('/account/varify') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/account/varify') }}">
           <i class="fas fa-check"></i>
        <span>Verify Now</span>
        </a>
     </li>
     @elseif ($verification->status==2)
     <li class="nav-item {{ Request::url() == url('/account/varify') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/account/varify') }}">
           <i class="fas fa-check"></i>
        <span>Verify Now</span>
        </a>
     </li>
    @endif
    <li class="nav-item {{ Request::url() == url('/account/varify/history') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/account/varify/history') }}">
           <i class="fas fa-check"></i>
        <span>Verification History</span>
        </a>
     </li>
    <li class="nav-item {{ Request::url() == url('/post/job') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/post/job') }}">
         <i class="fas fa-plus-circle"></i>
       <span>Job Post</span>
       </a>
    </li>
    <li class="nav-item {{ Request::url() == url('/submitted/job/pending') ? 'active' : '' }}">
       <a class="nav-link" href="{{ url('/submitted/job/pending') }}">
         <i class="fas fa-check-circle"></i>
       <span class="">Pending-Job <span class="pending-job-bagde">{{ $submitted_pending_job }}</span></span>
       </a>
    </li>
    <li class="nav-item {{ Request::url() == url('/submitted/job/approved') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('/submitted/job/approved') }}">
        <i class="fas fa-check-circle"></i>
      <span>Approved-Job</span>
      </a>
   </li>
   <li class="nav-item {{ Request::url() == url('/submitted/job/rejected') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('/submitted/job/rejected') }}">
        <i class="fas fa-check-circle"></i>
      <span>Rejected-Job</span>
      </a>
   </li>
    <li class="nav-item {{ Request::url() == url('/my/post') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/my/post') }}">
        <i class="fas fa-tasks"></i>
        <span>My Post</span>
        </a>
    </li>
    <li class="nav-item {{ Request::url() == url('/my/favourite/task') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/my/favourite/task') }}">
         <i class="fas fa-tasks"></i>
        <span>Favourite Tasks</span>
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
    @if ($withdraw_requested==0)
    <li class="nav-item {{ Request::url() == url('/instant/withdraw') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/instant/withdraw') }}">
        <i class="far fa-credit-card"></i>
        <span>Withdraw</span>
        </a>
    </li>
    @elseif ($withdraw->is_approved != 0)
    <li class="nav-item {{ Request::url() == url('/instant/withdraw') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/instant/withdraw') }}">
        <i class="far fa-credit-card"></i>
        <span>Withdraw</span>
        </a>
    </li>
    @endif
    <li class="nav-item {{ Request::url() == url('/instant/deposit/history') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/instant/deposit/history') }}">
        <i class="far fa-credit-card"></i>
        <span>Deposit History</span>
        </a>
    </li>
    <li class="nav-item {{ Request::url() == url('/instant/withdraw/history') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/instant/withdraw/history') }}">
        <i class="far fa-credit-card"></i>
        <span>Withdraw History</span>
        </a>
    </li>
 </ul>
