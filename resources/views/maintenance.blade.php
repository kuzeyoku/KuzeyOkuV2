<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="{{ config('setting.general.description') }}">
    <meta name="keywords" content="{{ config('setting.general.keywords') }}">
    <meta name="robots" content="noindex, nofollow">
    <title>{{ config('setting.general.title') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ themeAsset('admin', 'img/favicon.png') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/animate.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('admin', 'css/style.css') }}">
</head>

<body class="error-page">
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>
    <div class="main-wrapper">
        <div class="comming-soon-pg w-100">
            <div class="coming-soon-box">
                <h1>@lang('front/maintenance.txt1')</h1>
                <p>{{ config('setting.maintenance.message') }}</p>
                <ul class="coming-soon-timer">
                    <li><span class="days"></span>@lang('front/maintenance.day')</li>
                    <li class="seperate-dot">:</li>
                    <li><span class="hours"></span>@lang('front/maintenance.hour')</li>
                    <li class="seperate-dot">:</li>
                    <li><span class="minutes"></span>@lang('front/maintenance.minute')</li>
                    <li class="seperate-dot">:</li>
                    <li><span class="seconds"></span>@lang('front/maintenance.second')</li>
                </ul>
                <h1>@lang('front/maintenance.txt2')</h1>
            </div>
        </div>
    </div>

    <div class="customizer-links" id="setdata">
        <ul class="sticky-sidebar">
            <li class="sidebar-icons">
                <a href="#" class="navigation-add" data-bs-toggle="tooltip" data-bs-placement="left"
                    data-bs-original-title="Theme">
                    <i data-feather="settings" class="feather-five"></i>
                </a>
            </li>
        </ul>
    </div>

    <script src="{{ themeAsset('admin', 'js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/feather.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ themeAsset('admin', 'js/script.js') }}"></script>
    <script>
        if ($(".comming-soon-pg").length > 0) {
            var date = '{{ $date }}';
            new setCountDown(date);
        }
    </script>
</body>

</html>