<div class="header">
    <div class="header-left active">
        <a href="{{ route('admin.index') }}" class="logo logo-normal">
            <img src="{{ themeAsset('admin', 'img/logo.png') }}" alt="">
        </a>
        <a href="{{ route('admin.index') }}" class="logo logo-white">
            <img src="{{ themeAsset('admin', 'img/logo-white.png') }}" alt="">
        </a>
        <a href="{{ route('admin.index') }}" class="logo-small">
            <img src="{{ themeAsset('admin', 'img/logo-small.png') }}" alt="">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
            <i data-feather="chevrons-left" class="feather-16"></i>
        </a>
    </div>
    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    <ul class="nav user-menu">
        <li class="nav-item nav-searchinputs">
        </li>
        <li class="nav-item nav-item-box">
            <a href="javascript:void(0);" id="btnFullscreen">
                <i data-feather="maximize"></i>
            </a>
        </li>
        <li class="nav-item dropdown nav-item-box">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i data-feather="mail"></i><span class="badge rounded-pill">{{ $messages->count() }}</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">@lang('admin/general.message')</span>
                    <a href="javascript:void(0)" class="clear-noti"> @lang('admin/general.all_delete') </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        @forelse ($messages as $message)
                            <li class="notification-message">
                                <a href="{{ route('admin.message.show', $message) }}">
                                    <div class="media d-flex">
                                        <span class="avatar flex-shrink-0">
                                            <img alt="" src="{{ themeAsset('admin', 'img/avatar.png') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                {{ $message->name }}
                                                <br>
                                                <span class="noti-title">{{ $message->subject }}</span>
                                            </p>
                                            <p class="noti-time"><span
                                                    class="notification-time">{{ $message->created_at->diffForHumans() }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="notification-message">
                                <div class="alert alert-info">@lang('admin/general.no_messages')</div>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="{{ route('admin.message.index') }}">@lang('admin/general.to_messages')</a>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown nav-item-box">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i data-feather="message-square"></i><span class="badge rounded-pill">{{ $comments->count() }}</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">@lang('admin/general.comments')</span>
                    <a href="javascript:void(0)" class="clear-noti"> @lang('admin/general.all_delete') </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        @forelse ($comments as $comment)
                            <li class="notification-message">
                                <a href="{{ route('admin.blog.comments') }}">
                                    <div class="media d-flex">
                                        <span class="avatar flex-shrink-0">
                                            <img alt="" src="{{ themeAsset('admin', 'img/avatar.png') }}">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                {{ $comment->name }}
                                                <br>
                                                <span class="noti-title">{{ $comment->post->title }}</span>
                                                @lang('admin/general.commented_on')
                                            </p>
                                            <p class="noti-time"><span
                                                    class="notification-time">{{ $comment->created_at->diffForHumans() }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="notification-message">
                                <div class="alert alert-info">@lang('admin/general.no_comments')</div>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="{{ route('admin.blog.comments') }}">@lang('admin/general.to_comments')</a>
                </div>
            </div>
        </li>

        <li class="nav-item nav-item-box">
            <a href="{{ route('home') }}" target="_blank"><i data-feather="link"></i></a>
        </li>
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-info">
                    <span class="user-letter">
                        <img src="{{ themeAsset('admin', 'img/avatar.png') }}" alt="" class="img-fluid">
                    </span>
                    <span class="user-detail">
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <span class="user-role">{{ auth()->user()->role->title() }}</span>
                    </span>
                </span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img"><img src="{{ themeAsset('admin', 'img/avatar.png') }}"
                                alt="">
                            <span class="status online"></span></span>
                        <div class="profilesets">
                            <h6>{{ auth()->user()->name }}</h6>
                            <h5>{{ auth()->user()->role->title() }}</h5>
                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item logout pb-0" href="{{ route('admin.auth.logout') }}"><img
                            src="{{ themeAsset('admin', 'img/icons/log-out.svg') }}" class="me-2"
                            alt="img">@lang('admin/auth.logout')</a>
                </div>
            </div>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('admin.auth.logout') }}">@lang('admin/auth.logout')</a>
        </div>
    </div>
</div>
