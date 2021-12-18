<div class="sl-header">
    <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a>
        </div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i
                    class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name">{{ Auth::user()->username }}
                        {{-- <span class="hidden-md-down"> Doe</span> --}}
                    </span>
                    <img src="{{ asset(Auth::user()->image665x665) }}" class="wd-32 rounded-circle" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href="{{ route('editProfile', auth()->user()->id) }}"><i
                                    class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                        <li><a href="{{ route('password.change') }}"><i class="icon ion-ios-gear-outline"></i> Change
                                Password</a></li>
                        {{-- <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li> --}}
                        {{-- <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li> --}}
                        @if (auth()->user()->roles[0]->hasPermissionTo('can-create-post'))
                            <li><a href="{{ route('user.posts') }}"><i class="icon ion-ios-folder-outline"></i> My
                                    Posts</a>
                            </li>
                        @endif
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <i class="icon ion-power"></i> Sign Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
            <a id="btnRightMenu" href="" class="pos-relative">
                <i class="icon ion-ios-bell-outline"></i>
                <!-- start: if statement -->
                <span class="square-8 bg-danger"></span>
                <!-- end: if statement -->
            </a>
        </div><!-- navicon-right -->
    </div><!-- sl-header-right -->
</div>
