<div class="sl-logo"><a href="{{ url('home') }}"><i class="icon ion-android-star-outline"></i> BLOG</a></div>
<div class="sl-sideleft">
    <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
            <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
    </div><!-- input-group -->

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
        <a href="{{ url('/home') }}" class="sl-menu-link active">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        @hasanyrole('Super Admin|Admin')
            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                    <span class="menu-item-label">Pages</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('back-roles.index') }}" class="nav-link">Roles</a>
                </li>

                <li class="nav-item"><a href="{{ route('back-categories.index') }}"
                        class="nav-link">Categories</a>
                </li>

                <li class="nav-item"><a href="{{ route('back-users.index') }}" class="nav-link">Users</a></li>

            </ul>
        @endhasanyrole

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                <span class="menu-item-label">Posts</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('posts.create') }}" class="nav-link">Create Post</a>
            </li>
            <li class="nav-item"><a href="{{ route('posts.index') }}" class="nav-link">View Posts</a></li>

        </ul>
    </div><!-- sl-sideleft-menu -->

    <br>
</div>
