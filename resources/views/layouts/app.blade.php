<!DOCTYPE html>
<html lang="zxx" class="js">
    <head>
        <base href="../">
        <meta charset="utf-8">
        <meta name="author" content="Softnio">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
        
        <link rel="shortcut icon" href="./images/fav-icon.png">
        
        <title>{{config('global.sitename')}}</title>

        <link rel="stylesheet" href="{{asset('assets/css/dashlite.css?ver=2.2.0')}}">
        <link id="skin-default" rel="stylesheet" href="{{asset('assets/css/theme.css?ver=2.2.0')}}">


        @stack('styles')
    </head>

    <body class="nk-body npc-default" :class="$class">
        <div class="nk-app-root">
            <div class="nk-main ">
                {{ $slot }}
            </div>
        </div>

        @stack('modals')
        
       
        @include('sweetalert::alert')
        
        <script src="{{asset('assets/js/bundle.js?ver=2.2.0')}}"></script>
        <script src="{{asset('assets/js/scripts.js?ver=2.2.0')}}"></script>
        <script src="{{asset('assets/js/alpine.min.js')}}"></script>
        <script src="{{asset('assets/js/charts/chart-ecommerce.js?ver=2.2.0')}}"></script>

        @stack('scripts')
    </body>
</html>
