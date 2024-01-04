<!-- Sidebar -->
<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ url('/vendor/azzara') }}/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
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
        </div>
    </div>
</div>
<!-- End Sidebar -->