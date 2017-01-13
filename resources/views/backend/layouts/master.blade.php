<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('meta_author', 'PayMedia')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles-end')
        {{ Html::style(asset('css/bootstrap-datetimepicker.min.css')) }}
        {{ Html::style(asset('css/backend/bootstrap-toggle.min.css')) }}
        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
            {{ Html::style(elixir('css/backend-rtl.css')) }}
            {{ Html::style(elixir('css/rtl.css')) }}
        @else
            {{ Html::style(elixir('css/backend.css')) }}
        @endif

        @yield('after-styles-end')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        {{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
        {{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
        <![endif]-->
    </head>
    <body class="skin-{{ config('backend.theme') }} {{ config('backend.layout') }}">
        @include('includes.partials.logged-in-as')

        <div class="wrapper">
            @include('backend.includes.header')
            @include('backend.includes.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('page-header')

                    {{-- Change to Breadcrumbs::render() if you want it to error to remind you to create the breadcrumbs for the given route --}}
                    {!! Breadcrumbs::renderIfExists() !!}
                </section>

                <!-- Main content -->
                <section class="content">
                    @include('includes.partials.messages')
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            @include('backend.includes.footer')
        </div><!-- ./wrapper -->

        <!-- JavaScripts -->
        {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js') }}
        <script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery/jquery-2.1.4.min.js')}}"><\/script>')</script>
        {{ Html::script('js/vendor/bootstrap/bootstrap.min.js') }}
        {{ Html::script('js/vendor/bootstrap/bootstrap-datetimepicker.min.js') }}
        {{ Html::script('js/backend/bootstrap-toggle.min.js') }}

        @yield('before-scripts-end')
        {{ HTML::script(elixir('js/backend.js')) }}
        @yield('after-scripts-end')

    </body>
</html>

<script>
    {{--hide alert--}}
    $("#alertMasterError").hide();
    $("#alertAgentError").hide();
    //urlS
    {{--var kiosk_details_url ='{{ route('admin.kiosk.details') }}';--}}
    {{--var kiosk_denomination_url ='{{ route('admin.kiosk.denomination') }}';--}}
    {{--var kiosk_report_url ='{{ route('admin.kiosk.report') }}';--}}
    {{--var kiosk_inquiry_url ='{{ route('admin.kiosk.customer') }}';--}}
    {{--var kiosk_daily_url ='{{ route('admin.kiosk.daily') }}';--}}
    {{--var kiosk_unload_url ='{{ route('admin.kiosk.unload') }}';--}}
    {{--var kiosk_cash_url ='{{ route('admin.kiosk.cash') }}';--}}

    {{--var kiosk_terminal_url ='{{ route('admin.kiosk.terminal') }}';--}}
    {{--var kiosk_branch_url ='{{ route('admin.kiosk.branch') }}';--}}
    {{--var kiosk_unloadFrom_url ='{{ route('admin.kiosk.unloadFrom') }}';--}}
    {{--var kiosk_unloadTo_url ='{{ route('admin.kiosk.unloadTo') }}';--}}
</script>
