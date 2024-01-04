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
                <li class="nav-item {{url()->current() == route('mitras.dashboard')? 'active' : '' }}">
                    <a href="{{ route('mitras.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('mitras.index')? 'active' : '' }}">
                    <a href="{{ route('mitras.index') }}">
                        <i class="fas fa-edit"></i>
                        <p>Order Key</p>
                    </a>
                </li>
                <li class="nav-item {{url()->current() == route('sentrals.index_sentral')? 'active' : '' }}">
                    <a href="{{ route('sentrals.index_sentral') }}">
                        <i class="fas fa-table"></i>
                        <p>Sentral</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>