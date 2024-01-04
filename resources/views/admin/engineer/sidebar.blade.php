<!-- Sidebar -->
<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ url('/vendor/azzara') }}/img/profileku.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">
                                @if(Auth::user()->isEngineer())
                                    Engineer
                                @elseif(Auth::user()->isMitra())
                                    Mitra
                                @else
                                    Administrator
                                @endif
                            </span>
                        </span>
                    </a>
                </div>
                
            </div>
            <ul class="nav">
                <li class="nav-item {{url()->current() == route('sentrals.dashboard')? 'active' : '' }}">
                    <a href="{{ route('sentrals.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('company_data.index')? 'active' : ''  }}">
                    <a href="{{ route('company_data.index') }}">
                        <i class="fas fa-edit"></i>
                        <p>Company Data</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('sentrals.index')? 'active' : '' }}">
                    <a href="{{ route('sentrals.index') }}">
                        <i class="fas fa-table"></i>
                        <p>Sentral</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('users.index')? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-table"></i>
                        <p>User Management</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('engineers.index')? 'active' : ''  }}">
                    <a href="{{ route('engineers.index') }}">
                        <i class="fas fa-edit"></i>
                        <p>Approval Order Key</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('transactions.index')? 'active' : ''  }}">
                    <a href="{{ route('transactions.index') }}">
                        <i class="fas fa-edit"></i>
                        <p>Transaction</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('kode.index')? 'active' : ''  }}">
                    <a href="{{ route('kode.index') }}">
                        <i class="fas fa-edit"></i>
                        <p>Code Update</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('gkuncis.index')? 'active' : ''  }}">
                    <a href="{{ route('gkuncis.index') }}">
                        <i class="fas fa-edit"></i>
                        <p>Kunci Detail</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>