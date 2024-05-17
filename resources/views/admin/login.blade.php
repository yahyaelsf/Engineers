<!DOCTYPE html>
<html lang="en" dir="rtl" direction="rtl" style="direction: rtl">


<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">


    <link href="{{ asset('dashboard-assets/css/pages/login/login-3.rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard-assets/plugins/global/plugins.rtl.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('dashboard-assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('dashboard-assets/css/skins/header/base/light.rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard-assets/css/skins/header/menu/light.rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard-assets/css/skins/brand/dark.rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('dashboard-assets/css/skins/aside/dark.rtl.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.png') }}"/>
</head>


<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">


<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
             style="background-image: url(dashboard-assets/media/bg/bg-3.jpg);">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        {{-- <a href="#">
                            <img src="{{ asset('dashboard-assets/media/logos/logo.svg') }}" width="300px">
                        </a> --}}
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">لوحة التحكم | تسجيل الدخول</h3>
                        </div>

                        <form class="kt-form" method="post" action="{{ route('admin.post_login') }}">

                            @if($errors->all())
                                <div class="alert alert-danger d-block">

                                    <div>
                                        <h5>{{  __('alerts.validation_errors', ['count' =>  count($errors)]) }}</h5>
                                    </div>

                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(isset($loginError))
                                <div class="alert alert-danger">
                                    {{ $loginError }}
                                </div>
                            @endif


                            @csrf
                            <input type="hidden" name="s_timezone" id="user-timezone">

                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="@lang('general.email')"
                                       name="s_email" autocomplete="off">
                            </div>
                            <div class="input-group">
                                <input class="form-control" type="password" placeholder="@lang('general.password')"
                                       name="s_password">
                            </div>
                            <div class="kt-login__actions">
                                <button id="kt_login_signin_submit" class="btn btn-block btn-success">تسجيل الدخول
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
</script>


<script src="{{ asset('dashboard-assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('dashboard-assets/js/scripts.bundle.js') }}" type="text/javascript"></script>

</body>
</html>
