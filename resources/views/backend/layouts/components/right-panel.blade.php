@inject('notifications', 'App\Http\Controllers\NotificationController')
<div class="sl-sideright">
    <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications
                ({{ $notifications->contactUs()['count'] }})</a>
        </li>
    </ul><!-- sidebar-tabs -->

    <!-- Tab panes -->

    <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
            <div class="media-list">
                <!-- loop starts here -->
                @foreach ($notifications->contactUs()['display'] as $notify)
                    <a href="" class="media-list-link">
                        <div class="media">
                            {{-- <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt=""> --}}
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">{{ $notify->name }}</p>
                                <span
                                    class="d-block tx-11 tx-gray-500">{{ $notify->created_at->diffForHumans() }}</span>
                                <p class="tx-13 mg-t-10 mg-b-0">{{ $notify->message }}</p>
                            </div>
                        </div><!-- media -->
                    </a>
                    <!-- loop ends here -->
                @endforeach
            </div><!-- media-list -->
            <div class="pd-15">
                <a href=""
                    class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View
                    More Messages</a>
            </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
            <div class="media-list">
                <!-- loop starts here -->
                @foreach ($notifications->contactUs()['display'] as $notify)
                    <a href="" class="media-list-link">
                        <div class="media">
                            {{-- <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt=""> --}}
                            <div class="media-body">
                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">{{ $notify->name }}</p>
                                <span
                                    class="d-block tx-11 tx-gray-500">{{ $notify->created_at->diffForHumans() }}</span>
                                <p class="tx-13 mg-t-10 mg-b-0">{{ $notify->message }}</p>
                            </div>
                        </div><!-- media -->
                    </a>
                    <!-- loop ends here -->
                @endforeach
            </div><!-- media-list -->
            <div class="pd-15">
                <a href=""
                    class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View
                    More Notifications</a>
            </div>
        </div><!-- #notifications -->

    </div><!-- tab-content -->
</div>
