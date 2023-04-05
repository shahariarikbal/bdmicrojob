<nav class="navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
    <div class="user-navbar-items-wrap">
        <div class="header-left-side">
            <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
               <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand mr-1" href="#">
                <img src="{{ asset('/frontend/') }}/assets/logo/bd jobs.png" />
            </a>
        </div>
        <div class="text-center earning-btn-outer">
            <h4 class="user-dashb-earning-btn">Earning: {{ $total_income->total_income }}tk</h4>
            <h4 class="user-dashb-deposit-btn">Deposit: {{ $total_deposit->total_deposit }}tk</h4>
        </div>
        <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
            {{--  Notification Icon....  --}}
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger">{{ $user_notification_count }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    @foreach ($user_notifications as $user_notification )
                    @if ($user_notification->notifiable_type=='App\Models\NidVerification')
                    <a class="dropdown-item" href="{{ url('/nid_notification_seen/'.$user_notification->id) }}"><i class="fas fa-fw fa-star "></i> &nbsp; {{ $user_notification->message }}</a>
                    @elseif ($user_notification->notifiable_type=='App\Models\Deposit')
                    <a class="dropdown-item" href="{{ url('/deposit_notification_seen/'.$user_notification->id) }}"><i class="fas fa-fw fa-star "></i> &nbsp; {{ $user_notification->message }}</a>
                    @elseif ($user_notification->notifiable_type=='App\Models\Withdraw')
                    <a class="dropdown-item" href="{{ url('/withdraw_notification_seen/'.$user_notification->id) }}"><i class="fas fa-fw fa-star "></i> &nbsp; {{ $user_notification->message }}</a>
                    @elseif ($user_notification->notifiable_type=='App\Models\Tip')
                    <a class="dropdown-item" href="{{ url('/tip_notification_seen/'.$user_notification->id) }}"><i class="fas fa-fw fa-star "></i> &nbsp; {{ $user_notification->message }}</a>
                    @endif
                    @endforeach
                </div>
            </li>
            {{--  Notification Icon....  --}}
            <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
                <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img alt="Avatar" src="{{asset('backend')}}/img/user-avater.png" />
                    {{ auth()->user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ url('/profile/update') }}"><i class="fas fa-fw fa-user-circle"></i> &nbsp; My Account</a>
                    {{--  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-video"></i> &nbsp; Subscriptions</a>  --}}
                    {{-- <a class="dropdown-item" href="#"><i class="fas fa-fw fa-cog"></i> &nbsp; Settings</a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> &nbsp; Logout</a>

                </div>
            </li>
        </ul>
    </div>
</nav>
